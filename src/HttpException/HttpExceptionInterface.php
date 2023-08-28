<?php
declare(strict_types=1);

namespace Ctw\Http\HttpException;

use Throwable;

interface HttpExceptionInterface
{
    
    public function __construct(string $message = '', Throwable $previous = null, array $headers = [], int $code = 0);

    /**
     * Return a string representation of the exception.
     *
     * @return string
     */
    public function __toString();

    /**
     * Return the exception message.
     *
     * @return string
     */
    public function getMessage();

    /**
     * Return the previous exception.
     *
     * @return Throwable
     */
    public function getPrevious();

    /**
     * Return the exception code.
     *
     * @return mixed
     */
    public function getCode();

    /**
     * Return the file in which the exception was created.
     *
     * @return string
     */
    public function getFile();

    /**
     * Return the line in which the exception was created.
     *
     * @return int
     */
    public function getLine();

    /**
     * Return the stack trace.
     *
     * @return array
     */
    public function getTrace();

    /**
     * Return the stack trace as a string.
     *
     * @return string
     */
    public function getTraceAsString();

    /**
     * Return the status code.
     */
    public function getStatusCode(): int;

    /**
     * Return the response headers.
     */
    public function getHeaders(): array;
}
