<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

use Ctw\Http\HttpStatus;

class InsufficientStorageException extends AbstractServerErrorException
{
    protected int $statusCode = HttpStatus::STATUS_INSUFFICIENT_STORAGE;
}
