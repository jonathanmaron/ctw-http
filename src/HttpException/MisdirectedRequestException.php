<?php
declare(strict_types=1);

namespace TxTextControl\Http\HttpException;

use TxTextControl\Http\HttpStatus;

class MisdirectedRequestException extends AbstractClientErrorException
{
    protected int $statusCode = HttpStatus::STATUS_MISDIRECTED_REQUEST;
}
