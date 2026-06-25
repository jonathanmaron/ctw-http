<?php
declare(strict_types=1);

namespace CtwTest\Http;

use Ctw\Http\HttpMethod;
use PHPUnit\Framework\Attributes\DataProvider;

final class HttpMethodTest extends AbstractCase
{
    /**
     * @return array<int, array{0: string, 1: string}>
     */
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

    /**
     * Test that each HttpMethod constant exposes the expected uppercase HTTP
     * method verb when its value is compared against the canonical string.
     */
    #[DataProvider('provideConsts')]
    public function testConstantExposesExpectedHttpMethodValue(string $expected, string $actual): void
    {
        self::assertSame($expected, $actual);
    }
}
