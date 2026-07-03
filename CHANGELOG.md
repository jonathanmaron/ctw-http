# CHANGELOG

## Unreleased

* Modernized `Ctw\Http\HttpStatus` internals for PHP 8.4/8.5 with no public API
  change: the status-code validation now runs through an 8.4 property `set`
  hook (replacing the private `validateStatusCode()`/`setStatusCode()` helpers),
  and the redundant private `getDb()`/`setDb()`/`getStatusCode()` accessors were
  removed. Construction, the thrown `InvalidArgumentException`, and its message
  are unchanged.
* Added the PHP 8.5 `#[\NoDiscard]` attribute to `HttpStatus::get()` so
  consumers are warned when they call it purely for a (non-existent) side
  effect. This is non-breaking — the method signature and return value are
  unchanged; discarding the result only emits a warning.

## 3.0.0 - 2022-07-07

* Added support for PHP 8.1.
* Improved code to `phpstan` level `max`.
* Minor internal refactoring.
* Removed support for PHP 7.2.

## 1.0.11 - 2021-03-12

* Improved documentation.
* Improved QA.
* Improved unit tests.

## 1.0.7 - 2021-03-11

* Improved QA.

## 1.0.6 - 2021-03-11

* Improved QA.

## 1.0.5 - 2021-03-11

* Improved documentation.
* Improved unit tests.

## 1.0.3 - 2021-03-10

* Original release.
