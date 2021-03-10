<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

use Ctw\Http\HttpStatus;

class UnavailableForLegalReasonsException extends AbstractClientErrorException
{
    protected int $statusCode = HttpStatus::STATUS_UNAVAILABLE_FOR_LEGAL_REASONS;
}
