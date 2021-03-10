<?php
declare(strict_types=1);

namespace TxTextControl\Http\HttpException;

use TxTextControl\Http\HttpStatus;

class UpgradeRequiredException extends AbstractClientErrorException
{
    protected int $statusCode = HttpStatus::STATUS_UPGRADE_REQUIRED;
}
