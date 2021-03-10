<?php
declare(strict_types=1);

namespace TxTextControl\Http\HttpException;

use TxTextControl\Http\HttpStatus;

class VariantAlsoNegotiatesException extends AbstractServerErrorException
{
    protected int $statusCode = HttpStatus::STATUS_VARIANT_ALSO_NEGOTIATES;
}
