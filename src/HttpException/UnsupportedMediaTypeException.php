<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

use Ctw\Http\HttpStatus;

class UnsupportedMediaTypeException extends AbstractClientErrorException
{
    protected int $statusCode = HttpStatus::STATUS_UNSUPPORTED_MEDIA_TYPE;
}
