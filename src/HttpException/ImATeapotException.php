<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

use Ctw\Http\HttpStatus;

class ImATeapotException extends AbstractClientErrorException
{
    protected int $statusCode = HttpStatus::STATUS_IM_A_TEAPOT;
}
