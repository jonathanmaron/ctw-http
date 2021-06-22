<?php
declare(strict_types=1);

namespace Ctw\Http\Entity;

class HttpStatus
{
    public int    $statusCode;

    public string $name;

    public string $phrase;

    public ?string $exception; // null in case of 1**, 2** and 3** HTTP statuses

    public string $url;
}
