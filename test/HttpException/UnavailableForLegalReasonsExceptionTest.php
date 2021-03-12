<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;

// phpcs:disable

class UnavailableForLegalReasonsExceptionTest extends AbstractCase
{
    public function testUnavailableForLegalReasonsException(): void
    {
        $statusCode = 451;
        $message    = '451 Unavailable For Legal Reasons';

        try {
            throw new HttpException\UnavailableForLegalReasonsException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame($statusCode, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testUnavailableForLegalReasonsExceptionConstruct(): void
    {
        $statusCode = 451;
        $message    = 'Custom error message with a detailed description of the problem.';
        $headers    = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\UnavailableForLegalReasonsException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame($statusCode, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }

    public function testUnavailableForLegalReasonsExceptionSetGet(): void
    {
        $statusCode = rand(400, 450);
        $headers    = [
            'Age'    => 30,
            'Pragma' => 'no-cache',
        ];

        $exception = new HttpException\UnavailableForLegalReasonsException();
        $exception->setHeaders($headers);
        $exception->setStatusCode($statusCode);

        $this->assertSame($headers, $exception->getHeaders());
        $this->assertSame($statusCode, $exception->getStatusCode());
    }
}

// phpcs:disable
