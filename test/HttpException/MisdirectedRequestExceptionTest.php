<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class MisdirectedRequestExceptionTest extends AbstractCase
{
    public function testMisdirectedRequestException(): void
    {
        $message = '421 Misdirected Request';

        try {
            throw new HttpException\MisdirectedRequestException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(421, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testMisdirectedRequestExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\MisdirectedRequestException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(421, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable