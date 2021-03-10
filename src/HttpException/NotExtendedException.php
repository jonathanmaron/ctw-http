<?php
declare(strict_types=1);

namespace TxTextControl\Http\HttpException;

use TxTextControl\Http\HttpStatus;

class NotExtendedException extends AbstractServerErrorException
{
    protected int $statusCode = HttpStatus::STATUS_NOT_EXTENDED;
}
