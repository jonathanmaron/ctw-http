<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class BadGatewayExceptionTest extends AbstractCase
{
    public function testBadGatewayException(): void
    {
        $message = '502 Bad Gateway';

        try {
            throw new HttpException\BadGatewayException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(502, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testBadGatewayExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\BadGatewayException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(502, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
