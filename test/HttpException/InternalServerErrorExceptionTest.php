<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class InternalServerErrorExceptionTest extends AbstractCase
{
    public function testInternalServerErrorException(): void
    {
        $message = '500 Internal Server Error';

        try {
            throw new HttpException\InternalServerErrorException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(500, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testInternalServerErrorExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\InternalServerErrorException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(500, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
