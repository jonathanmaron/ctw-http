<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

use Ctw\Http\HttpStatus;

class RequestUriTooLongException extends AbstractClientErrorException
{
    protected int $statusCode = HttpStatus::STATUS_URI_TOO_LONG;
}
