<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class NetworkAuthenticationRequiredExceptionTest extends AbstractCase
{
    public function testNetworkAuthenticationRequiredException(): void
    {
        $message = '511 Network Authentication Required';

        try {
            throw new HttpException\NetworkAuthenticationRequiredException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(511, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testNetworkAuthenticationRequiredExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\NetworkAuthenticationRequiredException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(511, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
