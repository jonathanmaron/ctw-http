<?php
declare(strict_types=1);

namespace TxTextControl\Http\HttpException;

use TxTextControl\Http\HttpStatus;

class NetworkAuthenticationRequiredException extends AbstractServerErrorException
{
    protected int $statusCode = HttpStatus::STATUS_NETWORK_AUTHENTICATION_REQUIRED;
}
