<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class UnauthorizedExceptionTest extends AbstractCase
{
    public function testUnauthorizedException(): void
    {
        $message = '401 Unauthorized';

        try {
            throw new HttpException\UnauthorizedException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(401, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testUnauthorizedExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\UnauthorizedException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(401, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
