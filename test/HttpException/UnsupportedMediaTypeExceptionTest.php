<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;

final class UnsupportedMediaTypeExceptionTest extends AbstractCase
{
    /**
     * Test that UnsupportedMediaTypeException, when constructed without arguments, reports its
     * status code and a default message derived from the status reason phrase.
     */
    public function testUnsupportedMediaTypeExceptionDefaultsMessageToStatusCodeAndPhraseWhenConstructedWithoutArguments(): void
    {
        $statusCode = 415;
        $message    = '415 Unsupported Media Type';

        try {
            throw new HttpException\UnsupportedMediaTypeException();
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
        }
    }

    /**
     * Test that UnsupportedMediaTypeException retains the supplied custom message and headers
     * while still reporting its fixed status code when constructed with arguments.
     */
    public function testUnsupportedMediaTypeExceptionRetainsCustomMessageAndHeadersWhenConstructedWithArguments(): void
    {
        $statusCode = 415;
        $message    = 'Custom error message with a detailed description of the problem.';
        $headers    = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\UnsupportedMediaTypeException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
            self::assertSame($headers, $httpException->getHeaders());
        }
    }
}
