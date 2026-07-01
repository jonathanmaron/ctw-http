<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;
use RuntimeException;

final class BadGatewayExceptionTest extends AbstractCase
{
    /**
     * Test that getStatusCode() returns 502 when a BadGatewayException is constructed.
     */
    public function testBadGatewayExceptionStatusCode(): void
    {
        $exception = new HttpException\BadGatewayException();

        self::assertSame(HttpStatus::STATUS_BAD_GATEWAY, $exception->getStatusCode());
        self::assertSame(502, $exception->getStatusCode());
    }

    /**
     * Test that BadGatewayException, when constructed without arguments, reports its
     * status code and a default message derived from the status reason phrase.
     */
    public function testBadGatewayExceptionDefaultsMessageToStatusCodeAndPhraseWhenConstructedWithoutArguments(): void
    {
        $statusCode = 502;
        $message    = '502 Bad Gateway';

        try {
            throw new HttpException\BadGatewayException();
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
        }
    }

    /**
     * Test that the custom message is retained alongside the 502 status code when a message is provided.
     */
    public function testBadGatewayExceptionWithCustomMessage(): void
    {
        $statusCode = 502;
        $message    = 'Custom error message with a detailed description of the problem.';

        try {
            throw new HttpException\BadGatewayException($message);
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
        }
    }

    /**
     * Test that BadGatewayException retains the supplied custom message and headers
     * while still reporting its fixed status code when constructed with arguments.
     */
    public function testBadGatewayExceptionRetainsCustomMessageAndHeadersWhenConstructedWithArguments(): void
    {
        $statusCode = 502;
        $message    = 'Custom error message with a detailed description of the problem.';
        $headers    = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\BadGatewayException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
            self::assertSame($headers, $httpException->getHeaders());
        }
    }

    /**
     * Test that getHeaders() returns an empty array when no headers are provided.
     */
    public function testBadGatewayExceptionWithoutHeaders(): void
    {
        $exception = new HttpException\BadGatewayException();

        self::assertSame([], $exception->getHeaders());
    }

    /**
     * Test that the prior throwable is chained when a previous exception is supplied.
     */
    public function testBadGatewayExceptionWithPreviousException(): void
    {
        $previousMessage = 'Previous exception message';
        $previous = new \Exception($previousMessage);

        $message = 'Bad gateway error';
        $exception = new HttpException\BadGatewayException($message, $previous);

        self::assertSame($message, $exception->getMessage());
        self::assertSame($previous, $exception->getPrevious());
        self::assertSame($previousMessage, $exception->getPrevious()->getMessage());
    }

    /**
     * Test that the exception is an instance of HttpExceptionInterface when constructed.
     */
    public function testBadGatewayExceptionImplementsHttpExceptionInterface(): void
    {
        $exception = new HttpException\BadGatewayException();

        // @phpstan-ignore-next-line
        self::assertInstanceOf(HttpException\HttpExceptionInterface::class, $exception);
    }

    /**
     * Test that the exception is an instance of AbstractServerErrorException when constructed.
     */
    public function testBadGatewayExceptionExtendsAbstractServerErrorException(): void
    {
        $exception = new HttpException\BadGatewayException();

        // @phpstan-ignore-next-line
        self::assertInstanceOf(HttpException\AbstractServerErrorException::class, $exception);
    }

    /**
     * Test that the exception is an instance of AbstractException when constructed.
     */
    public function testBadGatewayExceptionExtendsAbstractException(): void
    {
        $exception = new HttpException\BadGatewayException();

        // @phpstan-ignore-next-line
        self::assertInstanceOf(HttpException\AbstractException::class, $exception);
    }

    /**
     * Test that the exception is an instance of the native RuntimeException when constructed.
     */
    public function testBadGatewayExceptionExtendsRuntimeException(): void
    {
        $exception = new HttpException\BadGatewayException();

        // @phpstan-ignore-next-line
        self::assertInstanceOf(RuntimeException::class, $exception);
    }

    /**
     * Test that the exception is catchable as HttpExceptionInterface when thrown.
     */
    public function testBadGatewayExceptionCatchAsHttpExceptionInterface(): void
    {
        $message = 'Bad gateway error';

        try {
            throw new HttpException\BadGatewayException($message);
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($message, $httpException->getMessage());
            self::assertSame(502, $httpException->getStatusCode());
        }
    }

    /**
     * Test that the exception is catchable as the native RuntimeException when thrown.
     */
    public function testBadGatewayExceptionCatchAsRuntimeException(): void
    {
        $message = 'Bad gateway error';

        try {
            throw new HttpException\BadGatewayException($message);
        } catch (RuntimeException $runtimeException) {
            self::assertSame($message, $runtimeException->getMessage());
            self::assertInstanceOf(HttpException\BadGatewayException::class, $runtimeException);
        }
    }

    /**
     * Test that getCode() returns the supplied code when a non-zero code is provided.
     */
    public function testBadGatewayExceptionWithCode(): void
    {
        $message = 'Bad gateway error';
        $code = 1000;
        $exception = new HttpException\BadGatewayException($message, null, [], $code);

        self::assertSame($code, $exception->getCode());
    }

    /**
     * Test that getCode() returns zero when no code is provided.
     */
    public function testBadGatewayExceptionDefaultCode(): void
    {
        $exception = new HttpException\BadGatewayException();

        self::assertSame(0, $exception->getCode());
    }

    /**
     * Test that the string cast contains the class name and message when the exception is converted to a string.
     */
    public function testBadGatewayExceptionToString(): void
    {
        $message = 'Bad gateway error';
        $exception = new HttpException\BadGatewayException($message);

        $string = (string) $exception;

        self::assertStringContainsString(HttpException\BadGatewayException::class, $string);
        self::assertStringContainsString($message, $string);
    }
}
