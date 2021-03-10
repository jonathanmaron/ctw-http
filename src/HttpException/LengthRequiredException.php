<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

use Ctw\Http\HttpStatus;

class LengthRequiredException extends AbstractClientErrorException
{
    protected int $statusCode = HttpStatus::STATUS_LENGTH_REQUIRED;
}
