<?php

use TxTextControl\Http\HttpException;
use TxTextControl\Http\Message\StatusCode;

return [
    StatusCode::STATUS_CONTINUE                        => [
        'title'     => 'Continue',
        'detail'    => '',
        'exception' => '',
    ],
    StatusCode::STATUS_SWITCHING_PROTOCOLS             => [
        'title'     => 'Switching Protocols',
        'detail'    => '',
        'exception' => '',
    ],
    StatusCode::STATUS_PROCESSING                      => [
        'title'     => 'Processing',
        'detail'    => '',
        'exception' => '',
    ],
    StatusCode::STATUS_EARLY_HINTS                     => [
        'title'     => 'Early Hints',
        'detail'    => '',
        'exception' => '',
    ],
    StatusCode::STATUS_OK                              => [
        'title'     => 'OK',
        'detail'    => 'Standard response for successful HTTP requests.',
        'exception' => '',
    ],
    StatusCode::STATUS_CREATED                         => [
        'title'     => 'Created',
        'detail'    => 'The request has been fulfilled, resulting in the creation of a new resource.',
        'exception' => '',
    ],
    StatusCode::STATUS_ACCEPTED                        => [
        'title'     => 'Accepted',
        'detail'    => 'The request has been accepted for processing, but the processing has not been completed.',
        'exception' => '',
    ],
    StatusCode::STATUS_NON_AUTHORITATIVE_INFORMATION   => [
        'title'     => 'Non-Authoritative Information',
        'detail'    => 'The server is a transforming proxy (e.g. a Web accelerator) that received a 200 OK from its origin, but is returning a modified version of the origin\'s response.',
        'exception' => '',
    ],
    StatusCode::STATUS_NO_CONTENT                      => [
        'title'     => 'No Content',
        'detail'    => 'The server successfully processed the request and is not returning any content.',
        'exception' => '',
    ],
    StatusCode::STATUS_RESET_CONTENT                   => [
        'title'     => 'Reset Content',
        'detail'    => 'The server successfully processed the request, but is not returning any content.',
        'exception' => '',
    ],
    StatusCode::STATUS_PARTIAL_CONTENT                 => [
        'title'     => 'Partial Content',
        'detail'    => 'The server is delivering only part of the resource (byte serving) due to a range header sent by the client.',
        'exception' => '',
    ],
    StatusCode::STATUS_MULTI_STATUS                    => [
        'title'     => 'Multi-Status',
        'detail'    => 'The message body that follows is an XML message and can contain a number of separate response codes, depending on how many sub-requests were made.',
        'exception' => '',
    ],
    StatusCode::STATUS_ALREADY_REPORTED                => [
        'title'     => 'Already Reported',
        'detail'    => 'The members of a DAV binding have already been enumerated in a previous reply to this request, and are not being included again.',
        'exception' => '',
    ],
    StatusCode::STATUS_IM_USED                         => [
        'title'     => 'IM Used',
        'detail'    => 'The server has fulfilled a request for the resource, and the response is a representation of the result of one or more instance-manipulations applied to the current instance.',
        'exception' => '',
    ],
    StatusCode::STATUS_MULTIPLE_CHOICES                => [
        'title'     => 'Multiple Choices',
        'detail'    => 'Indicates multiple options for the resource from which the client may choose.',
        'exception' => '',
    ],
    StatusCode::STATUS_MOVED_PERMANENTLY               => [
        'title'     => 'Moved Permanently',
        'detail'    => 'This and all future requests should be directed to the given URI.',
        'exception' => '',
    ],
    StatusCode::STATUS_FOUND                           => [
        'title'     => 'Found',
        'detail'    => 'This is an example of industry practice contradicting the standard.',
        'exception' => '',
    ],
    StatusCode::STATUS_SEE_OTHER                       => [
        'title'     => 'See Other',
        'detail'    => 'The response to the request can be found under another URI using a GET method.',
        'exception' => '',
    ],
    StatusCode::STATUS_NOT_MODIFIED                    => [
        'title'     => 'Not Modified',
        'detail'    => 'Indicates that the resource has not been modified since the version specified by the request headers If-Modified-Since or If-None-Match.',
        'exception' => '',
    ],
    StatusCode::STATUS_USE_PROXY                       => [
        'title'     => 'Use Proxy',
        'detail'    => 'The requested resource is available only through a proxy, the address for which is provided in the response.',
        'exception' => '',
    ],
    StatusCode::STATUS_RESERVED                        => [
        'title'     => '(Unused)',
        'detail'    => 'No longer used.',
        'exception' => '',
    ],
    StatusCode::STATUS_TEMPORARY_REDIRECT              => [
        'title'     => 'Temporary Redirect',
        'detail'    => 'In this case, the request should be repeated with another URI; however, future requests should still use the original URI.',
        'exception' => '',
    ],
    StatusCode::STATUS_PERMANENT_REDIRECT              => [
        'title'     => 'Permanent Redirect',
        'detail'    => 'The request and all future requests should be repeated using another URI.',
        'exception' => '',
    ],
    StatusCode::STATUS_BAD_REQUEST                     => [
        'title'     => 'Bad Request',
        'detail'    => 'The request cannot be fulfilled due to bad syntax.',
        'exception' => HttpException\BadRequestException::class,
    ],
    StatusCode::STATUS_UNAUTHORIZED                    => [
        'title'     => 'Unauthorized',
        'detail'    => 'Authentication is required and has failed or has not yet been provided.',
        'exception' => HttpException\UnauthorizedException::class,
    ],
    StatusCode::STATUS_PAYMENT_REQUIRED                => [
        'title'     => 'Payment Required',
        'detail'    => 'Reserved for future use.',
        'exception' => HttpException\PaymentRequiredException::class,
    ],
    StatusCode::STATUS_FORBIDDEN                       => [
        'title'     => 'Forbidden',
        'detail'    => 'The request was a valid request, but the server is refusing to respond to it.',
        'exception' => HttpException\ForbiddenException::class,
    ],
    StatusCode::STATUS_NOT_FOUND                       => [
        'title'     => 'Not Found',
        'detail'    => 'The requested resource could not be found but may be available again in the future.',
        'exception' => HttpException\NotFoundException::class,
    ],
    StatusCode::STATUS_METHOD_NOT_ALLOWED              => [
        'title'     => 'Method Not Allowed',
        'detail'    => 'A request was made of a resource using a request method not supported by that resource.',
        'exception' => HttpException\MethodNotAllowedException::class,
    ],
    StatusCode::STATUS_NOT_ACCEPTABLE                  => [
        'title'     => 'Not Acceptable',
        'detail'    => 'The requested resource is only capable of generating content not acceptable.',
        'exception' => HttpException\NotAcceptableException::class,
    ],
    StatusCode::STATUS_PROXY_AUTHENTICATION_REQUIRED   => [
        'title'     => 'Proxy Authentication Required',
        'detail'    => 'Proxy authentication is required to access the requested resource.',
        'exception' => HttpException\ProxyAuthenticationRequiredException::class,
    ],
    StatusCode::STATUS_REQUEST_TIMEOUT                 => [
        'title'     => 'Request Timeout',
        'detail'    => 'The server did not receive a complete request message in time.',
        'exception' => HttpException\RequestTimeoutException::class,
    ],
    StatusCode::STATUS_CONFLICT                        => [
        'title'     => 'Conflict',
        'detail'    => 'The request could not be processed because of conflict in the request.',
        'exception' => HttpException\ConflictException::class,
    ],
    StatusCode::STATUS_GONE                            => [
        'title'     => 'Gone',
        'detail'    => 'The requested resource is no longer available and will not be available again.',
        'exception' => HttpException\GoneException::class,
    ],
    StatusCode::STATUS_LENGTH_REQUIRED                 => [
        'title'     => 'Length Required',
        'detail'    => 'The request did not specify the length of its content, which is required by the resource.',
        'exception' => HttpException\LengthRequiredException::class,
    ],
    StatusCode::STATUS_PRECONDITION_FAILED             => [
        'title'     => 'Precondition Failed',
        'detail'    => 'The server does not meet one of the preconditions that the requester put on the request.',
        'exception' => HttpException\PreconditionFailedException::class,
    ],
    StatusCode::STATUS_PAYLOAD_TOO_LARGE               => [
        'title'     => 'Payload Too Large',
        'detail'    => 'The server cannot process the request because the request payload is too large.',
        'exception' => HttpException\PayloadTooLargeException::class,
    ],
    StatusCode::STATUS_URI_TOO_LONG                    => [
        'title'     => 'URI Too Long',
        'detail'    => 'The request-target is longer than the server is willing to interpret.',
        'exception' => HttpException\RequestUriTooLongException::class,
    ],
    StatusCode::STATUS_UNSUPPORTED_MEDIA_TYPE          => [
        'title'     => 'Unsupported Media Type',
        'detail'    => 'The request entity has a media type which the server or resource does not support.',
        'exception' => HttpException\UnsupportedMediaTypeException::class,
    ],
    StatusCode::STATUS_RANGE_NOT_SATISFIABLE           => [
        'title'     => 'Range Not Satisfiable',
        'detail'    => 'The client has asked for a portion of the file, but the server cannot supply that portion.',
        'exception' => HttpException\RangeNotSatisfiableException::class,
    ],
    StatusCode::STATUS_EXPECTATION_FAILED              => [
        'title'     => 'Expectation Failed',
        'detail'    => 'The expectation given could not be met by at least one of the inbound servers.',
        'exception' => HttpException\ExpectationFailedException::class,
    ],
    StatusCode::STATUS_IM_A_TEAPOT                     => [
        'title'     => 'I\'m a teapot',
        'detail'    => 'I\'m a teapot',
        'exception' => HttpException\ImATeapotException::class,
    ],
    StatusCode::STATUS_MISDIRECTED_REQUEST             => [
        'title'     => 'Misdirected Request',
        'detail'    => 'The request was directed at a server that is not able to produce a response.',
        'exception' => HttpException\MisdirectedRequestException::class,
    ],
    StatusCode::STATUS_UNPROCESSABLE_ENTITY            => [
        'title'     => 'Unprocessable Entity',
        'detail'    => 'The request was well-formed but was unable to be followed due to semantic errors.',
        'exception' => HttpException\UnprocessableEntityException::class,
    ],
    StatusCode::STATUS_LOCKED                          => [
        'title'     => 'Locked',
        'detail'    => 'The resource that is being accessed is locked.',
        'exception' => HttpException\LockedException::class,
    ],
    StatusCode::STATUS_FAILED_DEPENDENCY               => [
        'title'     => 'Failed Dependency',
        'detail'    => 'The request failed due to failure of a previous request.',
        'exception' => HttpException\FailedDependencyException::class,
    ],
    StatusCode::STATUS_TOO_EARLY                       => [
        'title'     => 'Too Early',
        'detail'    => 'The server is unwilling to risk processing a request that might be replayed.',
        'exception' => HttpException\TooEarlyException::class,
    ],
    StatusCode::STATUS_UPGRADE_REQUIRED                => [
        'title'     => 'Upgrade Required',
        'detail'    => 'The server cannot process the request using the current protocol.',
        'exception' => HttpException\UpgradeRequiredException::class,
    ],
    StatusCode::STATUS_PRECONDITION_REQUIRED           => [
        'title'     => 'Precondition Required',
        'detail'    => 'The origin server requires the request to be conditional.',
        'exception' => HttpException\PreconditionRequiredException::class,
    ],
    StatusCode::STATUS_TOO_MANY_REQUESTS               => [
        'title'     => 'Too Many Requests',
        'detail'    => 'The user has sent too many requests in a given amount of time.',
        'exception' => HttpException\TooManyRequestsException::class,
    ],
    StatusCode::STATUS_REQUEST_HEADER_FIELDS_TOO_LARGE => [
        'title'     => 'Request Header Fields Too Large',
        'detail'    => 'The server is unwilling to process the request because either an individual header field, or all the header fields collectively, are too large.',
        'exception' => HttpException\RequestHeaderFieldsTooLargeException::class,
    ],
    StatusCode::STATUS_UNAVAILABLE_FOR_LEGAL_REASONS   => [
        'title'     => 'Unavailable For Legal Reasons',
        'detail'    => 'Resource access is denied for legal reasons.',
        'exception' => HttpException\UnavailableForLegalReasonsException::class,
    ],
    StatusCode::STATUS_INTERNAL_SERVER_ERROR           => [
        'title'     => 'Internal Server Error',
        'detail'    => 'An error has occurred and this resource cannot be displayed.',
        'exception' => HttpException\InternalServerErrorException::class,
    ],
    StatusCode::STATUS_NOT_IMPLEMENTED                 => [
        'title'     => 'Not Implemented',
        'detail'    => 'The server either does not recognize the request method, or it lacks the ability to fulfil the request.',
        'exception' => HttpException\NotImplementedException::class,
    ],
    StatusCode::STATUS_BAD_GATEWAY                     => [
        'title'     => 'Bad Gateway',
        'detail'    => 'The server was acting as a gateway or proxy and received an invalid response from the upstream server.',
        'exception' => HttpException\BadGatewayException::class,
    ],
    StatusCode::STATUS_SERVICE_UNAVAILABLE             => [
        'title'     => 'Service Unavailable',
        'detail'    => 'The server is currently unavailable. It may be overloaded or down for maintenance.',
        'exception' => HttpException\ServiceUnavailableException::class,
    ],
    StatusCode::STATUS_GATEWAY_TIMEOUT                 => [
        'title'     => 'Gateway Timeout',
        'detail'    => 'The server was acting as a gateway or proxy and did not receive a timely response from the upstream server.',
        'exception' => HttpException\GatewayTimeoutException::class,
    ],
    StatusCode::STATUS_VERSION_NOT_SUPPORTED           => [
        'title'     => 'HTTP Version Not Supported',
        'detail'    => 'The server does not support the HTTP protocol version used in the request.',
        'exception' => HttpException\VersionNotSupportedException::class,
    ],
    StatusCode::STATUS_VARIANT_ALSO_NEGOTIATES         => [
        'title'     => 'Variant Also Negotiates',
        'detail'    => 'Transparent content negotiation for the request, results in a circular reference.',
        'exception' => HttpException\VariantAlsoNegotiatesException::class,
    ],
    StatusCode::STATUS_INSUFFICIENT_STORAGE            => [
        'title'     => 'Insufficient Storage',
        'detail'    => 'The method could not be performed on the resource because the server is unable to store the representation needed to successfully complete the request. There is insufficient free space left in your storage allocation.',
        'exception' => HttpException\InsufficientStorageException::class,
    ],
    StatusCode::STATUS_LOOP_DETECTED                   => [
        'title'     => 'Loop Detected',
        'detail'    => 'The server detected an infinite loop while processing the request.',
        'exception' => HttpException\LoopDetectedException::class,
    ],
    StatusCode::STATUS_NOT_EXTENDED                    => [
        'title'     => 'Not Extended',
        'detail'    => 'Further extensions to the request are required for the server to fulfill it.A mandatory extension policy in the request is not accepted by the server for this resource.',
        'exception' => HttpException\NotExtendedException::class,
    ],
    StatusCode::STATUS_NETWORK_AUTHENTICATION_REQUIRED => [
        'title'     => 'Network Authentication Required',
        'detail'    => 'The client needs to authenticate to gain network access.',
        'exception' => HttpException\NetworkAuthenticationRequiredException::class,
    ],
];
