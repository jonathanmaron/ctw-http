<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;

final class PreconditionRequiredExceptionTest extends AbstractCase
{
    /**
     * Test that PreconditionRequiredException, when constructed without arguments, reports its
     * status code and a default message derived from the status reason phrase.
     */
    public function testPreconditionRequiredExceptionDefaultsMessageToStatusCodeAndPhraseWhenConstructedWithoutArguments(): void
    {
        $statusCode = 428;
        $message    = '428 Precondition Required';

        try {
            throw new HttpException\PreconditionRequiredException();
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
        }
    }

    /**
     * Test that PreconditionRequiredException retains the supplied custom message and headers
     * while still reporting its fixed status code when constructed with arguments.
     */
    public function testPreconditionRequiredExceptionRetainsCustomMessageAndHeadersWhenConstructedWithArguments(): void
    {
        $statusCode = 428;
        $message    = 'Custom error message with a detailed description of the problem.';
        $headers    = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\PreconditionRequiredException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
            self::assertSame($headers, $httpException->getHeaders());
        }
    }
}
