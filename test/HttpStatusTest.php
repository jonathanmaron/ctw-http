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
        $this->assertSame(100, HttpStatus::STATUS_CONTINUE);
        $this->assertSame(101, HttpStatus::STATUS_SWITCHING_PROTOCOLS);
        $this->assertSame(102, HttpStatus::STATUS_PROCESSING);
        $this->assertSame(103, HttpStatus::STATUS_EARLY_HINTS);
        $this->assertSame(200, HttpStatus::STATUS_OK);
        $this->assertSame(201, HttpStatus::STATUS_CREATED);
        $this->assertSame(202, HttpStatus::STATUS_ACCEPTED);
        $this->assertSame(203, HttpStatus::STATUS_NON_AUTHORITATIVE_INFORMATION);
        $this->assertSame(204, HttpStatus::STATUS_NO_CONTENT);
        $this->assertSame(205, HttpStatus::STATUS_RESET_CONTENT);
        $this->assertSame(206, HttpStatus::STATUS_PARTIAL_CONTENT);
        $this->assertSame(207, HttpStatus::STATUS_MULTI_STATUS);
        $this->assertSame(208, HttpStatus::STATUS_ALREADY_REPORTED);
        $this->assertSame(226, HttpStatus::STATUS_IM_USED);
        $this->assertSame(300, HttpStatus::STATUS_MULTIPLE_CHOICES);
        $this->assertSame(301, HttpStatus::STATUS_MOVED_PERMANENTLY);
        $this->assertSame(302, HttpStatus::STATUS_FOUND);
        $this->assertSame(303, HttpStatus::STATUS_SEE_OTHER);
        $this->assertSame(304, HttpStatus::STATUS_NOT_MODIFIED);
        $this->assertSame(305, HttpStatus::STATUS_USE_PROXY);
        $this->assertSame(306, HttpStatus::STATUS_RESERVED);
        $this->assertSame(307, HttpStatus::STATUS_TEMPORARY_REDIRECT);
        $this->assertSame(308, HttpStatus::STATUS_PERMANENT_REDIRECT);
        $this->assertSame(400, HttpStatus::STATUS_BAD_REQUEST);
        $this->assertSame(401, HttpStatus::STATUS_UNAUTHORIZED);
        $this->assertSame(402, HttpStatus::STATUS_PAYMENT_REQUIRED);
        $this->assertSame(403, HttpStatus::STATUS_FORBIDDEN);
        $this->assertSame(404, HttpStatus::STATUS_NOT_FOUND);
        $this->assertSame(405, HttpStatus::STATUS_METHOD_NOT_ALLOWED);
        $this->assertSame(406, HttpStatus::STATUS_NOT_ACCEPTABLE);
        $this->assertSame(407, HttpStatus::STATUS_PROXY_AUTHENTICATION_REQUIRED);
        $this->assertSame(408, HttpStatus::STATUS_REQUEST_TIMEOUT);
        $this->assertSame(409, HttpStatus::STATUS_CONFLICT);
        $this->assertSame(410, HttpStatus::STATUS_GONE);
        $this->assertSame(411, HttpStatus::STATUS_LENGTH_REQUIRED);
        $this->assertSame(412, HttpStatus::STATUS_PRECONDITION_FAILED);
        $this->assertSame(413, HttpStatus::STATUS_PAYLOAD_TOO_LARGE);
        $this->assertSame(414, HttpStatus::STATUS_URI_TOO_LONG);
        $this->assertSame(415, HttpStatus::STATUS_UNSUPPORTED_MEDIA_TYPE);
        $this->assertSame(416, HttpStatus::STATUS_RANGE_NOT_SATISFIABLE);
        $this->assertSame(417, HttpStatus::STATUS_EXPECTATION_FAILED);
        $this->assertSame(418, HttpStatus::STATUS_IM_A_TEAPOT);
        $this->assertSame(421, HttpStatus::STATUS_MISDIRECTED_REQUEST);
        $this->assertSame(422, HttpStatus::STATUS_UNPROCESSABLE_ENTITY);
        $this->assertSame(423, HttpStatus::STATUS_LOCKED);
        $this->assertSame(424, HttpStatus::STATUS_FAILED_DEPENDENCY);
        $this->assertSame(425, HttpStatus::STATUS_TOO_EARLY);
        $this->assertSame(426, HttpStatus::STATUS_UPGRADE_REQUIRED);
        $this->assertSame(428, HttpStatus::STATUS_PRECONDITION_REQUIRED);
        $this->assertSame(429, HttpStatus::STATUS_TOO_MANY_REQUESTS);
        $this->assertSame(431, HttpStatus::STATUS_REQUEST_HEADER_FIELDS_TOO_LARGE);
        $this->assertSame(451, HttpStatus::STATUS_UNAVAILABLE_FOR_LEGAL_REASONS);
        $this->assertSame(500, HttpStatus::STATUS_INTERNAL_SERVER_ERROR);
        $this->assertSame(501, HttpStatus::STATUS_NOT_IMPLEMENTED);
        $this->assertSame(502, HttpStatus::STATUS_BAD_GATEWAY);
        $this->assertSame(503, HttpStatus::STATUS_SERVICE_UNAVAILABLE);
        $this->assertSame(504, HttpStatus::STATUS_GATEWAY_TIMEOUT);
        $this->assertSame(505, HttpStatus::STATUS_VERSION_NOT_SUPPORTED);
        $this->assertSame(506, HttpStatus::STATUS_VARIANT_ALSO_NEGOTIATES);
        $this->assertSame(507, HttpStatus::STATUS_INSUFFICIENT_STORAGE);
        $this->assertSame(508, HttpStatus::STATUS_LOOP_DETECTED);
        $this->assertSame(510, HttpStatus::STATUS_NOT_EXTENDED);
        $this->assertSame(511, HttpStatus::STATUS_NETWORK_AUTHENTICATION_REQUIRED);
    }

    public function testGet(): void
    {
        $httpStatus = new HttpStatus(HttpStatus::STATUS_NOT_FOUND);
        $entity     = $httpStatus->get();

        $this->assertSame(404, $entity->statusCode);
        $this->assertSame(HttpException\NotFoundException::class, $entity->exception);
        $this->assertSame('Not Found', $entity->name);
        $expected = 'The requested resource could not be found but may be available again in the future.';
        $this->assertSame($expected, $entity->phrase);
        $this->assertSame('https://httpstatuses.com/404', $entity->url);
    }

    public function testInvalidStatusCode(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $httpStatus = new HttpStatus(999);
        $httpStatus->get();
    }
}
