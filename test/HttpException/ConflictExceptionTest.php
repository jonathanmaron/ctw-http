<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class ConflictExceptionTest extends AbstractCase
{
    public function testConflictException(): void
    {
        $message = '409 Conflict';

        try {
            throw new HttpException\ConflictException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(409, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testConflictExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\ConflictException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(409, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
