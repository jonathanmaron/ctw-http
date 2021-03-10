<?php
declare(strict_types=1);

namespace TxTextControl\Http\HttpException;

use TxTextControl\Http\HttpStatus;

class MethodNotAllowedException extends AbstractClientErrorException
{
    protected int $statusCode = HttpStatus::STATUS_METHOD_NOT_ALLOWED;
}
