<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;
use RuntimeException;

final class BadRequestExceptionTest extends AbstractCase
{
    /**
     * Test that exception has correct status code
     */
    public function testBadRequestExceptionStatusCode(): void
    {
        $exception = new HttpException\BadRequestException();

        self::assertSame(HttpStatus::STATUS_BAD_REQUEST, $exception->getStatusCode());
        self::assertSame(400, $exception->getStatusCode());
    }

    /**
     * Test that exception has default message when no message provided
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
     * Test that exception can be instantiated with custom message
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
     * Test that exception can be instantiated with custom message and headers
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
     * Test that exception returns empty array when no headers provided
     */
    public function testBadRequestExceptionWithoutHeaders(): void
    {
        $exception = new HttpException\BadRequestException();

        self::assertSame([], $exception->getHeaders());
    }

    /**
     * Test that exception can be instantiated with previous exception
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
     * Test that exception implements HttpExceptionInterface
     */
    public function testBadRequestExceptionImplementsHttpExceptionInterface(): void
    {
        $exception = new HttpException\BadRequestException();

        // @phpstan-ignore-next-line
        self::assertInstanceOf(HttpException\HttpExceptionInterface::class, $exception);
    }

    /**
     * Test that exception extends AbstractClientErrorException
     */
    public function testBadRequestExceptionExtendsAbstractClientErrorException(): void
    {
        $exception = new HttpException\BadRequestException();

        // @phpstan-ignore-next-line
        self::assertInstanceOf(HttpException\AbstractClientErrorException::class, $exception);
    }

    /**
     * Test that exception extends AbstractException
     */
    public function testBadRequestExceptionExtendsAbstractException(): void
    {
        $exception = new HttpException\BadRequestException();

        // @phpstan-ignore-next-line
        self::assertInstanceOf(HttpException\AbstractException::class, $exception);
    }

    /**
     * Test that exception extends RuntimeException
     */
    public function testBadRequestExceptionExtendsRuntimeException(): void
    {
        $exception = new HttpException\BadRequestException();

        // @phpstan-ignore-next-line
        self::assertInstanceOf(RuntimeException::class, $exception);
    }

    /**
     * Test that exception can be caught as HttpExceptionInterface
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
     * Test that exception can be caught as RuntimeException
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
     * Test that exception has correct code when provided
     */
    public function testBadRequestExceptionWithCode(): void
    {
        $message = 'Bad request error';
        $code = 1000;
        $exception = new HttpException\BadRequestException($message, null, [], $code);

        self::assertSame($code, $exception->getCode());
    }

    /**
     * Test that exception has default code of zero
     */
    public function testBadRequestExceptionDefaultCode(): void
    {
        $exception = new HttpException\BadRequestException();

        self::assertSame(0, $exception->getCode());
    }

    /**
     * Test that exception has correct string representation
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
