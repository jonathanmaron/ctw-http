<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class TooManyRequestsExceptionTest extends AbstractCase
{
    public function testTooManyRequestsException(): void
    {
        $message = '429 Too Many Requests';

        try {
            throw new HttpException\TooManyRequestsException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(429, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testTooManyRequestsExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\TooManyRequestsException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(429, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
