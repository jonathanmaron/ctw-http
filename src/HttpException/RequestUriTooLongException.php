<?php
declare(strict_types=1);

namespace TxTextControl\Http\HttpException;

use TxTextControl\Http\HttpStatus;

class RequestUriTooLongException extends AbstractClientErrorException
{
    protected int $statusCode = HttpStatus::STATUS_URI_TOO_LONG;
}
