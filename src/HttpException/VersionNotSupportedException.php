<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

use Ctw\Http\HttpStatus;

class VersionNotSupportedException extends AbstractServerErrorException
{
    protected int $statusCode = HttpStatus::STATUS_VERSION_NOT_SUPPORTED;
}
