<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;

// phpcs:disable

class VariantAlsoNegotiatesExceptionTest extends AbstractCase
{
    public function testVariantAlsoNegotiatesException(): void
    {
        $statusCode = 506;
        $message    = '506 Variant Also Negotiates';

        try {
            throw new HttpException\VariantAlsoNegotiatesException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame($statusCode, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testVariantAlsoNegotiatesExceptionConstruct(): void
    {
        $statusCode = 506;
        $message    = 'Custom error message with a detailed description of the problem.';
        $headers    = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\VariantAlsoNegotiatesException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            self::assertSame($statusCode, $e->getStatusCode());
            self::assertSame($message, $e->getMessage());
            self::assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
