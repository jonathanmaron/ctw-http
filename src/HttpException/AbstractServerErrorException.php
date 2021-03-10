<?php
declare(strict_types=1);

namespace TxTextControl\Http\HttpException;

abstract class AbstractServerErrorException extends AbstractException
{
    protected     $message    = 'Server Error 5xx';

    protected int $statusCode = 5;
}
