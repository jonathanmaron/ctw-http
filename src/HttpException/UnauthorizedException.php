<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

use Ctw\Http\HttpStatus;

class UnauthorizedException extends AbstractClientErrorException
{
    protected int $statusCode = HttpStatus::STATUS_UNAUTHORIZED;
}
