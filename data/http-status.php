<?php

namespace Ctw\Http;

use Ctw\Http\HttpException;

// Reference:
// https://httpstatuses.com/
// https://www.iana.org/assignments/http-status-codes/http-status-codes.xml

// phpcs:disable

return [

    // <editor-fold desc="1xx Informational">

    HttpStatus::STATUS_CONTINUE => [
        'name'      => 'Continue',
        'phrase'    => 'The initial part of a request has been received and has not yet been rejected by the server. The server intends to send a final response after the request has been fully received and acted upon.',
        'exception' => '',
    ],

    HttpStatus::STATUS_SWITCHING_PROTOCOLS => [
        'name'      => 'Switching Protocols',
        'phrase'    => 'The server understands and is willing to comply with the client\'s request, via the Upgrade header field for a change in the application protocol being used on this connection.',
        'exception' => '',
    ],

    HttpStatus::STATUS_PROCESSING => [
        'name'      => 'Processing',
        'phrase'    => 'An interim response used to inform the client that the server has accepted the complete request, but has not yet completed it.',
        'exception' => '',
    ],

    HttpStatus::STATUS_EARLY_HINTS => [
        'name'      => 'Early Hints',
        'phrase'    => '',
        'exception' => '',
    ],

    // </editor-fold>

    // <editor-fold desc="2xx Success">

    HttpStatus::STATUS_OK => [
        'name'      => 'OK',
        'phrase'    => 'Standard response for successful HTTP requests.',
        'exception' => '',
    ],

    HttpStatus::STATUS_CREATED => [
        'name'      => 'Created',
        'phrase'    => 'The request has been fulfilled, resulting in the creation of a new resource.',
        'exception' => '',
    ],

    HttpStatus::STATUS_ACCEPTED => [
        'name'      => 'Accepted',
        'phrase'    => 'The request has been accepted for processing, but the processing has not been completed.',
        'exception' => '',
    ],

    HttpStatus::STATUS_NON_AUTHORITATIVE_INFORMATION => [
        'name'      => 'Non-Authoritative Information',
        'phrase'    => 'The server is a transforming proxy (e.g. a Web accelerator) that received a 200 OK from its origin, but is returning a modified version of the origin\'s response.',
        'exception' => '',
    ],

    HttpStatus::STATUS_NO_CONTENT => [
        'name'      => 'No Content',
        'phrase'    => 'The server successfully processed the request and is not returning any content.',
        'exception' => '',
    ],

    HttpStatus::STATUS_RESET_CONTENT => [
        'name'      => 'Reset Content',
        'phrase'    => 'The server successfully processed the request, but is not returning any content.',
        'exception' => '',
    ],

    HttpStatus::STATUS_PARTIAL_CONTENT => [
        'name'      => 'Partial Content',
        'phrase'    => 'The server is delivering only part of the resource (byte serving) due to a range header sent by the client.',
        'exception' => '',
    ],

    HttpStatus::STATUS_MULTI_STATUS => [
        'name'      => 'Multi-Status',
        'phrase'    => 'The message body that follows is an XML message and can contain a number of separate response codes, depending on how many sub-requests were made.',
        'exception' => '',
    ],

    HttpStatus::STATUS_ALREADY_REPORTED => [
        'name'      => 'Already Reported',
        'phrase'    => 'The members of a DAV binding have already been enumerated in a previous reply to this request, and are not being included again.',
        'exception' => '',
    ],

    HttpStatus::STATUS_IM_USED => [
        'name'      => 'IM Used',
        'phrase'    => 'The server has fulfilled a request for the resource, and the response is a representation of the result of one or more instance-manipulations applied to the current instance.',
        'exception' => '',
    ],

    // </editor-fold>

    // <editor-fold desc="3xx Redirection">

    HttpStatus::STATUS_MULTIPLE_CHOICES => [
        'name'      => 'Multiple Choices',
        'phrase'    => 'Indicates multiple options for the resource from which the client may choose.',
        'exception' => '',
    ],

    HttpStatus::STATUS_MOVED_PERMANENTLY => [
        'name'      => 'Moved Permanently',
        'phrase'    => 'This and all future requests should be directed to the given URI.',
        'exception' => '',
    ],

    HttpStatus::STATUS_FOUND => [
        'name'      => 'Found',
        'phrase'    => 'This is an example of industry practice contradicting the standard.',
        'exception' => '',
    ],

    HttpStatus::STATUS_SEE_OTHER => [
        'name'      => 'See Other',
        'phrase'    => 'The response to the request can be found under another URI using a GET method.',
        'exception' => '',
    ],

    HttpStatus::STATUS_NOT_MODIFIED => [
        'name'      => 'Not Modified',
        'phrase'    => 'Indicates that the resource has not been modified since the version specified by the request headers If-Modified-Since or If-None-Match.',
        'exception' => '',
    ],

    HttpStatus::STATUS_USE_PROXY => [
        'name'      => 'Use Proxy',
        'phrase'    => 'The requested resource is available only through a proxy, the address for which is provided in the response.',
        'exception' => '',
    ],

    HttpStatus::STATUS_RESERVED => [
        'name'      => '(Unused)',
        'phrase'    => 'No longer used.',
        'exception' => '',
    ],

    HttpStatus::STATUS_TEMPORARY_REDIRECT => [
        'name'      => 'Temporary Redirect',
        'phrase'    => 'In this case, the request should be repeated with another URI; however, future requests should still use the original URI.',
        'exception' => '',
    ],

    HttpStatus::STATUS_PERMANENT_REDIRECT => [
        'name'      => 'Permanent Redirect',
        'phrase'    => 'The request and all future requests should be repeated using another URI.',
        'exception' => '',
    ],

    // </editor-fold>

    // <editor-fold desc="4xx Client Error">

    HttpStatus::STATUS_BAD_REQUEST => [
        'name'      => 'Bad Request',
        'phrase'    => 'The request cannot be fulfilled due to bad syntax.',
        'exception' => HttpException\BadRequestException::class,
    ],

    HttpStatus::STATUS_UNAUTHORIZED => [
        'name'      => 'Unauthorized',
        'phrase'    => 'Authentication is required and has failed or has not yet been provided.',
        'exception' => HttpException\UnauthorizedException::class,
    ],

    HttpStatus::STATUS_PAYMENT_REQUIRED => [
        'name'      => 'Payment Required',
        'phrase'    => 'Reserved for future use.',
        'exception' => HttpException\PaymentRequiredException::class,
    ],

    HttpStatus::STATUS_FORBIDDEN => [
        'name'      => 'Forbidden',
        'phrase'    => 'The request was a valid request, but the server is refusing to respond to it.',
        'exception' => HttpException\ForbiddenException::class,
    ],

    HttpStatus::STATUS_NOT_FOUND => [
        'name'      => 'Not Found',
        'phrase'    => 'The requested resource could not be found but may be available again in the future.',
        'exception' => HttpException\NotFoundException::class,
    ],

    HttpStatus::STATUS_METHOD_NOT_ALLOWED => [
        'name'      => 'Method Not Allowed',
        'phrase'    => 'A request was made of a resource using a request method not supported by that resource.',
        'exception' => HttpException\MethodNotAllowedException::class,
    ],

    HttpStatus::STATUS_NOT_ACCEPTABLE => [
        'name'      => 'Not Acceptable',
        'phrase'    => 'The requested resource is only capable of generating content not acceptable.',
        'exception' => HttpException\NotAcceptableException::class,
    ],

    HttpStatus::STATUS_PROXY_AUTHENTICATION_REQUIRED => [
        'name'      => 'Proxy Authentication Required',
        'phrase'    => 'Proxy authentication is required to access the requested resource.',
        'exception' => HttpException\ProxyAuthenticationRequiredException::class,
    ],

    HttpStatus::STATUS_REQUEST_TIMEOUT => [
        'name'      => 'Request Timeout',
        'phrase'    => 'The server did not receive a complete request message in time.',
        'exception' => HttpException\RequestTimeoutException::class,
    ],

    HttpStatus::STATUS_CONFLICT => [
        'name'      => 'Conflict',
        'phrase'    => 'The request could not be processed because of conflict in the request.',
        'exception' => HttpException\ConflictException::class,
    ],

    HttpStatus::STATUS_GONE => [
        'name'      => 'Gone',
        'phrase'    => 'The requested resource is no longer available and will not be available again.',
        'exception' => HttpException\GoneException::class,
    ],

    HttpStatus::STATUS_LENGTH_REQUIRED => [
        'name'      => 'Length Required',
        'phrase'    => 'The request did not specify the length of its content, which is required by the resource.',
        'exception' => HttpException\LengthRequiredException::class,
    ],

    HttpStatus::STATUS_PRECONDITION_FAILED => [
        'name'      => 'Precondition Failed',
        'phrase'    => 'The server does not meet one of the preconditions that the requester put on the request.',
        'exception' => HttpException\PreconditionFailedException::class,
    ],

    HttpStatus::STATUS_PAYLOAD_TOO_LARGE => [
        'name'      => 'Payload Too Large',
        'phrase'    => 'The server cannot process the request because the request payload is too large.',
        'exception' => HttpException\PayloadTooLargeException::class,
    ],

    HttpStatus::STATUS_URI_TOO_LONG => [
        'name'      => 'URI Too Long',
        'phrase'    => 'The request-target is longer than the server is willing to interpret.',
        'exception' => HttpException\RequestUriTooLongException::class,
    ],

    HttpStatus::STATUS_UNSUPPORTED_MEDIA_TYPE => [
        'name'      => 'Unsupported Media Type',
        'phrase'    => 'The request entity has a media type which the server or resource does not support.',
        'exception' => HttpException\UnsupportedMediaTypeException::class,
    ],

    HttpStatus::STATUS_RANGE_NOT_SATISFIABLE => [
        'name'      => 'Range Not Satisfiable',
        'phrase'    => 'The client has asked for a portion of the file, but the server cannot supply that portion.',
        'exception' => HttpException\RangeNotSatisfiableException::class,
    ],

    HttpStatus::STATUS_EXPECTATION_FAILED => [
        'name'      => 'Expectation Failed',
        'phrase'    => 'The expectation given could not be met by at least one of the inbound servers.',
        'exception' => HttpException\ExpectationFailedException::class,
    ],

    HttpStatus::STATUS_IM_A_TEAPOT => [
        'name'      => 'I\'m a teapot',
        'phrase'    => 'I\'m a teapot',
        'exception' => HttpException\ImATeapotException::class,
    ],

    HttpStatus::STATUS_MISDIRECTED_REQUEST => [
        'name'      => 'Misdirected Request',
        'phrase'    => 'The request was directed at a server that is not able to produce a response.',
        'exception' => HttpException\MisdirectedRequestException::class,
    ],

    HttpStatus::STATUS_UNPROCESSABLE_ENTITY => [
        'name'      => 'Unprocessable Entity',
        'phrase'    => 'The request was well-formed but was unable to be followed due to semantic errors.',
        'exception' => HttpException\UnprocessableEntityException::class,
    ],

    HttpStatus::STATUS_LOCKED => [
        'name'      => 'Locked',
        'phrase'    => 'The resource that is being accessed is locked.',
        'exception' => HttpException\LockedException::class,
    ],

    HttpStatus::STATUS_FAILED_DEPENDENCY => [
        'name'      => 'Failed Dependency',
        'phrase'    => 'The request failed due to failure of a previous request.',
        'exception' => HttpException\FailedDependencyException::class,
    ],

    HttpStatus::STATUS_TOO_EARLY => [
        'name'      => 'Too Early',
        'phrase'    => 'The server is unwilling to risk processing a request that might be replayed.',
        'exception' => HttpException\TooEarlyException::class,
    ],

    HttpStatus::STATUS_UPGRADE_REQUIRED => [
        'name'      => 'Upgrade Required',
        'phrase'    => 'The server cannot process the request using the current protocol.',
        'exception' => HttpException\UpgradeRequiredException::class,
    ],

    HttpStatus::STATUS_PRECONDITION_REQUIRED => [
        'name'      => 'Precondition Required',
        'phrase'    => 'The origin server requires the request to be conditional.',
        'exception' => HttpException\PreconditionRequiredException::class,
    ],

    HttpStatus::STATUS_TOO_MANY_REQUESTS => [
        'name'      => 'Too Many Requests',
        'phrase'    => 'The user has sent too many requests in a given amount of time.',
        'exception' => HttpException\TooManyRequestsException::class,
    ],

    HttpStatus::STATUS_REQUEST_HEADER_FIELDS_TOO_LARGE => [
        'name'      => 'Request Header Fields Too Large',
        'phrase'    => 'The server is unwilling to process the request because either an individual header field, or all the header fields collectively, are too large.',
        'exception' => HttpException\RequestHeaderFieldsTooLargeException::class,
    ],

    HttpStatus::STATUS_UNAVAILABLE_FOR_LEGAL_REASONS => [
        'name'      => 'Unavailable For Legal Reasons',
        'phrase'    => 'Resource access is denied for legal reasons.',
        'exception' => HttpException\UnavailableForLegalReasonsException::class,
    ],

    // </editor-fold>

    // <editor-fold desc="5xx Server Error">

    HttpStatus::STATUS_INTERNAL_SERVER_ERROR => [
        'name'      => 'Internal Server Error',
        'phrase'    => 'An error has occurred and this resource cannot be displayed.',
        'exception' => HttpException\InternalServerErrorException::class,
    ],

    HttpStatus::STATUS_NOT_IMPLEMENTED => [
        'name'      => 'Not Implemented',
        'phrase'    => 'The server either does not recognize the request method, or it lacks the ability to fulfil the request.',
        'exception' => HttpException\NotImplementedException::class,
    ],

    HttpStatus::STATUS_BAD_GATEWAY => [
        'name'      => 'Bad Gateway',
        'phrase'    => 'The server was acting as a gateway or proxy and received an invalid response from the upstream server.',
        'exception' => HttpException\BadGatewayException::class,
    ],

    HttpStatus::STATUS_SERVICE_UNAVAILABLE => [
        'name'      => 'Service Unavailable',
        'phrase'    => 'The server is currently unavailable. It may be overloaded or down for maintenance.',
        'exception' => HttpException\ServiceUnavailableException::class,
    ],

    HttpStatus::STATUS_GATEWAY_TIMEOUT => [
        'name'      => 'Gateway Timeout',
        'phrase'    => 'The server was acting as a gateway or proxy and did not receive a timely response from the upstream server.',
        'exception' => HttpException\GatewayTimeoutException::class,
    ],

    HttpStatus::STATUS_VERSION_NOT_SUPPORTED => [
        'name'      => 'HTTP Version Not Supported',
        'phrase'    => 'The server does not support the HTTP protocol version used in the request.',
        'exception' => HttpException\VersionNotSupportedException::class,
    ],

    HttpStatus::STATUS_VARIANT_ALSO_NEGOTIATES => [
        'name'      => 'Variant Also Negotiates',
        'phrase'    => 'Transparent content negotiation for the request, results in a circular reference.',
        'exception' => HttpException\VariantAlsoNegotiatesException::class,
    ],

    HttpStatus::STATUS_INSUFFICIENT_STORAGE => [
        'name'      => 'Insufficient Storage',
        'phrase'    => 'The method could not be performed on the resource because the server is unable to store the representation needed to successfully complete the request. There is insufficient free space left in your storage allocation.',
        'exception' => HttpException\InsufficientStorageException::class,
    ],

    HttpStatus::STATUS_LOOP_DETECTED => [
        'name'      => 'Loop Detected',
        'phrase'    => 'The server detected an infinite loop while processing the request.',
        'exception' => HttpException\LoopDetectedException::class,
    ],

    HttpStatus::STATUS_NOT_EXTENDED => [
        'name'      => 'Not Extended',
        'phrase'    => 'Further extensions to the request are required for the server to fulfill it. A mandatory extension policy in the request is not accepted by the server for this resource.',
        'exception' => HttpException\NotExtendedException::class,
    ],

    HttpStatus::STATUS_NETWORK_AUTHENTICATION_REQUIRED => [
        'name'      => 'Network Authentication Required',
        'phrase'    => 'The client needs to authenticate to gain network access.',
        'exception' => HttpException\NetworkAuthenticationRequiredException::class,
    ],

    // </editor-fold>

];

// phpcs:enable
