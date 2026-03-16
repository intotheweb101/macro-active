<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class DemoDashboardController extends Controller
{
    public function home(): View
    {
        return view('home', [
            'stats' => [
                ['label' => 'Creators onboarded', 'value' => '184', 'context' => 'Across nutrition, coaching, and hybrid offers'],
                ['label' => 'Active review branches', 'value' => '3', 'context' => 'Ready for Copilot / PR review demos'],
                ['label' => 'Pipeline stages', 'value' => '4', 'context' => 'Validate, build, preview, release'],
            ],
            'highlights' => [
                'DDEV-based local workflow for team consistency',
                'Demo pages focused on creator operations and engineering workflows',
                'Branch plan designed for review and pull request walkthroughs',
            ],
        ]);
    }

    public function creators(): View
    {
        return view('creators', [
            'creators' => [
                ['name' => 'Ari Fit Co.', 'status' => 'Healthy', 'launch' => '2 days', 'risk' => 'Low churn risk'],
                ['name' => 'Lift Lab', 'status' => 'At Risk', 'launch' => '4 days', 'risk' => 'Needs onboarding nudges'],
                ['name' => 'Macro Method', 'status' => 'Critical', 'launch' => 'Blocked', 'risk' => 'Checkout config issue'],
            ],
            'signals' => [
                'Onboarding completion by creator type',
                'Support escalation themes',
                'Health scoring and next best action recommendations',
            ],
        ]);
    }

    public function engineering(): View
    {
        return view('engineering', [
            'workflow' => [
                'Code review starts with AI-assisted first-pass comments',
                'Developers retain ownership of architecture and final decisions',
                'MCP-ready context sources improve quality of suggestions and triage',
                'Release automation builds assets and validates changes before tags ship',
            ],
            'branches' => [
                ['name' => 'main', 'purpose' => 'Stable demo baseline'],
                ['name' => 'feature/creator-health-timeline', 'purpose' => 'Reviewable UI and content changes'],
                ['name' => 'chore/release-pipeline-demo', 'purpose' => 'CI/CD and release automation diff'],
            ],
        ]);
    }
}
