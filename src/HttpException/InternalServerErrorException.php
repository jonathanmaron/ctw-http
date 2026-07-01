<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

use Ctw\Http\HttpStatus;

class InternalServerErrorException extends AbstractServerErrorException
{
    #[\Override]
    protected int $statusCode = HttpStatus::STATUS_INTERNAL_SERVER_ERROR;
}
