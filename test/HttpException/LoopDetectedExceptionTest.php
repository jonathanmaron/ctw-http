<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;

// phpcs:disable

class LoopDetectedExceptionTest extends AbstractCase
{
    public function testLoopDetectedException(): void
    {
        $statusCode = 508;
        $message    = '508 Loop Detected';

        try {
            throw new HttpException\LoopDetectedException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame($statusCode, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testLoopDetectedExceptionConstruct(): void
    {
        $statusCode = 508;
        $message    = 'Custom error message with a detailed description of the problem.';
        $headers    = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\LoopDetectedException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame($statusCode, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }

    public function testLoopDetectedExceptionSetGet(): void
    {
        $statusCode = rand(400, 450);
        $headers    = [
            'Age'    => 30,
            'Pragma' => 'no-cache',
        ];

        $exception = new HttpException\LoopDetectedException();
        $exception->setHeaders($headers);
        $exception->setStatusCode($statusCode);

        $this->assertSame($headers, $exception->getHeaders());
        $this->assertSame($statusCode, $exception->getStatusCode());
    }
}

// phpcs:disable
