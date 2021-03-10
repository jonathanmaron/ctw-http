<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

use Ctw\Http\HttpStatus;

class LoopDetectedException extends AbstractServerErrorException
{
    protected int $statusCode = HttpStatus::STATUS_LOOP_DETECTED;
}
