<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class LoopDetectedExceptionTest extends AbstractCase
{
    public function testLoopDetectedException(): void
    {
        $message = '508 Loop Detected';

        try {
            throw new HttpException\LoopDetectedException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(508, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testLoopDetectedExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\LoopDetectedException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(508, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
