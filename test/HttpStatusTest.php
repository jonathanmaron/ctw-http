<?php
declare(strict_types=1);

namespace CtwTest\Http;

use Ctw\Http\Exception\InvalidArgumentException;
use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

class HttpStatusTest extends AbstractCase
{
    public function provideConsts(): array
    {
        return [
            [100, HttpStatus::STATUS_CONTINUE],
            [101, HttpStatus::STATUS_SWITCHING_PROTOCOLS],
            [102, HttpStatus::STATUS_PROCESSING],
            [103, HttpStatus::STATUS_EARLY_HINTS],
            [200, HttpStatus::STATUS_OK],
            [201, HttpStatus::STATUS_CREATED],
            [202, HttpStatus::STATUS_ACCEPTED],
            [203, HttpStatus::STATUS_NON_AUTHORITATIVE_INFORMATION],
            [204, HttpStatus::STATUS_NO_CONTENT],
            [205, HttpStatus::STATUS_RESET_CONTENT],
            [206, HttpStatus::STATUS_PARTIAL_CONTENT],
            [207, HttpStatus::STATUS_MULTI_STATUS],
            [208, HttpStatus::STATUS_ALREADY_REPORTED],
            [226, HttpStatus::STATUS_IM_USED],
            [300, HttpStatus::STATUS_MULTIPLE_CHOICES],
            [301, HttpStatus::STATUS_MOVED_PERMANENTLY],
            [302, HttpStatus::STATUS_FOUND],
            [303, HttpStatus::STATUS_SEE_OTHER],
            [304, HttpStatus::STATUS_NOT_MODIFIED],
            [305, HttpStatus::STATUS_USE_PROXY],
            [306, HttpStatus::STATUS_RESERVED],
            [307, HttpStatus::STATUS_TEMPORARY_REDIRECT],
            [308, HttpStatus::STATUS_PERMANENT_REDIRECT],
            [400, HttpStatus::STATUS_BAD_REQUEST],
            [401, HttpStatus::STATUS_UNAUTHORIZED],
            [402, HttpStatus::STATUS_PAYMENT_REQUIRED],
            [403, HttpStatus::STATUS_FORBIDDEN],
            [404, HttpStatus::STATUS_NOT_FOUND],
            [405, HttpStatus::STATUS_METHOD_NOT_ALLOWED],
            [406, HttpStatus::STATUS_NOT_ACCEPTABLE],
            [407, HttpStatus::STATUS_PROXY_AUTHENTICATION_REQUIRED],
            [408, HttpStatus::STATUS_REQUEST_TIMEOUT],
            [409, HttpStatus::STATUS_CONFLICT],
            [410, HttpStatus::STATUS_GONE],
            [411, HttpStatus::STATUS_LENGTH_REQUIRED],
            [412, HttpStatus::STATUS_PRECONDITION_FAILED],
            [413, HttpStatus::STATUS_PAYLOAD_TOO_LARGE],
            [414, HttpStatus::STATUS_URI_TOO_LONG],
            [415, HttpStatus::STATUS_UNSUPPORTED_MEDIA_TYPE],
            [416, HttpStatus::STATUS_RANGE_NOT_SATISFIABLE],
            [417, HttpStatus::STATUS_EXPECTATION_FAILED],
            [418, HttpStatus::STATUS_IM_A_TEAPOT],
            [421, HttpStatus::STATUS_MISDIRECTED_REQUEST],
            [422, HttpStatus::STATUS_UNPROCESSABLE_ENTITY],
            [423, HttpStatus::STATUS_LOCKED],
            [424, HttpStatus::STATUS_FAILED_DEPENDENCY],
            [425, HttpStatus::STATUS_TOO_EARLY],
            [426, HttpStatus::STATUS_UPGRADE_REQUIRED],
            [428, HttpStatus::STATUS_PRECONDITION_REQUIRED],
            [429, HttpStatus::STATUS_TOO_MANY_REQUESTS],
            [431, HttpStatus::STATUS_REQUEST_HEADER_FIELDS_TOO_LARGE],
            [451, HttpStatus::STATUS_UNAVAILABLE_FOR_LEGAL_REASONS],
            [500, HttpStatus::STATUS_INTERNAL_SERVER_ERROR],
            [501, HttpStatus::STATUS_NOT_IMPLEMENTED],
            [502, HttpStatus::STATUS_BAD_GATEWAY],
            [503, HttpStatus::STATUS_SERVICE_UNAVAILABLE],
            [504, HttpStatus::STATUS_GATEWAY_TIMEOUT],
            [505, HttpStatus::STATUS_VERSION_NOT_SUPPORTED],
            [506, HttpStatus::STATUS_VARIANT_ALSO_NEGOTIATES],
            [507, HttpStatus::STATUS_INSUFFICIENT_STORAGE],
            [508, HttpStatus::STATUS_LOOP_DETECTED],
            [510, HttpStatus::STATUS_NOT_EXTENDED],
            [511, HttpStatus::STATUS_NETWORK_AUTHENTICATION_REQUIRED],
        ];
    }

    /**
     * @dataProvider provideConsts
     */
    public function testConsts(int $expected, int $actual): void
    {
        self::assertSame($expected, $actual);
    }

    public function testGet(): void
    {
        $httpStatus = new HttpStatus(HttpStatus::STATUS_NOT_FOUND);
        $entity     = $httpStatus->get();

        self::assertSame(404, $entity->statusCode);
        self::assertSame(HttpException\NotFoundException::class, $entity->exception);
        self::assertSame('Not Found', $entity->name);
        $expected = 'The requested resource could not be found but may be available again in the future.';
        self::assertSame($expected, $entity->phrase);
        self::assertSame('https://httpstatuses.com/404', $entity->url);
    }

    public function testInvalidStatusCode(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $httpStatus = new HttpStatus(999);
        $httpStatus->get();
    }
}
