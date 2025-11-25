# Package "ctw/ctw-http"

[![GitHub Actions](https://github.com/jonathanmaron/ctw-http/actions/workflows/tests.yml/badge.svg)](https://github.com/jonathanmaron/ctw-http/actions/workflows/tests.yml)
[![Scrutinizer Build](https://scrutinizer-ci.com/g/jonathanmaron/ctw-http/badges/build.png?b=master)](https://scrutinizer-ci.com/g/jonathanmaron/ctw-http/build-status/master)
[![Scrutinizer Quality](https://scrutinizer-ci.com/g/jonathanmaron/ctw-http/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/jonathanmaron/ctw-http/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/jonathanmaron/ctw-http/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/jonathanmaron/ctw-http/?branch=master)

This repository holds utility classes and constants to facilitate common operations of [PSR-7](https://www.php-fig.org/psr/psr-7/) and a group of exceptions which represent HTTP status codes.

## Installation

Install by adding the package as a [Composer](https://getcomposer.org) requirement:

```bash
$ composer require ctw/ctw-http
```
## Usage Examples

### Returning an Entity

```php
use Ctw\Http\HttpStatus;

$httpStatus = new HttpStatus(HttpStatus::STATUS_NOT_FOUND);
dump($httpStatus->get());
```

```php
^ Ctw\Http\Entity\HttpStatus^ {#2
  +statusCode: 404
  +name: "Not Found"
  +phrase: "The requested resource could not be found but may be available again in the future."
  +exception: "Ctw\Http\HttpException\NotFoundException"
  +url: "https://httpstatuses.com/404"
}
```

### Throwing Exceptions

#### `HttpException\*` Exceptions

```php
use Ctw\Http\HttpException;

throw new HttpException\NotFoundException();
```

```php
PHP Fatal error: Uncaught Ctw\Http\HttpException\NotFoundException: 
  404 Not Found in /path/demo-usage.php:20
Stack trace:
#0 {main}
  thrown in /path/demo-usage.php on line 20
```

#### `HttpException\*` Exception with Custom Error Message

```php
use Ctw\Http\HttpException;

throw new HttpException\NotFoundException('Custom 404 error message');
```

```php
PHP Fatal error: Uncaught Ctw\Http\HttpException\NotFoundException: 
  Custom 404 error message in /path/demo-usage.php:21
Stack trace:
#0 {main}
  thrown in /path/demo-usage.php on line 21

```

### Catching Exceptions

All `HttpException\*` Exceptions implement `HttpException\HttpExceptionInterface`, therefore:

```php
use Ctw\Http\HttpException;

try {
    throw new HttpException\NotFoundException();
} catch (HttpException\HttpExceptionInterface $e) {
    dump($e->getStatusCode());
    dump($e->getMessage());
}
```

The `HttpException\*` hierarchy is:

```php
use Ctw\Http\HttpException\HttpExceptionInterface;
use Ctw\Http\HttpException\AbstractException;
use Ctw\Http\HttpException\AbstractClientErrorException;
use Ctw\Http\HttpException\AbstractServerErrorException;

HttpExceptionInterface
└── AbstractException
    ├── AbstractClientErrorException
    │   └── *Exception
    └── AbstractServerErrorException
        └── *Exception
```

### List of HTTP Method Constants

The following are provided by [PSR Http Message Util](https://github.com/php-fig/http-message-util):

```php
use Ctw\Http\HttpMethod;

HttpMethod::METHOD_CONNECT;
HttpMethod::METHOD_DELETE;
HttpMethod::METHOD_GET;
HttpMethod::METHOD_HEAD;
HttpMethod::METHOD_OPTIONS;
HttpMethod::METHOD_PATCH;
HttpMethod::METHOD_POST;
HttpMethod::METHOD_PURGE;
HttpMethod::METHOD_PUT;
HttpMethod::METHOD_TRACE;
```

### List of HTTP Status Constants

The following are provided by [PSR Http Message Util](https://github.com/php-fig/http-message-util):

```php
use Ctw\Http\HttpStatus;

HttpStatus::STATUS_CONTINUE;
HttpStatus::STATUS_SWITCHING_PROTOCOLS;
HttpStatus::STATUS_PROCESSING;
HttpStatus::STATUS_EARLY_HINTS;
HttpStatus::STATUS_OK;
HttpStatus::STATUS_CREATED;
HttpStatus::STATUS_ACCEPTED;
HttpStatus::STATUS_NON_AUTHORITATIVE_INFORMATION;
HttpStatus::STATUS_NO_CONTENT;
HttpStatus::STATUS_RESET_CONTENT;
HttpStatus::STATUS_PARTIAL_CONTENT;
HttpStatus::STATUS_MULTI_STATUS;
HttpStatus::STATUS_ALREADY_REPORTED;
HttpStatus::STATUS_IM_USED;
HttpStatus::STATUS_MULTIPLE_CHOICES;
HttpStatus::STATUS_MOVED_PERMANENTLY;
HttpStatus::STATUS_FOUND;
HttpStatus::STATUS_SEE_OTHER;
HttpStatus::STATUS_NOT_MODIFIED;
HttpStatus::STATUS_USE_PROXY;
HttpStatus::STATUS_RESERVED;
HttpStatus::STATUS_TEMPORARY_REDIRECT;
HttpStatus::STATUS_PERMANENT_REDIRECT;
HttpStatus::STATUS_BAD_REQUEST;
HttpStatus::STATUS_UNAUTHORIZED;
HttpStatus::STATUS_PAYMENT_REQUIRED;
HttpStatus::STATUS_FORBIDDEN;
HttpStatus::STATUS_NOT_FOUND;
HttpStatus::STATUS_METHOD_NOT_ALLOWED;
HttpStatus::STATUS_NOT_ACCEPTABLE;
HttpStatus::STATUS_PROXY_AUTHENTICATION_REQUIRED;
HttpStatus::STATUS_REQUEST_TIMEOUT;
HttpStatus::STATUS_CONFLICT;
HttpStatus::STATUS_GONE;
HttpStatus::STATUS_LENGTH_REQUIRED;
HttpStatus::STATUS_PRECONDITION_FAILED;
HttpStatus::STATUS_PAYLOAD_TOO_LARGE;
HttpStatus::STATUS_URI_TOO_LONG;
HttpStatus::STATUS_UNSUPPORTED_MEDIA_TYPE;
HttpStatus::STATUS_RANGE_NOT_SATISFIABLE;
HttpStatus::STATUS_EXPECTATION_FAILED;
HttpStatus::STATUS_IM_A_TEAPOT;
HttpStatus::STATUS_MISDIRECTED_REQUEST;
HttpStatus::STATUS_UNPROCESSABLE_ENTITY;
HttpStatus::STATUS_LOCKED;
HttpStatus::STATUS_FAILED_DEPENDENCY;
HttpStatus::STATUS_TOO_EARLY;
HttpStatus::STATUS_UPGRADE_REQUIRED;
HttpStatus::STATUS_PRECONDITION_REQUIRED;
HttpStatus::STATUS_TOO_MANY_REQUESTS;
HttpStatus::STATUS_REQUEST_HEADER_FIELDS_TOO_LARGE;
HttpStatus::STATUS_UNAVAILABLE_FOR_LEGAL_REASONS;
HttpStatus::STATUS_INTERNAL_SERVER_ERROR;
HttpStatus::STATUS_NOT_IMPLEMENTED;
HttpStatus::STATUS_BAD_GATEWAY;
HttpStatus::STATUS_SERVICE_UNAVAILABLE;
HttpStatus::STATUS_GATEWAY_TIMEOUT;
HttpStatus::STATUS_VERSION_NOT_SUPPORTED;
HttpStatus::STATUS_VARIANT_ALSO_NEGOTIATES;
HttpStatus::STATUS_INSUFFICIENT_STORAGE;
HttpStatus::STATUS_LOOP_DETECTED;
HttpStatus::STATUS_NOT_EXTENDED;
HttpStatus::STATUS_NETWORK_AUTHENTICATION_REQUIRED;
```
Please take a look at the `/demo` directory for further examples. 