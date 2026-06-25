<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;

final class VersionNotSupportedExceptionTest extends AbstractCase
{
    /**
     * Test that VersionNotSupportedException, when constructed without arguments, reports its
     * status code and a default message derived from the status reason phrase.
     */
    public function testVersionNotSupportedExceptionDefaultsMessageToStatusCodeAndPhraseWhenConstructedWithoutArguments(): void
    {
        $statusCode = 505;
        $message    = '505 HTTP Version Not Supported';

        try {
            throw new HttpException\VersionNotSupportedException();
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
        }
    }

    /**
     * Test that VersionNotSupportedException retains the supplied custom message and headers
     * while still reporting its fixed status code when constructed with arguments.
     */
    public function testVersionNotSupportedExceptionRetainsCustomMessageAndHeadersWhenConstructedWithArguments(): void
    {
        $statusCode = 505;
        $message    = 'Custom error message with a detailed description of the problem.';
        $headers    = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\VersionNotSupportedException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
            self::assertSame($headers, $httpException->getHeaders());
        }
    }
}
