<?php
declare(strict_types=1);

namespace Ctw\Http;

use Ctw\Http\Entity\HttpStatus as Entity;
use Ctw\Http\Exception\InvalidArgumentException;
use Fig\Http\Message\StatusCodeInterface;

class HttpStatus implements StatusCodeInterface
{
    private const string FILENAME = __DIR__ . '/../data/http-status.php';

    /**
     * @var array<int, array{name: string, phrase: string, exception: string}>
     */
    private readonly array $db;

    /**
     * Backed property whose PHP 8.4 `set` hook validates the assigned code
     * against the status-code database, throwing InvalidArgumentException for
     * an unsupported code. The hook replaces the former validateStatusCode()
     * and setStatusCode() helpers; assignment must therefore happen only after
     * {@see self::$db} is populated.
     */
    private int $statusCode {
        set(int $statusCode) {
            if (!array_key_exists($statusCode, $this->db)) {
                $format  = 'The status code %d is not supported';
                $message = sprintf($format, $statusCode);
                throw new InvalidArgumentException($message);
            }

            $this->statusCode = $statusCode;
        }
    }

    public function __construct(int $statusCode)
    {
        /** @var array<int, array{name: string, phrase: string, exception: string}> $db */
        $db = include self::FILENAME;

        $this->db         = $db;

        $this->statusCode = $statusCode;
    }

    #[\NoDiscard("the populated status entity is this method's only result")]
    public function get(): Entity
    {
        $db         = $this->db;
        $statusCode = $this->statusCode;

        $entity             = new Entity();
        $entity->statusCode = $statusCode;
        $entity->name       = $db[$statusCode]['name'];
        $entity->phrase     = $db[$statusCode]['phrase'];
        $entity->exception  = $db[$statusCode]['exception'];
        $entity->url        = sprintf('https://httpstatuses.com/%s', $statusCode);

        return $entity;
    }
}
