<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

use Ctw\Http\HttpStatus;

class RequestHeaderFieldsTooLargeException extends AbstractClientErrorException
{
    #[\Override]
    protected int $statusCode = HttpStatus::STATUS_REQUEST_HEADER_FIELDS_TOO_LARGE;
}
