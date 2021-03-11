<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class NotAcceptableExceptionTest extends AbstractCase
{
    public function testNotAcceptableException(): void
    {
        $message = '406 Not Acceptable';

        try {
            throw new HttpException\NotAcceptableException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(406, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testNotAcceptableExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\NotAcceptableException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(406, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
