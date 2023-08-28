<?php
declare(strict_types=1);

namespace CtwTest\Http;

use Ctw\Http\HttpMethod;
use PHPUnit\Framework\Attributes\DataProvider;

class HttpMethodTest extends AbstractCase
{
    public static function provideConsts(): array
    {
        return [
            ['CONNECT', HttpMethod::METHOD_CONNECT],
            ['DELETE', HttpMethod::METHOD_DELETE],
            ['GET', HttpMethod::METHOD_GET],
            ['HEAD', HttpMethod::METHOD_HEAD],
            ['OPTIONS', HttpMethod::METHOD_OPTIONS],
            ['PATCH', HttpMethod::METHOD_PATCH],
            ['POST', HttpMethod::METHOD_POST],
            ['PURGE', HttpMethod::METHOD_PURGE],
            ['PUT', HttpMethod::METHOD_PUT],
            ['TRACE', HttpMethod::METHOD_TRACE],
        ];
    }

    #[DataProvider('provideConsts')]
    public function testConsts(string $expected, string $actual): void
    {
        self::assertSame($expected, $actual);
    }
}
