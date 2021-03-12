<?php
declare(strict_types=1);

include __DIR__ . '/../vendor/autoload.php';

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;
use Ctw\Http\HttpMethod;

/*
$httpStatus = new HttpStatus(HttpStatus::STATUS_NOT_FOUND);
dump($httpStatus->get());
*/

/*
dump(HttpMethod::METHOD_GET);
dump(HttpMethod::METHOD_POST);
*/

/*
throw new HttpException\NotFoundException();
throw new HttpException\NotFoundException('Custom 404 error message');
*/

/*
throw new HttpException\NotFoundException('Custom 404 error message');
*/

/*
try {
    throw new HttpException\NotFoundException();
} catch (HttpException\HttpExceptionInterface $e) {
    dump($e->getStatusCode());
    dump($e->getMessage());
}
*/
