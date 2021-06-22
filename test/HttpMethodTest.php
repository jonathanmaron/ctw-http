<?php
declare(strict_types=1);

namespace CtwTest\Http;

use Ctw\Http\HttpMethod;

class HttpMethodTest extends AbstractCase
{
    public function testConstants(): void
    {
        self::assertSame('CONNECT', HttpMethod::METHOD_CONNECT);
        self::assertSame('DELETE', HttpMethod::METHOD_DELETE);
        self::assertSame('GET', HttpMethod::METHOD_GET);
        self::assertSame('HEAD', HttpMethod::METHOD_HEAD);
        self::assertSame('OPTIONS', HttpMethod::METHOD_OPTIONS);
        self::assertSame('PATCH', HttpMethod::METHOD_PATCH);
        self::assertSame('POST', HttpMethod::METHOD_POST);
        self::assertSame('PURGE', HttpMethod::METHOD_PURGE);
        self::assertSame('PUT', HttpMethod::METHOD_PUT);
        self::assertSame('TRACE', HttpMethod::METHOD_TRACE);
    }
}
