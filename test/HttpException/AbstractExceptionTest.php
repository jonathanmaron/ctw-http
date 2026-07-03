<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException\AbstractException;
use Ctw\Http\HttpException\HttpExceptionInterface;
use Ctw\Http\HttpStatus;
use Throwable;

final class AbstractExceptionTest extends AbstractCase
{
    /**
     * Test that the message defaults to the status code and reason phrase when
     * an empty message is supplied to the base constructor.
     */
    public function testDefaultsMessageToStatusCodeAndNameWhenMessageIsEmpty(): void
    {
        $exception = $this->createException();

        self::assertSame(404, $exception->getStatusCode());
        self::assertSame('404 Not Found', $exception->getMessage());
    }

    /**
     * Test that a supplied custom message is retained verbatim instead of the
     * generated default message, while the status code is unaffected.
     */
    public function testRetainsCustomMessageWhenProvided(): void
    {
        $message   = 'Custom error message with a detailed description of the problem.';
        $exception = $this->createException($message);

        self::assertSame($message, $exception->getMessage());
        self::assertSame(404, $exception->getStatusCode());
    }

    /**
     * Test that getHeaders() returns an empty array when no headers are supplied.
     */
    public function testReturnsEmptyHeadersByDefault(): void
    {
        $exception = $this->createException();

        self::assertSame([], $exception->getHeaders());
    }

    /**
     * Test that getHeaders() returns the exact header map supplied to the constructor.
     */
    public function testReturnsSuppliedHeaders(): void
    {
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        $exception = $this->createException('', null, $headers);

        self::assertSame($headers, $exception->getHeaders());
    }

    /**
     * Test that a supplied previous throwable is chained and retrievable via getPrevious().
     */
    public function testChainsPreviousThrowableWhenProvided(): void
    {
        $previous  = new \Exception('Previous exception');
        $exception = $this->createException('Wrapped', $previous);

        self::assertSame($previous, $exception->getPrevious());
    }

    /**
     * Test that getPrevious() returns null when no previous throwable is supplied.
     */
    public function testDefaultsPreviousToNullWhenNotProvided(): void
    {
        $exception = $this->createException();

        self::assertNull($exception->getPrevious());
    }

    /**
     * Test that getCode() returns the supplied non-zero code.
     */
    public function testReturnsSuppliedCodeWhenProvided(): void
    {
        $exception = $this->createException('Coded', null, [], 42);

        self::assertSame(42, $exception->getCode());
    }

    /**
     * Test that getCode() defaults to zero when no code is supplied.
     */
    public function testDefaultsCodeToZeroWhenNotProvided(): void
    {
        $exception = $this->createException();

        self::assertSame(0, $exception->getCode());
    }

    /**
     * Test that the abstract base satisfies the package HttpExceptionInterface contract.
     */
    public function testIsInstanceOfHttpExceptionInterface(): void
    {
        $exception = $this->createException();

        // @phpstan-ignore-next-line
        self::assertInstanceOf(HttpExceptionInterface::class, $exception);
    }

    /**
     * Test that casting the exception to a string includes its message.
     */
    public function testStringCastContainsMessage(): void
    {
        $message   = 'Custom error message with a detailed description of the problem.';
        $exception = $this->createException($message);

        self::assertStringContainsString($message, (string) $exception);
    }

    /**
     * Build a concrete, throwaway subclass of the abstract base under test,
     * fixed to the 404 Not Found status code, so the shared AbstractException
     * behavior can be exercised in isolation from any single HTTP exception.
     *
     * @param array<string, string> $headers
     */
    private function createException(
        string $message = '',
        ?Throwable $previous = null,
        array $headers = [],
        int $code = 0
    ): AbstractException {
        return new class($message, $previous, $headers, $code) extends AbstractException {
            #[\Override]
            protected int $statusCode = HttpStatus::STATUS_NOT_FOUND;
        };
    }
}
