<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

use Ctw\Http\HttpStatus;

class NotAcceptableException extends AbstractClientErrorException
{
    protected int $statusCode = HttpStatus::STATUS_NOT_ACCEPTABLE;
}
