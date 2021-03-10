<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

use Ctw\Http\HttpStatus;

class BadGatewayException extends AbstractServerErrorException
{
    protected int $statusCode = HttpStatus::STATUS_BAD_GATEWAY;
}
