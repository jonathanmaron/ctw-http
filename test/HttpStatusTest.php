<?php
declare(strict_types=1);

namespace CtwTest\Http;

use Ctw\Http\Entity\HttpStatus as Entity;
use Ctw\Http\Exception\InvalidArgumentException;
use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;
use Fig\Http\Message\StatusCodeInterface;
use PHPUnit\Framework\Attributes\DataProvider;

final class HttpStatusTest extends AbstractCase
{
    /**
     * @return array<string, array{expected: int, actual: int}>
     */
    public static function provideConsts(): array
    {
        return [
            '100 Continue' => [
                'expected' => 100,
                'actual' => HttpStatus::STATUS_CONTINUE,
            ],
            '101 Switching Protocols' => [
                'expected' => 101,
                'actual' => HttpStatus::STATUS_SWITCHING_PROTOCOLS,
            ],
            '102 Processing' => [
                'expected' => 102,
                'actual' => HttpStatus::STATUS_PROCESSING,
            ],
            '103 Early Hints' => [
                'expected' => 103,
                'actual' => HttpStatus::STATUS_EARLY_HINTS,
            ],
            '200 OK' => [
                'expected' => 200,
                'actual' => HttpStatus::STATUS_OK,
            ],
            '201 Created' => [
                'expected' => 201,
                'actual' => HttpStatus::STATUS_CREATED,
            ],
            '202 Accepted' => [
                'expected' => 202,
                'actual' => HttpStatus::STATUS_ACCEPTED,
            ],
            '203 Non-Authoritative Information' => [
                'expected' => 203,
                'actual' => HttpStatus::STATUS_NON_AUTHORITATIVE_INFORMATION,
            ],
            '204 No Content' => [
                'expected' => 204,
                'actual' => HttpStatus::STATUS_NO_CONTENT,
            ],
            '205 Reset Content' => [
                'expected' => 205,
                'actual' => HttpStatus::STATUS_RESET_CONTENT,
            ],
            '206 Partial Content' => [
                'expected' => 206,
                'actual' => HttpStatus::STATUS_PARTIAL_CONTENT,
            ],
            '207 Multi-Status' => [
                'expected' => 207,
                'actual' => HttpStatus::STATUS_MULTI_STATUS,
            ],
            '208 Already Reported' => [
                'expected' => 208,
                'actual' => HttpStatus::STATUS_ALREADY_REPORTED,
            ],
            '226 IM Used' => [
                'expected' => 226,
                'actual' => HttpStatus::STATUS_IM_USED,
            ],
            '300 Multiple Choices' => [
                'expected' => 300,
                'actual' => HttpStatus::STATUS_MULTIPLE_CHOICES,
            ],
            '301 Moved Permanently' => [
                'expected' => 301,
                'actual' => HttpStatus::STATUS_MOVED_PERMANENTLY,
            ],
            '302 Found' => [
                'expected' => 302,
                'actual' => HttpStatus::STATUS_FOUND,
            ],
            '303 See Other' => [
                'expected' => 303,
                'actual' => HttpStatus::STATUS_SEE_OTHER,
            ],
            '304 Not Modified' => [
                'expected' => 304,
                'actual' => HttpStatus::STATUS_NOT_MODIFIED,
            ],
            '305 Use Proxy' => [
                'expected' => 305,
                'actual' => HttpStatus::STATUS_USE_PROXY,
            ],
            '306 Reserved' => [
                'expected' => 306,
                'actual' => HttpStatus::STATUS_RESERVED,
            ],
            '307 Temporary Redirect' => [
                'expected' => 307,
                'actual' => HttpStatus::STATUS_TEMPORARY_REDIRECT,
            ],
            '308 Permanent Redirect' => [
                'expected' => 308,
                'actual' => HttpStatus::STATUS_PERMANENT_REDIRECT,
            ],
            '400 Bad Request' => [
                'expected' => 400,
                'actual' => HttpStatus::STATUS_BAD_REQUEST,
            ],
            '401 Unauthorized' => [
                'expected' => 401,
                'actual' => HttpStatus::STATUS_UNAUTHORIZED,
            ],
            '402 Payment Required' => [
                'expected' => 402,
                'actual' => HttpStatus::STATUS_PAYMENT_REQUIRED,
            ],
            '403 Forbidden' => [
                'expected' => 403,
                'actual' => HttpStatus::STATUS_FORBIDDEN,
            ],
            '404 Not Found' => [
                'expected' => 404,
                'actual' => HttpStatus::STATUS_NOT_FOUND,
            ],
            '405 Method Not Allowed' => [
                'expected' => 405,
                'actual' => HttpStatus::STATUS_METHOD_NOT_ALLOWED,
            ],
            '406 Not Acceptable' => [
                'expected' => 406,
                'actual' => HttpStatus::STATUS_NOT_ACCEPTABLE,
            ],
            '407 Proxy Authentication Required' => [
                'expected' => 407,
                'actual' => HttpStatus::STATUS_PROXY_AUTHENTICATION_REQUIRED,
            ],
            '408 Request Timeout' => [
                'expected' => 408,
                'actual' => HttpStatus::STATUS_REQUEST_TIMEOUT,
            ],
            '409 Conflict' => [
                'expected' => 409,
                'actual' => HttpStatus::STATUS_CONFLICT,
            ],
            '410 Gone' => [
                'expected' => 410,
                'actual' => HttpStatus::STATUS_GONE,
            ],
            '411 Length Required' => [
                'expected' => 411,
                'actual' => HttpStatus::STATUS_LENGTH_REQUIRED,
            ],
            '412 Precondition Failed' => [
                'expected' => 412,
                'actual' => HttpStatus::STATUS_PRECONDITION_FAILED,
            ],
            '413 Payload Too Large' => [
                'expected' => 413,
                'actual' => HttpStatus::STATUS_PAYLOAD_TOO_LARGE,
            ],
            '414 URI Too Long' => [
                'expected' => 414,
                'actual' => HttpStatus::STATUS_URI_TOO_LONG,
            ],
            '415 Unsupported Media Type' => [
                'expected' => 415,
                'actual' => HttpStatus::STATUS_UNSUPPORTED_MEDIA_TYPE,
            ],
            '416 Range Not Satisfiable' => [
                'expected' => 416,
                'actual' => HttpStatus::STATUS_RANGE_NOT_SATISFIABLE,
            ],
            '417 Expectation Failed' => [
                'expected' => 417,
                'actual' => HttpStatus::STATUS_EXPECTATION_FAILED,
            ],
            "418 I'm a teapot" => [
                'expected' => 418,
                'actual' => HttpStatus::STATUS_IM_A_TEAPOT,
            ],
            '421 Misdirected Request' => [
                'expected' => 421,
                'actual' => HttpStatus::STATUS_MISDIRECTED_REQUEST,
            ],
            '422 Unprocessable Entity' => [
                'expected' => 422,
                'actual' => HttpStatus::STATUS_UNPROCESSABLE_ENTITY,
            ],
            '423 Locked' => [
                'expected' => 423,
                'actual' => HttpStatus::STATUS_LOCKED,
            ],
            '424 Failed Dependency' => [
                'expected' => 424,
                'actual' => HttpStatus::STATUS_FAILED_DEPENDENCY,
            ],
            '425 Too Early' => [
                'expected' => 425,
                'actual' => HttpStatus::STATUS_TOO_EARLY,
            ],
            '426 Upgrade Required' => [
                'expected' => 426,
                'actual' => HttpStatus::STATUS_UPGRADE_REQUIRED,
            ],
            '428 Precondition Required' => [
                'expected' => 428,
                'actual' => HttpStatus::STATUS_PRECONDITION_REQUIRED,
            ],
            '429 Too Many Requests' => [
                'expected' => 429,
                'actual' => HttpStatus::STATUS_TOO_MANY_REQUESTS,
            ],
            '431 Request Header Fields Too Large' => [
                'expected' => 431,
                'actual' => HttpStatus::STATUS_REQUEST_HEADER_FIELDS_TOO_LARGE,
            ],
            '451 Unavailable For Legal Reasons' => [
                'expected' => 451,
                'actual' => HttpStatus::STATUS_UNAVAILABLE_FOR_LEGAL_REASONS,
            ],
            '500 Internal Server Error' => [
                'expected' => 500,
                'actual' => HttpStatus::STATUS_INTERNAL_SERVER_ERROR,
            ],
            '501 Not Implemented' => [
                'expected' => 501,
                'actual' => HttpStatus::STATUS_NOT_IMPLEMENTED,
            ],
            '502 Bad Gateway' => [
                'expected' => 502,
                'actual' => HttpStatus::STATUS_BAD_GATEWAY,
            ],
            '503 Service Unavailable' => [
                'expected' => 503,
                'actual' => HttpStatus::STATUS_SERVICE_UNAVAILABLE,
            ],
            '504 Gateway Timeout' => [
                'expected' => 504,
                'actual' => HttpStatus::STATUS_GATEWAY_TIMEOUT,
            ],
            '505 HTTP Version Not Supported' => [
                'expected' => 505,
                'actual' => HttpStatus::STATUS_VERSION_NOT_SUPPORTED,
            ],
            '506 Variant Also Negotiates' => [
                'expected' => 506,
                'actual' => HttpStatus::STATUS_VARIANT_ALSO_NEGOTIATES,
            ],
            '507 Insufficient Storage' => [
                'expected' => 507,
                'actual' => HttpStatus::STATUS_INSUFFICIENT_STORAGE,
            ],
            '508 Loop Detected' => [
                'expected' => 508,
                'actual' => HttpStatus::STATUS_LOOP_DETECTED,
            ],
            '510 Not Extended' => [
                'expected' => 510,
                'actual' => HttpStatus::STATUS_NOT_EXTENDED,
            ],
            '511 Network Authentication Required' => [
                'expected' => 511,
                'actual' => HttpStatus::STATUS_NETWORK_AUTHENTICATION_REQUIRED,
            ],
        ];
    }

    /**
     * Test that status code constants match expected values
     */
    #[DataProvider('provideConsts')]
    public function testConsts(int $expected, int $actual): void
    {
        self::assertSame($expected, $actual);
    }

    /**
     * Test that HttpStatus implements StatusCodeInterface
     */
    public function testImplementsStatusCodeInterface(): void
    {
        $httpStatus = new HttpStatus(HttpStatus::STATUS_OK);

        // @phpstan-ignore-next-line
        self::assertInstanceOf(StatusCodeInterface::class, $httpStatus);
    }

    /**
     * Test that get method returns correct entity for 404 Not Found
     */
    public function testGetReturnsCorrectEntityForNotFound(): void
    {
        $httpStatus = new HttpStatus(HttpStatus::STATUS_NOT_FOUND);
        $entity     = $httpStatus->get();

        // @phpstan-ignore-next-line
        self::assertInstanceOf(Entity::class, $entity);
        self::assertSame(404, $entity->statusCode);
        self::assertSame(HttpException\NotFoundException::class, $entity->exception);
        self::assertSame('Not Found', $entity->name);
        $expected = 'The requested resource could not be found but may be available again in the future.';
        self::assertSame($expected, $entity->phrase);
        self::assertSame('https://httpstatuses.com/404', $entity->url);
    }

    /**
     * Test that get method returns correct entity for 200 OK
     */
    public function testGetReturnsCorrectEntityForOk(): void
    {
        $httpStatus = new HttpStatus(HttpStatus::STATUS_OK);
        $entity     = $httpStatus->get();

        // @phpstan-ignore-next-line
        self::assertInstanceOf(Entity::class, $entity);
        self::assertSame(200, $entity->statusCode);
        self::assertSame('OK', $entity->name);
        self::assertSame('Standard response for successful HTTP requests.', $entity->phrase);
        self::assertSame('', $entity->exception);
        self::assertSame('https://httpstatuses.com/200', $entity->url);
    }

    /**
     * Test that get method returns correct entity for 500 Internal Server Error
     */
    public function testGetReturnsCorrectEntityForInternalServerError(): void
    {
        $httpStatus = new HttpStatus(HttpStatus::STATUS_INTERNAL_SERVER_ERROR);
        $entity     = $httpStatus->get();

        // @phpstan-ignore-next-line
        self::assertInstanceOf(Entity::class, $entity);
        self::assertSame(500, $entity->statusCode);
        self::assertSame(HttpException\InternalServerErrorException::class, $entity->exception);
        self::assertSame('Internal Server Error', $entity->name);
        self::assertSame('https://httpstatuses.com/500', $entity->url);
    }

    /**
     * @return array<string, array{statusCode: int}>
     */
    public static function validStatusCodesProvider(): array
    {
        return [
            '100 Continue' => [
                'statusCode' => 100,
            ],
            '200 OK' => [
                'statusCode' => 200,
            ],
            '201 Created' => [
                'statusCode' => 201,
            ],
            '301 Moved Permanently' => [
                'statusCode' => 301,
            ],
            '302 Found' => [
                'statusCode' => 302,
            ],
            '304 Not Modified' => [
                'statusCode' => 304,
            ],
            '400 Bad Request' => [
                'statusCode' => 400,
            ],
            '401 Unauthorized' => [
                'statusCode' => 401,
            ],
            '403 Forbidden' => [
                'statusCode' => 403,
            ],
            '404 Not Found' => [
                'statusCode' => 404,
            ],
            '405 Method Not Allowed' => [
                'statusCode' => 405,
            ],
            "418 I'm a teapot" => [
                'statusCode' => 418,
            ],
            '422 Unprocessable Entity' => [
                'statusCode' => 422,
            ],
            '500 Internal Server Error' => [
                'statusCode' => 500,
            ],
            '502 Bad Gateway' => [
                'statusCode' => 502,
            ],
            '503 Service Unavailable' => [
                'statusCode' => 503,
            ],
        ];
    }

    /**
     * Test that get method returns correct URL for various status codes
     */
    #[DataProvider('validStatusCodesProvider')]
    public function testGetReturnsCorrectUrlForStatusCode(int $statusCode): void
    {
        $httpStatus = new HttpStatus($statusCode);
        $entity     = $httpStatus->get();

        $expected = sprintf('https://httpstatuses.com/%d', $statusCode);
        self::assertSame($expected, $entity->url);
    }

    /**
     * Test that invalid status code throws exception during construction
     */
    public function testInvalidStatusCodeThrowsExceptionDuringConstruction(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The status code 999 is not supported');

        new HttpStatus(999);
    }

    /**
     * @return array<string, array{statusCode: int}>
     */
    public static function invalidStatusCodesProvider(): array
    {
        return [
            'negative status code' => [
                'statusCode' => -1,
            ],
            'zero status code' => [
                'statusCode' => 0,
            ],
            'unassigned 1xx' => [
                'statusCode' => 104,
            ],
            'unassigned 2xx' => [
                'statusCode' => 209,
            ],
            'unassigned 3xx' => [
                'statusCode' => 399,
            ],
            'unassigned 4xx' => [
                'statusCode' => 419,
            ],
            'unassigned 5xx' => [
                'statusCode' => 599,
            ],
            'very large status code' => [
                'statusCode' => 9999,
            ],
        ];
    }

    /**
     * Test that various invalid status codes throw exceptions
     */
    #[DataProvider('invalidStatusCodesProvider')]
    public function testVariousInvalidStatusCodesThrowException(int $statusCode): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(sprintf('The status code %d is not supported', $statusCode));

        new HttpStatus($statusCode);
    }

    /**
     * Test that get method can be called multiple times
     */
    public function testGetMethodCanBeCalledMultipleTimes(): void
    {
        $httpStatus = new HttpStatus(HttpStatus::STATUS_NOT_FOUND);

        $entity1 = $httpStatus->get();
        $entity2 = $httpStatus->get();

        self::assertSame($entity1->statusCode, $entity2->statusCode);
        self::assertSame($entity1->name, $entity2->name);
        self::assertSame($entity1->phrase, $entity2->phrase);
        self::assertSame($entity1->exception, $entity2->exception);
        self::assertSame($entity1->url, $entity2->url);
    }

    /**
     * Test that entity returned by get method contains all required properties
     */
    public function testGetReturnsEntityWithAllProperties(): void
    {
        $httpStatus = new HttpStatus(HttpStatus::STATUS_NOT_FOUND);
        $entity     = $httpStatus->get();

        self::assertObjectHasProperty('statusCode', $entity);
        self::assertObjectHasProperty('name', $entity);
        self::assertObjectHasProperty('phrase', $entity);
        self::assertObjectHasProperty('exception', $entity);
        self::assertObjectHasProperty('url', $entity);
    }
}
