<?php
declare(strict_types=1);

namespace TxTextControl\Http\HttpException;

use TxTextControl\Http\HttpStatus;

class RequestHeaderFieldsTooLargeException extends AbstractClientErrorException
{
    protected int $statusCode = HttpStatus::STATUS_REQUEST_HEADER_FIELDS_TOO_LARGE;
}
