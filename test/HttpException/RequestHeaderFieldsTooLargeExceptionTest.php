<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;

final class RequestHeaderFieldsTooLargeExceptionTest extends AbstractCase
{
    /**
     * Test that RequestHeaderFieldsTooLargeException, when constructed without arguments, reports its
     * status code and a default message derived from the status reason phrase.
     */
    public function testRequestHeaderFieldsTooLargeExceptionDefaultsMessageToStatusCodeAndPhraseWhenConstructedWithoutArguments(): void
    {
        $statusCode = 431;
        $message    = '431 Request Header Fields Too Large';

        try {
            throw new HttpException\RequestHeaderFieldsTooLargeException();
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
        }
    }

    /**
     * Test that RequestHeaderFieldsTooLargeException retains the supplied custom message and headers
     * while still reporting its fixed status code when constructed with arguments.
     */
    public function testRequestHeaderFieldsTooLargeExceptionRetainsCustomMessageAndHeadersWhenConstructedWithArguments(): void
    {
        $statusCode = 431;
        $message    = 'Custom error message with a detailed description of the problem.';
        $headers    = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\RequestHeaderFieldsTooLargeException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
            self::assertSame($headers, $httpException->getHeaders());
        }
    }
}
