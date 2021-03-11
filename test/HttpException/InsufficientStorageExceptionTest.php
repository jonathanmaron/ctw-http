<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class InsufficientStorageExceptionTest extends AbstractCase
{
    public function testInsufficientStorageException(): void
    {
        $message = '507 Insufficient Storage';

        try {
            throw new HttpException\InsufficientStorageException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(507, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testInsufficientStorageExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\InsufficientStorageException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(507, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
