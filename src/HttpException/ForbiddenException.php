<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

use Ctw\Http\HttpStatus;

class ForbiddenException extends AbstractClientErrorException
{
    #[\Override]
    protected int $statusCode = HttpStatus::STATUS_FORBIDDEN;
}
