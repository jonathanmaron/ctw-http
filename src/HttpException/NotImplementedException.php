<?php
declare(strict_types=1);

namespace TxTextControl\Http\HttpException;

use TxTextControl\Http\HttpStatus;

class NotImplementedException extends AbstractServerErrorException
{
    protected int $statusCode = HttpStatus::STATUS_NOT_IMPLEMENTED;
}
