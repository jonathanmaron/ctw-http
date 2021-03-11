<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class UpgradeRequiredExceptionTest extends AbstractCase
{
    public function testUpgradeRequiredException(): void
    {
        $message = '426 Upgrade Required';

        try {
            throw new HttpException\UpgradeRequiredException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(426, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testUpgradeRequiredExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\UpgradeRequiredException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(426, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
