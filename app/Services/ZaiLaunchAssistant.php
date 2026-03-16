<?php

namespace App\Services;

use App\Exceptions\LaunchAssistantException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class ZaiLaunchAssistant
{
    public function isConfigured(): bool
    {
        return filled(config('services.zai.api_key'));
    }

    /**
     * @param  array<string, string>  $input
     */
    public function generate(array $input): string
    {
        try {
            $baseUrl = rtrim((string) config('services.zai.base_url'), '/');

            $response = Http::acceptJson()
                ->asJson()
                ->withToken((string) config('services.zai.api_key'))
                ->baseUrl($baseUrl)
                ->timeout(30)
                ->post('/chat/completions', [
                    'model' => config('services.zai.model', 'glm-5'),
                    'temperature' => 0.7,
                    'stream' => false,
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => 'You are a launch strategist helping fitness and nutrition creators launch on MacroActive. Write concise, practical launch plans with clear priorities, onboarding steps, content angles, and retention ideas.',
                        ],
                        [
                            'role' => 'user',
                            'content' => sprintf(
                                "Creator name: %s\nNiche: %s\nAudience: %s\nOffer model: %s\nLaunch goal: %s\n\nCreate a concise launch assistant response with these sections:\n1. Launch positioning\n2. First 7 days plan\n3. Content ideas\n4. Onboarding risks to watch\n5. Retention play to test",
                                $input['creator_name'],
                                $input['niche'],
                                $input['audience'],
                                $input['offer_model'],
                                $input['launch_goal'],
                            ),
                        ],
                    ],
                ]);
        } catch (ConnectionException $exception) {
            $message = 'The launch assistant could not reach z.ai.';

            if (config('app.debug')) {
                $message .= sprintf(
                    ' Endpoint: %s/chat/completions. Transport error: %s',
                    $baseUrl,
                    $exception->getMessage(),
                );
            } else {
                $message .= ' Check network access or the configured base URL and try again.';
            }

            throw new LaunchAssistantException(
                $message,
                previous: $exception,
            );
        }

        $providerMessage = $this->providerErrorMessage($response->json());

        if ($response->status() === 429) {
            throw new LaunchAssistantException(
                $providerMessage !== null
                    ? sprintf('z.ai returned a 429 response: %s', $providerMessage)
                    : 'z.ai returned a 429 response. This can indicate quota exhaustion, account balance issues, or provider-side throttling.',
            );
        }

        if (in_array($response->status(), [401, 403], true)) {
            throw new LaunchAssistantException(
                'The launch assistant API key was rejected. Check ZAI_API_KEY and confirm the account has access to the configured model.',
            );
        }

        if ($response->failed()) {
            throw new LaunchAssistantException(
                $providerMessage !== null
                    ? sprintf('z.ai could not generate a launch plan: %s', $providerMessage)
                    : 'z.ai could not generate a launch plan due to an upstream error. Please try again shortly.',
            );
        }

        $payload = $response->json();

        $content = data_get($payload, 'choices.0.message.content');

        if (! is_string($content) || $content === '') {
            throw new RuntimeException('z.ai returned an unexpected response payload.');
        }

        return $content;
    }

    /**
     * @param  mixed  $payload
     */
    private function providerErrorMessage(mixed $payload): ?string
    {
        $code = data_get($payload, 'error.code');
        $message = data_get($payload, 'error.message');

        if (! is_string($message) || $message === '') {
            return null;
        }

        return is_string($code) && $code !== ''
            ? sprintf('[%s] %s', $code, $message)
            : $message;
    }
}
