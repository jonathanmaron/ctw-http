<?php
declare(strict_types=1);

namespace CtwTest\Http;

use Ctw\Http\Exception\InvalidArgumentException;
use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;

class HttpStatusTest extends AbstractCase
{
    public function testConstants(): void
    {
        self::assertSame(100, HttpStatus::STATUS_CONTINUE);
        self::assertSame(101, HttpStatus::STATUS_SWITCHING_PROTOCOLS);
        self::assertSame(102, HttpStatus::STATUS_PROCESSING);
        self::assertSame(103, HttpStatus::STATUS_EARLY_HINTS);
        self::assertSame(200, HttpStatus::STATUS_OK);
        self::assertSame(201, HttpStatus::STATUS_CREATED);
        self::assertSame(202, HttpStatus::STATUS_ACCEPTED);
        self::assertSame(203, HttpStatus::STATUS_NON_AUTHORITATIVE_INFORMATION);
        self::assertSame(204, HttpStatus::STATUS_NO_CONTENT);
        self::assertSame(205, HttpStatus::STATUS_RESET_CONTENT);
        self::assertSame(206, HttpStatus::STATUS_PARTIAL_CONTENT);
        self::assertSame(207, HttpStatus::STATUS_MULTI_STATUS);
        self::assertSame(208, HttpStatus::STATUS_ALREADY_REPORTED);
        self::assertSame(226, HttpStatus::STATUS_IM_USED);
        self::assertSame(300, HttpStatus::STATUS_MULTIPLE_CHOICES);
        self::assertSame(301, HttpStatus::STATUS_MOVED_PERMANENTLY);
        self::assertSame(302, HttpStatus::STATUS_FOUND);
        self::assertSame(303, HttpStatus::STATUS_SEE_OTHER);
        self::assertSame(304, HttpStatus::STATUS_NOT_MODIFIED);
        self::assertSame(305, HttpStatus::STATUS_USE_PROXY);
        self::assertSame(306, HttpStatus::STATUS_RESERVED);
        self::assertSame(307, HttpStatus::STATUS_TEMPORARY_REDIRECT);
        self::assertSame(308, HttpStatus::STATUS_PERMANENT_REDIRECT);
        self::assertSame(400, HttpStatus::STATUS_BAD_REQUEST);
        self::assertSame(401, HttpStatus::STATUS_UNAUTHORIZED);
        self::assertSame(402, HttpStatus::STATUS_PAYMENT_REQUIRED);
        self::assertSame(403, HttpStatus::STATUS_FORBIDDEN);
        self::assertSame(404, HttpStatus::STATUS_NOT_FOUND);
        self::assertSame(405, HttpStatus::STATUS_METHOD_NOT_ALLOWED);
        self::assertSame(406, HttpStatus::STATUS_NOT_ACCEPTABLE);
        self::assertSame(407, HttpStatus::STATUS_PROXY_AUTHENTICATION_REQUIRED);
        self::assertSame(408, HttpStatus::STATUS_REQUEST_TIMEOUT);
        self::assertSame(409, HttpStatus::STATUS_CONFLICT);
        self::assertSame(410, HttpStatus::STATUS_GONE);
        self::assertSame(411, HttpStatus::STATUS_LENGTH_REQUIRED);
        self::assertSame(412, HttpStatus::STATUS_PRECONDITION_FAILED);
        self::assertSame(413, HttpStatus::STATUS_PAYLOAD_TOO_LARGE);
        self::assertSame(414, HttpStatus::STATUS_URI_TOO_LONG);
        self::assertSame(415, HttpStatus::STATUS_UNSUPPORTED_MEDIA_TYPE);
        self::assertSame(416, HttpStatus::STATUS_RANGE_NOT_SATISFIABLE);
        self::assertSame(417, HttpStatus::STATUS_EXPECTATION_FAILED);
        self::assertSame(418, HttpStatus::STATUS_IM_A_TEAPOT);
        self::assertSame(421, HttpStatus::STATUS_MISDIRECTED_REQUEST);
        self::assertSame(422, HttpStatus::STATUS_UNPROCESSABLE_ENTITY);
        self::assertSame(423, HttpStatus::STATUS_LOCKED);
        self::assertSame(424, HttpStatus::STATUS_FAILED_DEPENDENCY);
        self::assertSame(425, HttpStatus::STATUS_TOO_EARLY);
        self::assertSame(426, HttpStatus::STATUS_UPGRADE_REQUIRED);
        self::assertSame(428, HttpStatus::STATUS_PRECONDITION_REQUIRED);
        self::assertSame(429, HttpStatus::STATUS_TOO_MANY_REQUESTS);
        self::assertSame(431, HttpStatus::STATUS_REQUEST_HEADER_FIELDS_TOO_LARGE);
        self::assertSame(451, HttpStatus::STATUS_UNAVAILABLE_FOR_LEGAL_REASONS);
        self::assertSame(500, HttpStatus::STATUS_INTERNAL_SERVER_ERROR);
        self::assertSame(501, HttpStatus::STATUS_NOT_IMPLEMENTED);
        self::assertSame(502, HttpStatus::STATUS_BAD_GATEWAY);
        self::assertSame(503, HttpStatus::STATUS_SERVICE_UNAVAILABLE);
        self::assertSame(504, HttpStatus::STATUS_GATEWAY_TIMEOUT);
        self::assertSame(505, HttpStatus::STATUS_VERSION_NOT_SUPPORTED);
        self::assertSame(506, HttpStatus::STATUS_VARIANT_ALSO_NEGOTIATES);
        self::assertSame(507, HttpStatus::STATUS_INSUFFICIENT_STORAGE);
        self::assertSame(508, HttpStatus::STATUS_LOOP_DETECTED);
        self::assertSame(510, HttpStatus::STATUS_NOT_EXTENDED);
        self::assertSame(511, HttpStatus::STATUS_NETWORK_AUTHENTICATION_REQUIRED);
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
