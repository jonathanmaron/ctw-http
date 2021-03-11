<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class NotImplementedExceptionTest extends AbstractCase
{
    public function testNotImplementedException(): void
    {
        $message = '501 Not Implemented';

        try {
            throw new HttpException\NotImplementedException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(501, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testNotImplementedExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\NotImplementedException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(501, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
