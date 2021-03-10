<?php
declare(strict_types=1);

namespace TxTextControl\Http\HttpException;

use RuntimeException;
use Throwable;
use TxTextControl\Http\HttpStatus;


abstract class AbstractException extends RuntimeException implements HttpExceptionInterface
{
    //protected $message    = '';

    //protected int $statusCode = 0;

    private   array $headers;

    public function __construct(string $message = null, Throwable $previous = null, array $headers = [], int $code = 0)
    {
        $this->headers = $headers;

        if (empty($message)) {
            $statusCode = $this->getStatusCode();
            $message = sprintf('%d %s', $statusCode, HttpStatus::getTitle($statusCode));
        }

        parent::__construct($message, $code, $previous);

        //parent::__construct()
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }
}
