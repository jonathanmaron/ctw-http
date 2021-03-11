<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class ForbiddenExceptionTest extends AbstractCase
{
    public function testForbiddenException(): void
    {
        $message = '403 Forbidden';

        try {
            throw new HttpException\ForbiddenException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(403, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testForbiddenExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\ForbiddenException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(403, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable