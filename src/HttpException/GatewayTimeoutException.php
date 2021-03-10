<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

use Ctw\Http\HttpStatus;

class GatewayTimeoutException extends AbstractServerErrorException
{
    protected int $statusCode = HttpStatus::STATUS_GATEWAY_TIMEOUT;
}
