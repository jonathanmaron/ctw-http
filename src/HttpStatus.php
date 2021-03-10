<?php
declare(strict_types=1);

namespace TxTextControl\Http;

use Fig\Http\Message\StatusCodeInterface;
use TxTextControl\Http\HttpException\InvalidArgumentException;
use TxTextControl\Http\HttpException\OutOfBoundsException;

class HttpStatus implements StatusCodeInterface
{
    private static $stack;

    public const MINIMUM = 100;

    public const MAXIMUM = 599;

    public static function filterStatusCode(int $code): int
    {
        $filteredCode = filter_var($code, FILTER_VALIDATE_INT, [
            'options' => [
                'min_range' => self::MINIMUM, // get from stack
                'max_range' => self::MAXIMUM,
            ],
        ]);

        if (false === $filteredCode) {
            $format  = 'The submitted code "%s" must be a positive integer between %s and %s.';
            $message = sprintf($format, $code, self::MINIMUM, self::MAXIMUM);
            throw new InvalidArgumentException($message);
        }

        return $code;
    }

    public static function getDetail(int $code): string
    {
        $code = static::filterStatusCode($code);

        return self::get($code, 'detail');
    }

    public static function getTitle(int $code): string
    {
        $code = static::filterStatusCode($code);

        return self::get($code, 'title');
    }

    public static function throwException(int $code): void
    {
        $code = static::filterStatusCode($code);

        $exception = self::get($code, 'exception');

        throw new $exception;
    }

    public static function get(int $code, string $type): string
    {
        if (!isset(self::$stack)) {
            self::$stack = include __DIR__ . '/../data/data.php';
        }

        if (!isset(self::$stack[$code])) {
            $format  = 'Unknown HTTP status code: `%s`.';
            $message = sprintf($format, $code);
            throw new OutOfBoundsException($message);
        }

        if (!in_array($type, ['title', 'detail', 'exception'])) {
            // exception
        }

        return self::$stack[$code][$type] ?? '';
    }
}
