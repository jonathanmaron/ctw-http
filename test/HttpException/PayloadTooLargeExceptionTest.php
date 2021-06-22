<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;

// phpcs:disable

class PayloadTooLargeExceptionTest extends AbstractCase
{
    public function testPayloadTooLargeException(): void
    {
        $statusCode = 413;
        $message    = '413 Payload Too Large';

        try {
            throw new HttpException\PayloadTooLargeException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame($statusCode, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testPayloadTooLargeExceptionConstruct(): void
    {
        $statusCode = 413;
        $message    = 'Custom error message with a detailed description of the problem.';
        $headers    = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\PayloadTooLargeException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            self::assertSame($statusCode, $e->getStatusCode());
            self::assertSame($message, $e->getMessage());
            self::assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
