<?php
declare(strict_types=1);

namespace TxTextControl\Http\HttpException;

use TxTextControl\Http\HttpStatus;

class UnavailableForLegalReasonsException extends AbstractClientErrorException
{
    protected int $statusCode = HttpStatus::STATUS_UNAVAILABLE_FOR_LEGAL_REASONS;
}
