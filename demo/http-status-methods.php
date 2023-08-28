<?php
declare(strict_types=1);

include __DIR__ . '/../vendor/autoload.php';

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// <editor-fold desc="Get HttpStatus Entity (full)">

$httpStatus = new HttpStatus(HttpStatus::STATUS_GONE);

dump($httpStatus->get());

// ^ Ctw\Http\Entity\HttpStatus^ {#2
//   +statusCode: 410
//   +name: "Gone"
//   +phrase: "The requested resource is no longer available and will not be available again."
//   +exception: "Ctw\Http\HttpException\GoneException"
//   +url: "https://httpstatuses.com/410"
// }

// </editor-fold>

// <editor-fold desc="Get HttpStatus Entity (just name)">

$name = (new HttpStatus(HttpStatus::STATUS_GONE))->get()->name;

dump($name);

// Gone

// </editor-fold>

// <editor-fold desc="Throw (in Handler) and Catch (in Framework) HttpException">

try {
    throw new HttpException\NotFoundException('Optional custom 404 Not Found');
} catch (HttpException\HttpExceptionInterface $httpException) {
    dump($httpException->getStatusCode());
    dump($httpException->getMessage());
}

// ^ 404
// ^ "Optional custom 404 Not Found"

// </editor-fold>
