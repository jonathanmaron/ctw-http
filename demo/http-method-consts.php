<?php
declare(strict_types=1);

include __DIR__ . '/../vendor/autoload.php';

use Ctw\Http\HttpMethod;

$reflectionClass = new ReflectionClass(HttpMethod::class);

foreach (array_keys($reflectionClass->getConstants()) as $const) {
    echo sprintf('HttpMethod::%s', $const);
    echo PHP_EOL;
}

// HttpMethod::METHOD_HEAD
// HttpMethod::METHOD_GET
// HttpMethod::METHOD_POST
// HttpMethod::METHOD_PUT
// HttpMethod::METHOD_PATCH
// HttpMethod::METHOD_DELETE
// HttpMethod::METHOD_PURGE
// HttpMethod::METHOD_OPTIONS
// HttpMethod::METHOD_TRACE
// HttpMethod::METHOD_CONNECT
