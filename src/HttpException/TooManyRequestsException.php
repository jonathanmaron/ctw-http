<?php
declare(strict_types=1);

namespace TxTextControl\Http\HttpException;

use TxTextControl\Http\HttpStatus;

class TooManyRequestsException extends AbstractClientErrorException
{
    protected int $statusCode = HttpStatus::STATUS_TOO_MANY_REQUESTS;
}
