<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;

final class UnavailableForLegalReasonsExceptionTest extends AbstractCase
{
    /**
     * Test that UnavailableForLegalReasonsException, when constructed without arguments, reports its
     * status code and a default message derived from the status reason phrase.
     */
    public function testUnavailableForLegalReasonsExceptionDefaultsMessageToStatusCodeAndPhraseWhenConstructedWithoutArguments(): void
    {
        $statusCode = 451;
        $message    = '451 Unavailable For Legal Reasons';

        try {
            throw new HttpException\UnavailableForLegalReasonsException();
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
        }
    }

    /**
     * Test that UnavailableForLegalReasonsException retains the supplied custom message and headers
     * while still reporting its fixed status code when constructed with arguments.
     */
    public function testUnavailableForLegalReasonsExceptionRetainsCustomMessageAndHeadersWhenConstructedWithArguments(): void
    {
        $statusCode = 451;
        $message    = 'Custom error message with a detailed description of the problem.';
        $headers    = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\UnavailableForLegalReasonsException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
            self::assertSame($headers, $httpException->getHeaders());
        }
    }
}
