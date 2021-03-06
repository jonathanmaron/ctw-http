<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;

// phpcs:disable

class RequestTimeoutExceptionTest extends AbstractCase
{
    public function testRequestTimeoutException(): void
    {
        $statusCode = 408;
        $message    = '408 Request Timeout';

        try {
            throw new HttpException\RequestTimeoutException();
        } catch (HttpException\HttpExceptionInterface $e) {
            self::assertSame($statusCode, $e->getStatusCode());
            self::assertSame($message, $e->getMessage());
        }
    }

    public function testRequestTimeoutExceptionConstruct(): void
    {
        $statusCode = 408;
        $message    = 'Custom error message with a detailed description of the problem.';
        $headers    = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\RequestTimeoutException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            self::assertSame($statusCode, $e->getStatusCode());
            self::assertSame($message, $e->getMessage());
            self::assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
