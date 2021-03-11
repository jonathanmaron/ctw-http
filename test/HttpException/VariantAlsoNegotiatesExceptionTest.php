<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class VariantAlsoNegotiatesExceptionTest extends AbstractCase
{
    public function testVariantAlsoNegotiatesException(): void
    {
        $message = '506 Variant Also Negotiates';

        try {
            throw new HttpException\VariantAlsoNegotiatesException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(506, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testVariantAlsoNegotiatesExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\VariantAlsoNegotiatesException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(506, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable