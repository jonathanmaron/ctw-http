<?php
declare(strict_types=1);

namespace TxTextControl\Http\HttpException;

use InvalidArgumentException as ParentInvalidArgumentException;

class InvalidArgumentException extends ParentInvalidArgumentException implements ExceptionInterface
{
}
