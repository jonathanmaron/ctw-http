<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;

final class GatewayTimeoutExceptionTest extends AbstractCase
{
    /**
     * Test that GatewayTimeoutException, when constructed without arguments, reports its
     * status code and a default message derived from the status reason phrase.
     */
    public function testGatewayTimeoutExceptionDefaultsMessageToStatusCodeAndPhraseWhenConstructedWithoutArguments(): void
    {
        $statusCode = 504;
        $message    = '504 Gateway Timeout';

        try {
            throw new HttpException\GatewayTimeoutException();
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
        }
    }

    /**
     * Test that GatewayTimeoutException retains the supplied custom message and headers
     * while still reporting its fixed status code when constructed with arguments.
     */
    public function testGatewayTimeoutExceptionRetainsCustomMessageAndHeadersWhenConstructedWithArguments(): void
    {
        $statusCode = 504;
        $message    = 'Custom error message with a detailed description of the problem.';
        $headers    = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\GatewayTimeoutException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
            self::assertSame($headers, $httpException->getHeaders());
        }
    }
}
