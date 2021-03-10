<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

use Ctw\Http\HttpStatus;

class ServiceUnavailableException extends AbstractServerErrorException
{
    protected int $statusCode = HttpStatus::STATUS_SERVICE_UNAVAILABLE;
}
