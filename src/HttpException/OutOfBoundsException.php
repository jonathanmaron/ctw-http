<?php
declare(strict_types=1);

namespace TxTextControl\Http\HttpException;

use OutOfBoundsException as ParentOutOfBoundsException;

class OutOfBoundsException extends ParentOutOfBoundsException implements ExceptionInterface
{
}
