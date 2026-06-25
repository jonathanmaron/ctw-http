<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;

final class ServiceUnavailableExceptionTest extends AbstractCase
{
    /**
     * Test that ServiceUnavailableException, when constructed without arguments, reports its
     * status code and a default message derived from the status reason phrase.
     */
    public function testServiceUnavailableExceptionDefaultsMessageToStatusCodeAndPhraseWhenConstructedWithoutArguments(): void
    {
        $statusCode = 503;
        $message    = '503 Service Unavailable';

        try {
            throw new HttpException\ServiceUnavailableException();
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
        }
    }

    /**
     * Test that ServiceUnavailableException retains the supplied custom message and headers
     * while still reporting its fixed status code when constructed with arguments.
     */
    public function testServiceUnavailableExceptionRetainsCustomMessageAndHeadersWhenConstructedWithArguments(): void
    {
        $statusCode = 503;
        $message    = 'Custom error message with a detailed description of the problem.';
        $headers    = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\ServiceUnavailableException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
            self::assertSame($headers, $httpException->getHeaders());
        }
    }
}
