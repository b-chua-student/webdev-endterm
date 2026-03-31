# Accessory Pop-up Shop Storefront Website and Management System

## Description
An in-depth paragraph about your project and overview of use.

## Getting Started

### Dependencies
The following dependencies are required to run the system:
- [PHP 8.5.2+, Laravel Framework 12.48.1+, Composer 2.9.4+](https://php.new)
- Local Server Environment (preferably [Laragon](https://laragon.org/download))
- [Commitizen](https://github.com/commitizen/cz-cli)
- [NodeJS](https://nodejs.org/en/download) & [NPM](https://docs.npmjs.com/downloading-and-installing-node-js-and-npm)
- [GitHub CLI](https://cli.github.com/)

### Installing
**Ensure all dependencies are installed before proceeding.**

1. Clone the repository:
```bash
    git clone https://github.com/b-chua-student/webdev-endterm.git
    cd webdev-endterm
```

2. Install PHP dependencies:
```bash
    composer install
```

3. Install frontend dependencies:
```bash
    npm install
```

4. Create local environment setup:
```bash
    cp .env.example .env
    php artisan key:generate
```

5. Initialize the database:
```bash
    php artisan migrate --seed
```

### Development
**Commitizen** enforces consistent commit message formatting, enabling automated changelog generation. **Vite** provides fast frontend hot-reloading during development.

Ensure your local server environment is running (Laragon, XAMPP, WAMP, Laravel Herd, etc.) before starting development.

Instead of `git commit`, use Commitizen:
```bash
cz
```
To cancel, press `Ctrl + C`.

Instead of `php artisan serve`, use:
```bash
composer run dev
```

### Pushing Your Changes
This project follows the [GitHub Flow](https://git-flow.sh/workflows/github-flow/) branching strategy and [Conventional Commits](https://www.conventionalcommits.org/en/v1.0.0/) specification.

#### **Rules:**
- Always branch off from `main`.
- **Never commit directly to `main`** — it must always be stable and deployable.
- Branches are merged to `main` only after review and approval by a developer other than the original author.
- Branch names follow the [Conventional Branch](https://conventional-branch.github.io/) specification:
```
    feat/add-login-system
```

#### **Creating and Submitting a Branch:**

1. Create and switch to a new branch:
```bash
    git checkout -b feat/your-feature-name
```

2. Stage and commit your changes using Commitizen:
```bash
    git add .
    cz
```

3. Push the branch and open a pull request:
```bash
    git push -u origin HEAD
    gh pr create --fill
```
    `--fill` automatically uses your branch name and latest commit message as the PR title and body. Add `--web` to open the PR in the browser instead.

4. Request a review from another developer. **Do not merge your own PR.**

#### **Branch Types:**

Core — required for the app to function correctly:

| Type | Use When |
|---|---|
| `feat` | Adding new functionality |
| `fix` | Correcting bugs or broken logic |
| `style` | Making changes that don't affect code meaning |
| `refactor` | Restructuring code without fixing bugs or adding features |
| `build` | Modifying the build system or external dependencies |
| `perf` | Improving execution speed or reducing resource usage |

Supplemental — the app runs locally without these:

| Type | Use When |
|---|---|
| `ci` | Changing CI configuration files and scripts |
| `docs` | Updating README, design documents, or code comments |
| `test` | Adding missing tests or correcting existing ones |
| `chore` | Handling routine tasks (e.g. updating `.gitignore`, managing dependencies) |
| `revert` | Undoing a previous commit via `git revert` |

## Changelog
- **0.1** — Initial Release
