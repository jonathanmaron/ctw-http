<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class FailedDependencyExceptionTest extends AbstractCase
{
    public function testFailedDependencyException(): void
    {
        $message = '424 Failed Dependency';

        try {
            throw new HttpException\FailedDependencyException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(424, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testFailedDependencyExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\FailedDependencyException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(424, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
