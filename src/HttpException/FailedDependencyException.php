<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

use Ctw\Http\HttpStatus;

class FailedDependencyException extends AbstractClientErrorException
{
    protected int $statusCode = HttpStatus::STATUS_FAILED_DEPENDENCY;
}
