<?php
declare(strict_types=1);

namespace TxTextControl\Http\HttpException;

use TxTextControl\Http\HttpStatus;

class LoopDetectedException extends AbstractServerErrorException
{
    protected int $statusCode = HttpStatus::STATUS_LOOP_DETECTED;
}
