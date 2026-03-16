<?php

return [
    'postmark' => ['key' => env('POSTMARK_API_KEY')],
    'resend' => ['key' => env('RESEND_API_KEY')],
    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],
    'zai' => [
        'api_key' => env('ZAI_API_KEY'),
        'model' => env('ZAI_MODEL', 'glm-5'),
        'base_url' => env('ZAI_BASE_URL', 'https://api.z.ai/api/paas/v4'),
    ],
];
