<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;

final class UpgradeRequiredExceptionTest extends AbstractCase
{
    /**
     * Test that UpgradeRequiredException, when constructed without arguments, reports its
     * status code and a default message derived from the status reason phrase.
     */
    public function testUpgradeRequiredExceptionDefaultsMessageToStatusCodeAndPhraseWhenConstructedWithoutArguments(): void
    {
        $statusCode = 426;
        $message    = '426 Upgrade Required';

        try {
            throw new HttpException\UpgradeRequiredException();
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
        }
    }

    /**
     * Test that UpgradeRequiredException retains the supplied custom message and headers
     * while still reporting its fixed status code when constructed with arguments.
     */
    public function testUpgradeRequiredExceptionRetainsCustomMessageAndHeadersWhenConstructedWithArguments(): void
    {
        $statusCode = 426;
        $message    = 'Custom error message with a detailed description of the problem.';
        $headers    = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\UpgradeRequiredException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
            self::assertSame($headers, $httpException->getHeaders());
        }
    }
}
