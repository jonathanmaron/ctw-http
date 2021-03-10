<?php
declare(strict_types=1);

namespace TxTextControl\Http\HttpException;

use TxTextControl\Http\HttpStatus;

class ServiceUnavailableException extends AbstractServerErrorException
{
    protected int $statusCode = HttpStatus::STATUS_SERVICE_UNAVAILABLE;
}
