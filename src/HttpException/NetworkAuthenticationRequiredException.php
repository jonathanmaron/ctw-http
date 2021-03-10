<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

use Ctw\Http\HttpStatus;

class NetworkAuthenticationRequiredException extends AbstractServerErrorException
{
    protected int $statusCode = HttpStatus::STATUS_NETWORK_AUTHENTICATION_REQUIRED;
}
