<?php
declare(strict_types=1);

namespace TxTextControl\Http\HttpException;

use TxTextControl\Http\HttpStatus;

class InternalServerErrorException extends AbstractServerErrorException
{
    protected int $statusCode = HttpStatus::STATUS_INTERNAL_SERVER_ERROR;
}
