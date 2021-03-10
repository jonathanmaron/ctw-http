<?php
declare(strict_types=1);

namespace TxTextControl\Http\HttpException;

use TxTextControl\Http\HttpStatus;

class ProxyAuthenticationRequiredException extends AbstractClientErrorException
{
    protected int $statusCode = HttpStatus::STATUS_PROXY_AUTHENTICATION_REQUIRED;
}
