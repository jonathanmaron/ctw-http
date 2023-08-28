<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;

class RequestHeaderFieldsTooLargeExceptionTest extends AbstractCase
{
    public function testRequestHeaderFieldsTooLargeException(): void
    {
        $statusCode = 431;
        $message    = '431 Request Header Fields Too Large';

        try {
            throw new HttpException\RequestHeaderFieldsTooLargeException();
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
        }
    }

    public function testRequestHeaderFieldsTooLargeExceptionConstruct(): void
    {
        $statusCode = 431;
        $message    = 'Custom error message with a detailed description of the problem.';
        $headers    = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\RequestHeaderFieldsTooLargeException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $httpException) {
            self::assertSame($statusCode, $httpException->getStatusCode());
            self::assertSame($message, $httpException->getMessage());
            self::assertSame($headers, $httpException->getHeaders());
        }
    }
}
