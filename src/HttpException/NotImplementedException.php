<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

use Ctw\Http\HttpStatus;

class NotImplementedException extends AbstractServerErrorException
{
    protected int $statusCode = HttpStatus::STATUS_NOT_IMPLEMENTED;
}
