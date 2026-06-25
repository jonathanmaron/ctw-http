# PHP 8.5.7 Upgrade — `ctw/ctw-http`

- **Branch:** `php85` (cut from `master`)
- **Runtime:** PHP 8.3.31 → **8.5.7**
- **Date:** 2026-06-25

This is a **TODO list** of the changes required for this package to run cleanly
under PHP 8.5.7. Nothing here has been fixed yet — the fixes happen in a second
step. Boxes are intentionally left unchecked.

Detection commands used:

```bash
composer update -W
php vendor/bin/phpunit --no-coverage --display-deprecations --display-warnings --display-notices --display-errors
composer rector      # rector --dry-run
composer phpstan
```

---

## 1. `composer update -W`

✅ **Succeeded.** No dependency was blocked by an incompatible PHP 8.5 platform
requirement. Only dev tooling moved (same set as the other packages:
`ctw/ctw-qa` 5.0.11→5.0.15, `phpunit` 12.4.4→12.5.30, `phpstan` 2.1.32→2.2.2,
`rector` 2.2.8→2.5.2, `symplify/easy-coding-standard` 13.0.0→13.2.3).
`composer.lock` is git-ignored.

---

## 2. PHP 8.5 runtime issues (must fix)

Both are the **"implicitly nullable parameter"** deprecation (deprecated since
PHP 8.4, still emitted under 8.5). Detected by **both** PHPUnit
(`--display-deprecations`) and PHPStan (`parameter.implicitlyNullable`).

- [ ] **`src/HttpException/AbstractException.php:16`** — constructor parameter
  `Throwable $previous = null` is implicitly nullable.
  **Fix:** make it explicit → `?Throwable $previous = null`.

- [ ] **`src/HttpException/HttpExceptionInterface.php:10`** — same issue on the
  interface method signature `__construct(string $message = '', Throwable
  $previous = null, array $headers = [], int $code = 0)`.
  **Fix:** `?Throwable $previous = null` (the interface and the implementation
  must be changed together).

  > Message: `Implicitly marking parameter $previous as nullable is deprecated,
  > the explicit nullable type must be used instead`.
  > Surfaced via `CtwTest\Http\HttpException\BadGatewayExceptionTest` (the first
  > test to load the exception hierarchy); the fix covers every concrete
  > `*Exception` subclass since they all inherit this constructor.

---

## 3. QA tooling issues (surfaced by the dependency update)

- [ ] **PHPStan unmatched ignore pattern** — `Ignored error pattern
  missingType.generics was not matched in reported errors.` This originates in
  the shared `config/phpstan/common.neon` shipped by **`ctw/ctw-qa`**. Fix it
  centrally there (see `ctw-qa/dev-php85/UPDATE.md` §3); no change needed in
  this repo. Until then `composer phpstan` reports **3 errors** (the 2 real
  deprecations above + this 1 spurious unmatched-pattern error).

---

## 4. Notes (non-blocking, not PHP 8.5 specific)

- Run the suite locally with `--no-coverage` — the project `phpunit.xml.dist`
  configures a `<coverage>` report but no Xdebug/PCOV is installed here, which
  otherwise yields "No tests executed!". Not a PHP 8.5 regression.

---

## 5. Verification snapshot (current state on `php85`)

| Check | Result |
| --- | --- |
| `composer update -W` | ✅ clean |
| PHPUnit (`--no-coverage`) | 232 tests, 437 assertions, **2 deprecations** (§2) |
| Rector (dry-run) | ✅ no changes proposed |
| PHPStan | ❌ 3 errors (2× `parameter.implicitlyNullable` §2 + 1 shared unmatched-ignore §3) |

Once §2 is fixed here and §3 is fixed in `ctw-qa`, this package is green under
PHP 8.5.7.
