<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class LengthRequiredExceptionTest extends AbstractCase
{
    public function testLengthRequiredException(): void
    {
        $message = '411 Length Required';

        try {
            throw new HttpException\LengthRequiredException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(411, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testLengthRequiredExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\LengthRequiredException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(411, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
