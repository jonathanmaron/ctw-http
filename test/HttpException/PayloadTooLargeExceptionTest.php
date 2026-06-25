<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;

final class PayloadTooLargeExceptionTest extends AbstractCase
{
    /**
     * Test that PayloadTooLargeException, when constructed without arguments, reports its
     * status code and a default message derived from the status reason phrase.
     */
    public function testPayloadTooLargeExceptionDefaultsMessageToStatusCodeAndPhraseWhenConstructedWithoutArguments(): void
    {
        $statusCode = 413;
        $message    = '413 Payload Too Large';

        try {
            throw new HttpException\PayloadTooLargeException();
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
        }
    }

    /**
     * Test that PayloadTooLargeException retains the supplied custom message and headers
     * while still reporting its fixed status code when constructed with arguments.
     */
    public function testPayloadTooLargeExceptionRetainsCustomMessageAndHeadersWhenConstructedWithArguments(): void
    {
        $statusCode = 413;
        $message    = 'Custom error message with a detailed description of the problem.';
        $headers    = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\PayloadTooLargeException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
            self::assertSame($headers, $httpException->getHeaders());
        }
    }
}
