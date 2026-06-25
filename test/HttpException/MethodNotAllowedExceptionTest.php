<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;

final class MethodNotAllowedExceptionTest extends AbstractCase
{
    /**
     * Test that MethodNotAllowedException, when constructed without arguments, reports its
     * status code and a default message derived from the status reason phrase.
     */
    public function testMethodNotAllowedExceptionDefaultsMessageToStatusCodeAndPhraseWhenConstructedWithoutArguments(): void
    {
        $statusCode = 405;
        $message    = '405 Method Not Allowed';

        try {
            throw new HttpException\MethodNotAllowedException();
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
        }
    }

    /**
     * Test that MethodNotAllowedException retains the supplied custom message and headers
     * while still reporting its fixed status code when constructed with arguments.
     */
    public function testMethodNotAllowedExceptionRetainsCustomMessageAndHeadersWhenConstructedWithArguments(): void
    {
        $statusCode = 405;
        $message    = 'Custom error message with a detailed description of the problem.';
        $headers    = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\MethodNotAllowedException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
            self::assertSame($headers, $httpException->getHeaders());
        }
    }
}
