<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

use Ctw\Http\HttpStatus;

class UpgradeRequiredException extends AbstractClientErrorException
{
    protected int $statusCode = HttpStatus::STATUS_UPGRADE_REQUIRED;
}
