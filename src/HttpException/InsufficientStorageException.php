<?php
declare(strict_types=1);

namespace TxTextControl\Http\HttpException;

use TxTextControl\Http\HttpStatus;

class InsufficientStorageException extends AbstractServerErrorException
{
    protected int $statusCode = HttpStatus::STATUS_INSUFFICIENT_STORAGE;
}
