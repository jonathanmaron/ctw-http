<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class UnsupportedMediaTypeExceptionTest extends AbstractCase
{
    public function testUnsupportedMediaTypeException(): void
    {
        $message = '415 Unsupported Media Type';

        try {
            throw new HttpException\UnsupportedMediaTypeException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(415, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testUnsupportedMediaTypeExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\UnsupportedMediaTypeException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(415, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
