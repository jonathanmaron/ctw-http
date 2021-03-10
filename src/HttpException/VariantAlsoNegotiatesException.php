<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

use Ctw\Http\HttpStatus;

class VariantAlsoNegotiatesException extends AbstractServerErrorException
{
    protected int $statusCode = HttpStatus::STATUS_VARIANT_ALSO_NEGOTIATES;
}
