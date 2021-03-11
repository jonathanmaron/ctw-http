<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class RequestTimeoutExceptionTest extends AbstractCase
{
    public function testRequestTimeoutException(): void
    {
        $message = '408 Request Timeout';

        try {
            throw new HttpException\RequestTimeoutException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(408, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testRequestTimeoutExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\RequestTimeoutException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(408, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
