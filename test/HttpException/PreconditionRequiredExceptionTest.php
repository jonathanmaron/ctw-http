<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class PreconditionRequiredExceptionTest extends AbstractCase
{
    public function testPreconditionRequiredException(): void
    {
        $message = '428 Precondition Required';

        try {
            throw new HttpException\PreconditionRequiredException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(428, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testPreconditionRequiredExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\PreconditionRequiredException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(428, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
