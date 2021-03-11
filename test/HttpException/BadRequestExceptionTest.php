<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class BadRequestExceptionTest extends AbstractCase
{
    public function testBadRequestException(): void
    {
        $message = '400 Bad Request';

        try {
            throw new HttpException\BadRequestException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(400, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testBadRequestExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\BadRequestException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(400, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
