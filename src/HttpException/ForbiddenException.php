<?php
declare(strict_types=1);

namespace TxTextControl\Http\HttpException;

use TxTextControl\Http\HttpStatus;

class ForbiddenException extends AbstractClientErrorException
{
    protected int $statusCode = HttpStatus::STATUS_FORBIDDEN;
}
