<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class LockedExceptionTest extends AbstractCase
{
    public function testLockedException(): void
    {
        $message = '423 Locked';

        try {
            throw new HttpException\LockedException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(423, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testLockedExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\LockedException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(423, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
