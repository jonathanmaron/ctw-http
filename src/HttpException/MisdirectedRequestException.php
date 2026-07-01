<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

use Ctw\Http\HttpStatus;

class MisdirectedRequestException extends AbstractClientErrorException
{
    #[\Override]
    protected int $statusCode = HttpStatus::STATUS_MISDIRECTED_REQUEST;
}
