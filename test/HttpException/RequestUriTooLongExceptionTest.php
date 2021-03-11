<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class RequestUriTooLongExceptionTest extends AbstractCase
{
    public function testRequestUriTooLongException(): void
    {
        $message = '414 URI Too Long';

        try {
            throw new HttpException\RequestUriTooLongException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(414, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testRequestUriTooLongExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\RequestUriTooLongException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(414, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable