<?php
declare(strict_types=1);

namespace TxTextControl\Http\HttpException;

use TxTextControl\Http\HttpStatus;

class VersionNotSupportedException extends AbstractServerErrorException
{
    protected int $statusCode = HttpStatus::STATUS_VERSION_NOT_SUPPORTED;
}
