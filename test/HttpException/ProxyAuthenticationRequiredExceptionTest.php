<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

// phpcs:disable

class ProxyAuthenticationRequiredExceptionTest extends AbstractCase
{
    public function testProxyAuthenticationRequiredException(): void
    {
        $message = '407 Proxy Authentication Required';

        try {
            throw new HttpException\ProxyAuthenticationRequiredException();
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(407, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
        }
    }

    public function testProxyAuthenticationRequiredExceptionWithConstructorValues(): void
    {
        $message = 'Custom error message with a detailed description of the problem.';
        $headers = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\ProxyAuthenticationRequiredException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            $this->assertSame(407, $e->getStatusCode());
            $this->assertSame($message, $e->getMessage());
            $this->assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
