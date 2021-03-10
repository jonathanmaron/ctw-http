<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

use Ctw\Http\HttpStatus;

class RangeNotSatisfiableException extends AbstractClientErrorException
{
    protected int $statusCode = HttpStatus::STATUS_RANGE_NOT_SATISFIABLE;
}
