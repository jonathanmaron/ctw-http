<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class ServiceUnavailableExceptionTest extends AbstractCase
{
    public function testServiceUnavailableException(): void
    {
        $message = '503 Service Unavailable';

        try {
            throw new HttpException\ServiceUnavailableException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(503, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testServiceUnavailableExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\ServiceUnavailableException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(503, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
