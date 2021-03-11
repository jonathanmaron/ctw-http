<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class PreconditionFailedExceptionTest extends AbstractCase
{
    public function testPreconditionFailedException(): void
    {
        $message = '412 Precondition Failed';

        try {
            throw new HttpException\PreconditionFailedException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(412, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testPreconditionFailedExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\PreconditionFailedException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(412, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
