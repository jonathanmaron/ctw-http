<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class RangeNotSatisfiableExceptionTest extends AbstractCase
{
    public function testRangeNotSatisfiableException(): void
    {
        $message = '416 Range Not Satisfiable';

        try {
            throw new HttpException\RangeNotSatisfiableException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(416, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testRangeNotSatisfiableExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\RangeNotSatisfiableException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(416, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
