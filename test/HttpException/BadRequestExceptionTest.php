<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;
use RuntimeException;

final class BadRequestExceptionTest extends AbstractCase
{
    /**
     * Test that getStatusCode() returns 400 when a BadRequestException is constructed.
     */
    public function testBadRequestExceptionStatusCode(): void
    {
        $exception = new HttpException\BadRequestException();

        self::assertSame(HttpStatus::STATUS_BAD_REQUEST, $exception->getStatusCode());
        self::assertSame(400, $exception->getStatusCode());
    }

    /**
     * Test that the message defaults to "400 Bad Request" when no message is provided.
     */
    public function testBadRequestExceptionDefaultMessage(): void
    {
        $statusCode = 400;
        $message    = '400 Bad Request';

        try {
            throw new HttpException\BadRequestException();
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
        }
    }

    /**
     * Test that the custom message is retained alongside the 400 status code when a message is provided.
     */
    public function testBadRequestExceptionWithCustomMessage(): void
    {
        $statusCode = 400;
        $message    = 'Custom error message with a detailed description of the problem.';

        try {
            throw new HttpException\BadRequestException($message);
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
        }
    }

    /**
     * Test that custom message and headers are retained alongside the status code when both are provided.
     */
    public function testBadRequestExceptionWithMessageAndHeaders(): void
    {
        $statusCode = 400;
        $message    = 'Custom error message with a detailed description of the problem.';
        $headers    = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\BadRequestException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
            self::assertSame($headers, $httpException->getHeaders());
        }
    }

    /**
     * Test that getHeaders() returns an empty array when no headers are provided.
     */
    public function testBadRequestExceptionWithoutHeaders(): void
    {
        $exception = new HttpException\BadRequestException();

        self::assertSame([], $exception->getHeaders());
    }

    /**
     * Test that the prior throwable is chained when a previous exception is supplied.
     */
    public function testBadRequestExceptionWithPreviousException(): void
    {
        $previousMessage = 'Previous exception message';
        $previous = new \Exception($previousMessage);

        $message = 'Bad request error';
        $exception = new HttpException\BadRequestException($message, $previous);

        self::assertSame($message, $exception->getMessage());
        self::assertSame($previous, $exception->getPrevious());
        self::assertSame($previousMessage, $exception->getPrevious()->getMessage());
    }

    /**
     * Test that the exception is an instance of HttpExceptionInterface when constructed.
     */
    public function testBadRequestExceptionImplementsHttpExceptionInterface(): void
    {
        $exception = new HttpException\BadRequestException();

        // @phpstan-ignore-next-line
        self::assertInstanceOf(HttpException\HttpExceptionInterface::class, $exception);
    }

    /**
     * Test that the exception is an instance of AbstractClientErrorException when constructed.
     */
    public function testBadRequestExceptionExtendsAbstractClientErrorException(): void
    {
        $exception = new HttpException\BadRequestException();

        // @phpstan-ignore-next-line
        self::assertInstanceOf(HttpException\AbstractClientErrorException::class, $exception);
    }

    /**
     * Test that the exception is an instance of AbstractException when constructed.
     */
    public function testBadRequestExceptionExtendsAbstractException(): void
    {
        $exception = new HttpException\BadRequestException();

        // @phpstan-ignore-next-line
        self::assertInstanceOf(HttpException\AbstractException::class, $exception);
    }

    /**
     * Test that the exception is an instance of the native RuntimeException when constructed.
     */
    public function testBadRequestExceptionExtendsRuntimeException(): void
    {
        $exception = new HttpException\BadRequestException();

        // @phpstan-ignore-next-line
        self::assertInstanceOf(RuntimeException::class, $exception);
    }

    /**
     * Test that the exception is catchable as HttpExceptionInterface when thrown.
     */
    public function testBadRequestExceptionCatchAsHttpExceptionInterface(): void
    {
        $message = 'Bad request error';

        try {
            throw new HttpException\BadRequestException($message);
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($message, $httpException->getMessage());
            self::assertSame(400, $httpException->getStatusCode());
        }
    }

    /**
     * Test that the exception is catchable as the native RuntimeException when thrown.
     */
    public function testBadRequestExceptionCatchAsRuntimeException(): void
    {
        $message = 'Bad request error';

        try {
            throw new HttpException\BadRequestException($message);
        } catch (RuntimeException $runtimeException) {
            self::assertSame($message, $runtimeException->getMessage());
            self::assertInstanceOf(HttpException\BadRequestException::class, $runtimeException);
        }
    }

    /**
     * Test that getCode() returns the supplied code when a non-zero code is provided.
     */
    public function testBadRequestExceptionWithCode(): void
    {
        $message = 'Bad request error';
        $code = 1000;
        $exception = new HttpException\BadRequestException($message, null, [], $code);

        self::assertSame($code, $exception->getCode());
    }

    /**
     * Test that getCode() returns zero when no code is provided.
     */
    public function testBadRequestExceptionDefaultCode(): void
    {
        $exception = new HttpException\BadRequestException();

        self::assertSame(0, $exception->getCode());
    }

    /**
     * Test that the string cast contains the class name and message when the exception is converted to a string.
     */
    public function testBadRequestExceptionToString(): void
    {
        $message = 'Bad request error';
        $exception = new HttpException\BadRequestException($message);

        $string = (string) $exception;

        self::assertStringContainsString(HttpException\BadRequestException::class, $string);
        self::assertStringContainsString($message, $string);
    }
}
