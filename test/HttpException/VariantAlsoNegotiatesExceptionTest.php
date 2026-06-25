<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;

final class VariantAlsoNegotiatesExceptionTest extends AbstractCase
{
    /**
     * Test that VariantAlsoNegotiatesException, when constructed without arguments, reports its
     * status code and a default message derived from the status reason phrase.
     */
    public function testVariantAlsoNegotiatesExceptionDefaultsMessageToStatusCodeAndPhraseWhenConstructedWithoutArguments(): void
    {
        $statusCode = 506;
        $message    = '506 Variant Also Negotiates';

        try {
            throw new HttpException\VariantAlsoNegotiatesException();
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
        }
    }

    /**
     * Test that VariantAlsoNegotiatesException retains the supplied custom message and headers
     * while still reporting its fixed status code when constructed with arguments.
     */
    public function testVariantAlsoNegotiatesExceptionRetainsCustomMessageAndHeadersWhenConstructedWithArguments(): void
    {
        $statusCode = 506;
        $message    = 'Custom error message with a detailed description of the problem.';
        $headers    = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\VariantAlsoNegotiatesException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
            self::assertSame($headers, $httpException->getHeaders());
        }
    }
}
