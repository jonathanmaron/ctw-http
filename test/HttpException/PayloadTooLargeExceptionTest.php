<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class PayloadTooLargeExceptionTest extends AbstractCase
{
    public function testPayloadTooLargeException(): void
    {
        $message = '413 Payload Too Large';

        try {
            throw new HttpException\PayloadTooLargeException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(413, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testPayloadTooLargeExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\PayloadTooLargeException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(413, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable