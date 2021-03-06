<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;

// phpcs:disable

class RangeNotSatisfiableExceptionTest extends AbstractCase
{
    public function testRangeNotSatisfiableException(): void
    {
        $statusCode = 416;
        $message    = '416 Range Not Satisfiable';

        try {
            throw new HttpException\RangeNotSatisfiableException();
        } catch (HttpException\HttpExceptionInterface $e) {
            self::assertSame($statusCode, $e->getStatusCode());
            self::assertSame($message, $e->getMessage());
        }
    }

    public function testRangeNotSatisfiableExceptionConstruct(): void
    {
        $statusCode = 416;
        $message    = 'Custom error message with a detailed description of the problem.';
        $headers    = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\RangeNotSatisfiableException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            self::assertSame($statusCode, $e->getStatusCode());
            self::assertSame($message, $e->getMessage());
            self::assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
