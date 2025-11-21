<?php
declare(strict_types=1);

namespace Ctw\Http\Entity;

class HttpStatus
{
    public int $statusCode;

    public string $name;

    public string $phrase;

    public string $exception;

    public string $url;
}
