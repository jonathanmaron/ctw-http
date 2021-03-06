<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;

// phpcs:disable

class InternalServerErrorExceptionTest extends AbstractCase
{
    public function testInternalServerErrorException(): void
    {
        $statusCode = 500;
        $message    = '500 Internal Server Error';

        try {
            throw new HttpException\InternalServerErrorException();
        } catch (HttpException\HttpExceptionInterface $e) {
            self::assertSame($statusCode, $e->getStatusCode());
            self::assertSame($message, $e->getMessage());
        }
    }

    public function testInternalServerErrorExceptionConstruct(): void
    {
        $statusCode = 500;
        $message    = 'Custom error message with a detailed description of the problem.';
        $headers    = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\InternalServerErrorException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            self::assertSame($statusCode, $e->getStatusCode());
            self::assertSame($message, $e->getMessage());
            self::assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
