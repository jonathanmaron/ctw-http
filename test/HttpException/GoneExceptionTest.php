<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class GoneExceptionTest extends AbstractCase
{
    public function testGoneException(): void
    {
        $message = '410 Gone';

        try {
            throw new HttpException\GoneException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(410, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testGoneExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\GoneException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(410, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
