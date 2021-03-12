<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;

// phpcs:disable

class TooEarlyExceptionTest extends AbstractCase
{
    public function testTooEarlyException(): void
    {
        $statusCode = 425;
        $message    = '425 Too Early';

        try {
            throw new HttpException\TooEarlyException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame($statusCode, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testTooEarlyExceptionConstruct(): void
    {
        $statusCode = 425;
        $message    = 'Custom error message with a detailed description of the problem.';
        $headers    = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\TooEarlyException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame($statusCode, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }

    public function testTooEarlyExceptionSetGet(): void
    {
        $statusCode = rand(400, 450);
        $headers    = [
            'Age'    => 30,
            'Pragma' => 'no-cache',
        ];

        $exception = new HttpException\TooEarlyException();
        $exception->setHeaders($headers);
        $exception->setStatusCode($statusCode);

        $this->assertSame($headers, $exception->getHeaders());
        $this->assertSame($statusCode, $exception->getStatusCode());
    }
}

// phpcs:disable
