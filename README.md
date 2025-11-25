# Package "ctw/ctw-http"

[![Latest Stable Version](https://poser.pugx.org/ctw/ctw-http/v/stable)](https://packagist.org/packages/ctw/ctw-http)
[![GitHub Actions](https://github.com/jonathanmaron/ctw-http/actions/workflows/tests.yml/badge.svg)](https://github.com/jonathanmaron/ctw-http/actions/workflows/tests.yml)
[![Scrutinizer Build](https://scrutinizer-ci.com/g/jonathanmaron/ctw-http/badges/build.png?b=master)](https://scrutinizer-ci.com/g/jonathanmaron/ctw-http/build-status/master)
[![Scrutinizer Quality](https://scrutinizer-ci.com/g/jonathanmaron/ctw-http/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/jonathanmaron/ctw-http/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/jonathanmaron/ctw-http/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/jonathanmaron/ctw-http/?branch=master)

Utility classes, constants, and typed exceptions for PSR-7 HTTP operations, providing a complete HTTP status code registry with metadata and throwable exceptions for all 4xx/5xx status codes.

## Introduction

### Why This Library Exists

Working with HTTP in PHP often involves scattered magic numbers, inconsistent error handling, and repetitive exception creation. The PSR-7 standard defines message interfaces but doesn't provide status code constants, metadata, or exception types.

This library provides a complete HTTP toolkit:

- **Status code constants**: All standard HTTP status codes as class constants
- **Method constants**: HTTP method names (GET, POST, PUT, DELETE, etc.)
- **Status metadata**: Human-readable names, descriptions, and documentation URLs
- **Typed exceptions**: Dedicated exception classes for every 4xx and 5xx status code
- **Exception hierarchy**: Catch client errors (4xx) or server errors (5xx) separately

### Problems This Library Solves

1. **Magic numbers**: Code uses `404` instead of readable `STATUS_NOT_FOUND`
2. **Inconsistent exceptions**: Each project invents its own HTTP exception classes
3. **Missing metadata**: Status codes lack human-readable descriptions
4. **Catch-all handling**: No way to catch only client errors vs. server errors
5. **Documentation gaps**: Developers must look up status code meanings externally

### Where to Use This Library

- **PSR-7 applications**: Enhance HTTP message handling with typed constants
- **API development**: Throw semantically correct HTTP exceptions
- **Error handling middleware**: Catch exceptions by category (client/server)
- **Logging and monitoring**: Include status metadata in error reports
- **HTTP clients**: Use constants instead of magic numbers

### Design Goals

1. **PSR-7 aligned**: Implements `Fig\Http\Message\StatusCodeInterface`
2. **Complete coverage**: All standard HTTP status codes (1xx through 5xx)
3. **Rich metadata**: Name, phrase, and documentation URL for each status
4. **Exception hierarchy**: Abstract base classes for client (4xx) and server (5xx) errors
5. **Type-safe**: Full strict types and interface contracts

## Requirements

- PHP 8.3 or higher
- fig/http-message-util ^1.1

## Installation

Install by adding the package as a [Composer](https://getcomposer.org) requirement:

```bash
composer require ctw/ctw-http
```

## Usage Examples

### HTTP Status Metadata

Retrieve complete metadata for any status code:

```php
use Ctw\Http\HttpStatus;

$httpStatus = new HttpStatus(HttpStatus::STATUS_NOT_FOUND);
$entity = $httpStatus->get();

// Returns:
// Ctw\Http\Entity\HttpStatus {
//   +statusCode: 404
//   +name: "Not Found"
//   +phrase: "The requested resource could not be found but may be available again in the future."
//   +exception: "Ctw\Http\HttpException\NotFoundException"
//   +url: "https://httpstatuses.com/404"
// }
```

### Throwing HTTP Exceptions

Each 4xx and 5xx status code has a dedicated exception class:

```php
use Ctw\Http\HttpException;

// Default message uses status name
throw new HttpException\NotFoundException();
// "404 Not Found"

// Custom message
throw new HttpException\NotFoundException('User with ID 123 not found');
// "User with ID 123 not found"

// With custom headers
throw new HttpException\UnauthorizedException(
    message: 'Invalid API key',
    headers: ['WWW-Authenticate' => 'Bearer']
);
```

### Catching Exceptions by Category

The exception hierarchy allows catching by error category:

```php
use Ctw\Http\HttpException;

try {
    // Application code
} catch (HttpException\AbstractClientErrorException $e) {
    // Handle 4xx errors (client's fault)
    $statusCode = $e->getStatusCode();
    $headers = $e->getHeaders();
} catch (HttpException\AbstractServerErrorException $e) {
    // Handle 5xx errors (server's fault)
}

// Or catch all HTTP exceptions
try {
    // Application code
} catch (HttpException\HttpExceptionInterface $e) {
    // Handle any HTTP exception
}
```

### Exception Hierarchy

```
HttpExceptionInterface
└── AbstractException
    ├── AbstractClientErrorException (4xx)
    │   ├── BadRequestException (400)
    │   ├── UnauthorizedException (401)
    │   ├── ForbiddenException (403)
    │   ├── NotFoundException (404)
    │   └── ... (all 4xx codes)
    └── AbstractServerErrorException (5xx)
        ├── InternalServerErrorException (500)
        ├── NotImplementedException (501)
        ├── BadGatewayException (502)
        ├── ServiceUnavailableException (503)
        └── ... (all 5xx codes)
```

### HTTP Method Constants

```php
use Ctw\Http\HttpMethod;

HttpMethod::METHOD_GET;      // 'GET'
HttpMethod::METHOD_POST;     // 'POST'
HttpMethod::METHOD_PUT;      // 'PUT'
HttpMethod::METHOD_PATCH;    // 'PATCH'
HttpMethod::METHOD_DELETE;   // 'DELETE'
HttpMethod::METHOD_HEAD;     // 'HEAD'
HttpMethod::METHOD_OPTIONS;  // 'OPTIONS'
HttpMethod::METHOD_CONNECT;  // 'CONNECT'
HttpMethod::METHOD_TRACE;    // 'TRACE'
HttpMethod::METHOD_PURGE;    // 'PURGE'
```

### HTTP Status Constants

```php
use Ctw\Http\HttpStatus;

// Informational (1xx)
HttpStatus::STATUS_CONTINUE;              // 100
HttpStatus::STATUS_SWITCHING_PROTOCOLS;   // 101

// Success (2xx)
HttpStatus::STATUS_OK;                    // 200
HttpStatus::STATUS_CREATED;               // 201
HttpStatus::STATUS_ACCEPTED;              // 202
HttpStatus::STATUS_NO_CONTENT;            // 204

// Redirection (3xx)
HttpStatus::STATUS_MOVED_PERMANENTLY;     // 301
HttpStatus::STATUS_FOUND;                 // 302
HttpStatus::STATUS_NOT_MODIFIED;          // 304
HttpStatus::STATUS_TEMPORARY_REDIRECT;    // 307
HttpStatus::STATUS_PERMANENT_REDIRECT;    // 308

// Client Error (4xx)
HttpStatus::STATUS_BAD_REQUEST;           // 400
HttpStatus::STATUS_UNAUTHORIZED;          // 401
HttpStatus::STATUS_FORBIDDEN;             // 403
HttpStatus::STATUS_NOT_FOUND;             // 404
HttpStatus::STATUS_METHOD_NOT_ALLOWED;    // 405
HttpStatus::STATUS_CONFLICT;              // 409
HttpStatus::STATUS_UNPROCESSABLE_ENTITY;  // 422
HttpStatus::STATUS_TOO_MANY_REQUESTS;     // 429

// Server Error (5xx)
HttpStatus::STATUS_INTERNAL_SERVER_ERROR; // 500
HttpStatus::STATUS_NOT_IMPLEMENTED;       // 501
HttpStatus::STATUS_BAD_GATEWAY;           // 502
HttpStatus::STATUS_SERVICE_UNAVAILABLE;   // 503
HttpStatus::STATUS_GATEWAY_TIMEOUT;       // 504
```

### Available Exception Classes

| Status | Exception Class |
|--------|-----------------|
| 400 | `BadRequestException` |
| 401 | `UnauthorizedException` |
| 402 | `PaymentRequiredException` |
| 403 | `ForbiddenException` |
| 404 | `NotFoundException` |
| 405 | `MethodNotAllowedException` |
| 406 | `NotAcceptableException` |
| 407 | `ProxyAuthenticationRequiredException` |
| 408 | `RequestTimeoutException` |
| 409 | `ConflictException` |
| 410 | `GoneException` |
| 411 | `LengthRequiredException` |
| 412 | `PreconditionFailedException` |
| 413 | `PayloadTooLargeException` |
| 414 | `RequestUriTooLongException` |
| 415 | `UnsupportedMediaTypeException` |
| 416 | `RangeNotSatisfiableException` |
| 417 | `ExpectationFailedException` |
| 418 | `ImATeapotException` |
| 421 | `MisdirectedRequestException` |
| 422 | `UnprocessableEntityException` |
| 423 | `LockedException` |
| 424 | `FailedDependencyException` |
| 425 | `TooEarlyException` |
| 426 | `UpgradeRequiredException` |
| 428 | `PreconditionRequiredException` |
| 429 | `TooManyRequestsException` |
| 431 | `RequestHeaderFieldsTooLargeException` |
| 451 | `UnavailableForLegalReasonsException` |
| 500 | `InternalServerErrorException` |
| 501 | `NotImplementedException` |
| 502 | `BadGatewayException` |
| 503 | `ServiceUnavailableException` |
| 504 | `GatewayTimeoutException` |
| 505 | `VersionNotSupportedException` |
| 506 | `VariantAlsoNegotiatesException` |
| 507 | `InsufficientStorageException` |
| 508 | `LoopDetectedException` |
| 510 | `NotExtendedException` |
| 511 | `NetworkAuthenticationRequiredException` |
