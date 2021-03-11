<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class VersionNotSupportedExceptionTest extends AbstractCase
{
    public function testVersionNotSupportedException(): void
    {
        $message = '505 HTTP Version Not Supported';

        try {
            throw new HttpException\VersionNotSupportedException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(505, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testVersionNotSupportedExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\VersionNotSupportedException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(505, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable