# Accessory Pop-up Shop Storefront Website and Management System 

## Description

An in-depth paragraph about your project and overview of use.

## Getting Started

### Dependencies

The following dependencies are required to run the system:

- [PHP 8.5.2+, Laravel Framework 12.48.1+, Composer 2.9.4+](https://php.new)
- Local Server Environment Software (preferably [Laragon](https://laragon.org/download))
- [Commitizen](https://github.com/commitizen/cz-cli)
- [NodeJS](https://nodejs.org/en/download) & [NPM](https://docs.npmjs.com/downloading-and-installing-node-js-and-npm) (for frontend development)

### Installing

**Make sure all dependencies are installed.**

1. Clone the repository 
```
git clone https://github.com/b-chua-student/webdev-endterm.git
cd webdev-endterm
```

2. Install PHP dependencies 
```
composer install
```

3. Install Frontend dependencies
```
npm install
```

4. Create local environment setup  
```
cp .env.example .env
php artisan key:generate
```

5. Initialize the database
```
php artisan migrate --seed
```

### Development

This project uses Commitizen to maintain a clean git history and automate changelogs.

- Instead of `git commit`, use:
```
cz
```

This project uses different development servers depending on workflow

- For **frontend development ONLY**, use:
```
npm run dev
```
- If workflow **INCLUDES backend development**, use:
```
composer run dev
```

=======
### Branching Strategy

This project uses the [GitHub Flow](https://git-flow.sh/workflows/github-flow/) branching strategy. When making a change, developers create a new short-lived, descriptive branches from the `main` branch and then merge changes when the `pull request` is reviewed and approved. **NEVER COMMIT TO THE MAIN BRANCH** to ensure `main` is always stable. Branch names start with the branch type, following [Conventional Commmit specification](https://www.conventionalcommits.org/en/v1.0.0/), followed by branch description separated by hyphens. 

- For example:
```
feat/add-login-system
```

The branch types are as follows:
- Core
    - feat: Use when adding new functionality.
    - fix: Use for correcting bugs or broken logic.
    - style: Use for changes that do not affect the meaning of the code.
    - refactor: Use for code changes that neither fix a bug nor add a feature, but improve the code structure.
    - build: Use for changes that affect the build system or external dependencies.
    - perf: Use for code changes that specifically improve execution speed or reduce resource usage.
- Supplemental (the app can still run locally without these)
    - ci: Use for changes to your Continuous Integration configuration files and scripts.
    - docs: Use for updates to the README.md, design documents, or inline code comments.
    - test: Use when adding missing tests or correcting existing ones.
    - chore: Use for routine tasks that don't modify source or test files, such as updating .gitignore, renaming files, or managing dependencies via npm or composer.
    - revert: Use specifically to undo a previous commit (when using `git revert`).

### Development

This project uses Commitizen to maintain a clean git history and automate changelogs.

- Instead of `git commit`, use:
```
cz
```

and quit Commitizen with: 
```
Ctrl + c
```

This project uses different development servers depending on workflow

- For **frontend development ONLY**, use:
```
npm run dev
```
- If workflow **INCLUDES backend development**, use:
```
composer run dev
```

## Changelog 

* 0.1
    * Initial Release
