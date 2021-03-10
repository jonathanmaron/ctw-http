<?php
declare(strict_types=1);

namespace TxTextControl\Http\HttpException;

use TxTextControl\Http\HttpStatus;

class GatewayTimeoutException extends AbstractServerErrorException
{
    protected int $statusCode = HttpStatus::STATUS_GATEWAY_TIMEOUT;
}
