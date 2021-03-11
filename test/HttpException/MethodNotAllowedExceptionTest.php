<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class MethodNotAllowedExceptionTest extends AbstractCase
{
    public function testMethodNotAllowedException(): void
    {
        $message = '405 Method Not Allowed';

        try {
            throw new HttpException\MethodNotAllowedException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(405, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testMethodNotAllowedExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\MethodNotAllowedException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(405, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
