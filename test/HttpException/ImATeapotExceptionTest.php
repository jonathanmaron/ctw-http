<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class ImATeapotExceptionTest extends AbstractCase
{
    public function testImATeapotException(): void
    {
        $message = '418 I\'m a teapot';

        try {
            throw new HttpException\ImATeapotException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(418, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testImATeapotExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\ImATeapotException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(418, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
