<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class TooEarlyExceptionTest extends AbstractCase
{
    public function testTooEarlyException(): void
    {
        $message = '425 Too Early';

        try {
            throw new HttpException\TooEarlyException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(425, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testTooEarlyExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\TooEarlyException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(425, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
