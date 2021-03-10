<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

interface HttpExceptionInterface
{
    /**
     * Return the status code.
     *
     * @return int
     */
    public function getStatusCode(): int;

    /**
     * Return the response headers.
     *
     * @return array
     */
    public function getHeaders(): array;

    /**
     * Set the response headers.
     *
     * @param array $headers
     *
     * @return $this
     */
    public function setHeaders(array $headers): self;
}
