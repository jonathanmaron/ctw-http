<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;

// phpcs:disable

class NetworkAuthenticationRequiredExceptionTest extends AbstractCase
{
    public function testNetworkAuthenticationRequiredException(): void
    {
        $statusCode = 511;
        $message    = '511 Network Authentication Required';

        try {
            throw new HttpException\NetworkAuthenticationRequiredException();
        } catch (HttpException\HttpExceptionInterface $e) {
            self::assertSame($statusCode, $e->getStatusCode());
            self::assertSame($message, $e->getMessage());
        }
    }

    public function testNetworkAuthenticationRequiredExceptionConstruct(): void
    {
        $statusCode = 511;
        $message    = 'Custom error message with a detailed description of the problem.';
        $headers    = [
            'Content-Type'  => 'text/html; charset=UTF-8',
            'Authorization' => 'Basic YWxhZGRpbjpvcGVuc2VzYW1l',
        ];

        try {
            throw new HttpException\NetworkAuthenticationRequiredException($message, null, $headers);
        } catch (HttpException\HttpExceptionInterface $e) {
            self::assertSame($statusCode, $e->getStatusCode());
            self::assertSame($message, $e->getMessage());
            self::assertSame($headers, $e->getHeaders());
        }
    }
}

// phpcs:disable
