<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

use Ctw\Http\HttpStatus;
use RuntimeException;
use Throwable;

abstract class AbstractException extends RuntimeException implements HttpExceptionInterface
{
    protected int   $statusCode;

    public function __construct(
        string $message = '',
        Throwable $previous = null,
        protected array $headers = [],
        int $code = 0
    ) {
        if ('' === $message) {
            $statusCode = $this->getStatusCode();
            $entity     = (new HttpStatus($statusCode))->get();
            $message    = sprintf('%d %s', $entity->statusCode, $entity->name);
        }

        parent::__construct($message, $code, $previous);
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }
}
