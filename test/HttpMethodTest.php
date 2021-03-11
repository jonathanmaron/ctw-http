<?php
declare(strict_types=1);

namespace CtwTest\Http;

use Ctw\Http\HttpMethod;

class HttpMethodTest extends AbstractCase
{
    public function testConstants(): void
    {
        $this->assertSame('CONNECT', HttpMethod::METHOD_CONNECT);
        $this->assertSame('DELETE', HttpMethod::METHOD_DELETE);
        $this->assertSame('GET', HttpMethod::METHOD_GET);
        $this->assertSame('HEAD', HttpMethod::METHOD_HEAD);
        $this->assertSame('OPTIONS', HttpMethod::METHOD_OPTIONS);
        $this->assertSame('PATCH', HttpMethod::METHOD_PATCH);
        $this->assertSame('POST', HttpMethod::METHOD_POST);
        $this->assertSame('PURGE', HttpMethod::METHOD_PURGE);
        $this->assertSame('PUT', HttpMethod::METHOD_PUT);
        $this->assertSame('TRACE', HttpMethod::METHOD_TRACE);
    }
}
