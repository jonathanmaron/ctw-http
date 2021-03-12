<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;

// phpcs:disable

class MethodNotAllowedExceptionTest extends AbstractCase
{
    public function testMethodNotAllowedException(): void
    {
        $statusCode = 405;
        $message    = '405 Method Not Allowed';

        try {
            throw new HttpException\MethodNotAllowedException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame($statusCode, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testMethodNotAllowedExceptionConstruct(): void
    {
        $statusCode = 405;
        $message    = 'Custom error message with a detailed description of the problem.';
        $headers    = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\MethodNotAllowedException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame($statusCode, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }

    public function testMethodNotAllowedExceptionSetGet(): void
    {
        $statusCode = rand(400, 450);
        $headers    = [
            'Age'    => 30,
            'Pragma' => 'no-cache',
        ];

        $exception = new HttpException\MethodNotAllowedException();
        $exception->setHeaders($headers);
        $exception->setStatusCode($statusCode);

        $this->assertSame($headers, $exception->getHeaders());
        $this->assertSame($statusCode, $exception->getStatusCode());
    }
}

// phpcs:disable
