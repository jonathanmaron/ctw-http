<?php
declare(strict_types=1);

namespace TxTextControl\Http\HttpException;

interface HttpExceptionInterface
{
    /**
     * Returns the status code.
     *
     * @return int An HTTP response status code
     */
    public function getStatusCode(): int;

    /**
     * Returns response headers.
     *
     * @return string[] Response headers
     */
    public function getHeaders(): array;
}
