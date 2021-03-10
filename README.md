# CTW HTTP

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

### Throwing Exception

#### Via `throwException()` method

```php
use Ctw\Http\HttpStatus;

$httpStatus = new HttpStatus(HttpStatus::STATUS_NOT_FOUND);
$httpStatus->throwException();
```

```php
PHP Fatal error:  Uncaught Ctw\Http\HttpException\NotFoundException: 
  404 Not Found in /path/ctw-http/src/HttpStatus.php:45
Stack trace:
#0 /path/ctw-http/bin/demo-usage.php(21): Ctw\Http\HttpStatus->throwException()
#1 {main}
  thrown in /path/ctw-http/src/HttpStatus.php on line 45
```

#### Directly with `HttpException\*` Exceptions

```php
use Ctw\Http\HttpException;

throw new HttpException\NotFoundException();
```

#### Directly with `HttpException\*` Exception and Custom Error Message

```php
use Ctw\Http\HttpException;

throw new HttpException\NotFoundException('Custom 404 error message');
```

### Catching Exceptions

All `HttpException`s implement `HttpException\HttpExceptionInterface`, therefore:

```php
use Ctw\Http\HttpException;

try {
    throw new HttpException\NotFoundException();
} catch (HttpException\HttpExceptionInterface $e) {
    dump($e->getStatusCode());
    dump($e->getMessage());
}
```

### HTTP Methods

```php
dump(HttpMethod::METHOD_GET);
dump(HttpMethod::METHOD_POST);
```
