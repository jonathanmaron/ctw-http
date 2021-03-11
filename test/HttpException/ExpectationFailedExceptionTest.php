<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class ExpectationFailedExceptionTest extends AbstractCase
{
    public function testExpectationFailedException(): void
    {
        $message = '417 Expectation Failed';

        try {
            throw new HttpException\ExpectationFailedException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(417, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testExpectationFailedExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\ExpectationFailedException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(417, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
