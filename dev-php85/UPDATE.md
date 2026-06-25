# PHP 8.5.7 Migration — `ctw/ctw-http`

- **Branch:** `php85` (cut from `master`)
- **Runtime:** PHP 8.3.31 → **8.5.7**
- **PHPUnit:** 12 → **13.2.1**
- **Status:** ✅ done

## Audit checklist

### `src/HttpException/AbstractException.php`

- [x] **(deprecation) `src/HttpException/AbstractException.php:16`** —
  `Throwable $previous = null` is an implicitly-nullable parameter, deprecated
  since PHP 8.4.
  - **Fix:** declared the parameter explicitly nullable —
    `?Throwable $previous = null`.

### `src/HttpException/HttpExceptionInterface.php`

- [x] **(deprecation) `src/HttpException/HttpExceptionInterface.php:10`** —
  `Throwable $previous = null` is an implicitly-nullable parameter, deprecated
  since PHP 8.4.
  - **Fix:** declared the parameter explicitly nullable —
    `?Throwable $previous = null` (kept in sync with the abstract class).

## composer.json & CI

- [x] **`require.php`** — `^8.3` → **`^8.5`**.
- [x] **`phpunit/phpunit`** — `^12.0` → **`^13.0`** (installs 13.2.1).
- [x] **`ctw/ctw-qa`** — pinned to **`dev-php85`** (inherits the shared PHPStan
  `reportUnmatchedIgnoredErrors: false` fix).
- [x] **`.github/workflows/tests.yml`** — CI matrix pinned to PHP **`8.5`** only.

## Final audit (PHP 8.5.7)

- [x] **`php -v`** — PHP **8.5.7** (cli).
- [x] **`composer update -W`** — clean; no dependency blocked by the PHP 8.5
  platform requirement.
- [x] **PHPUnit** — **232 tests, 437 assertions**, no issues (PHPUnit 13.2.1).
- [x] **PHPStan** — `[OK] No errors` (level max).

```bash
php -v                                  # PHP 8.5.7
composer update -W                      # clean
php vendor/bin/phpunit --no-coverage    # OK (232 tests, 437 assertions)
composer phpstan                        # No issues found
```
