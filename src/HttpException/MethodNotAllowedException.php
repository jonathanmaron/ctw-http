<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

use Ctw\Http\HttpStatus;

class MethodNotAllowedException extends AbstractClientErrorException
{
    protected int $statusCode = HttpStatus::STATUS_METHOD_NOT_ALLOWED;
}
