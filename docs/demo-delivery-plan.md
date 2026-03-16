# MacroActive demo delivery plan

## Goal

Create a Laravel-based demo repository that supports four conversations:

1. Local development with DDEV
2. Demo-friendly product/ops UI pages
3. An on-brand AI feature using z.ai
4. Branches and commits for Copilot code review / PR walkthroughs
5. Automated validation and release pipeline examples

## Working assumptions

- The repo starts effectively empty
- DDEV is installed locally
- Docker is installed on the target machine, even though the shell used to assemble this repo did not have permission to access the Docker daemon
- The demo should be lightweight and easy to explain

## Repo structure plan

- Laravel app skeleton at repo root
- `.ddev/` for local environment setup
- `docs/demo-delivery-plan.md` for visible planning/demo narration
- `.github/workflows/` for CI and release examples

## Demo feature plan

### Baseline on `main`
- Overview page
- Creator operations page
- Creator launch assistant page
- Engineering workflow page
- DDEV config
- CI and release workflow examples

### Reviewable follow-up branches
- `feature/creator-health-timeline`
  - Adds a timeline-style creator health component and extra narrative content
- `feature/creator-launch-assistant`
  - Adds z.ai-powered creator launch planning with env-based configuration
- `chore/release-pipeline-demo`
  - Expands workflow automation, artifacts, and review guidance

## Commit plan

1. `chore: scaffold laravel demo structure`
2. `feat: add creator ops and engineering workflow demo pages`
3. `chore: add ddev and github workflow configuration`
4. `feat: add creator launch assistant with z.ai integration`
5. Branch-specific commits for review walkthroughs

## Pull request demo plan

### PR 1 — UI / feature review
- Show view/controller changes
- Demo Copilot/code review comments on naming, layout, and maintainability
- Talk about human review focusing on architecture and clarity

### PR 2 — AI integration review
- Show the z.ai service class, controller validation, and env-based configuration
- Demo comments around prompt shape, error handling, and separation of concerns
- Talk about how the team owns the workflow while AI supports planning and content generation

### PR 3 — pipeline / release review
- Show workflow YAML diff
- Demo comments around caching, artifact packaging, and release triggers
- Talk about release confidence and rollback readiness

## Pipeline plan

### CI on push / PR
- Checkout
- Setup PHP + Node
- Install Composer packages
- Install NPM packages
- Build front-end assets
- Run Laravel tests

### Release on tags
- Build production assets
- Install prod dependencies
- Package deployable tarball
- Upload release artifact

## Known limitations during assembly

- This shell could not access the Docker daemon
- This shell did not have PHP / Composer available
- The repo was assembled structurally for later execution on a normal Docker/PHP-capable machine
