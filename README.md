# MacroActive Laravel Demo

This repository is a lightweight Laravel demo app prepared for local development, review demos, and CI/CD conversations.

## What is included

- Laravel project structure
- DDEV configuration in `.ddev/`
- Demo pages for creator operations and engineering workflow discussions
- GitHub workflow examples for CI and tagged releases
- A repo-level delivery plan in `docs/demo-delivery-plan.md`

## Local development with DDEV

> This repo is configured for DDEV, but the shell environment used to assemble it did not have permission to talk to the Docker daemon. On a normal local machine with Docker access, use the commands below.

```bash
ddev start
ddev exec cp -n .env.example .env
ddev exec touch database/database.sqlite
ddev composer install
ddev exec php artisan key:generate
ddev npm install
ddev npm run build
```

Then open:

- `https://macro-active.ddev.site`
- `https://macro-active.ddev.site/creator-ops`
- `https://macro-active.ddev.site/engineering-workflow`

## Suggested demo branches

- `main` — stable baseline
- `feature/creator-health-timeline` — UI/content review demo
- `chore/release-pipeline-demo` — workflow/release review demo

## Review demo ideas

- Show a feature branch diff against `main`
- Walk through `.github/pull_request_template.md`
- Show how CI validates assets and Laravel tests before merge
- Talk through how release tags would produce build artifacts
