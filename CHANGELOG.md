# Changelog

## [2.3.0] - 2026-10-23

### Added

- Laravel 13 support with Testbench 11 and Pest 4 compatibility.
- CI coverage for Laravel 10–13 and both Livewire 3 and 4, with Laravel 13 tested on PHP 8.3–8.5.

### Changed

- Updated the development dependencies and PHPUnit configuration for current Laravel releases. Parallel testing now uses Pest's built-in support.
- Moved Larastan to its maintained package name and updated its PHPStan configuration path.
- Registered package views and the Livewire test harness for static analysis, documented public APIs, and marked overridden provider and facade methods.
- Added regression coverage for loading the toast helper more than once, retaining the 100% coverage requirement.
- Synced upstream Pint updates from PRs #721 and #724, and core-js updates from PRs #718 and #743.
- Run checks directly on pull requests and pushes, and check formatting without committing changes from CI.
- Use Node.js 24 for asset builds, and rebuild assets only after successful checks on pushes to `main`.

Earlier upstream changes are documented on the [upstream releases page](https://github.com/usernotnull/tall-toasts/releases).
