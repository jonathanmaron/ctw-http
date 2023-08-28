<?php
declare(strict_types=1);

namespace Ctw\Http;

use Ctw\Http\Entity\HttpStatus as Entity;
use Ctw\Http\Exception\InvalidArgumentException;
use Fig\Http\Message\StatusCodeInterface;

class HttpStatus implements StatusCodeInterface
{
    /**
     * @var string
     */
    private const FILENAME = __DIR__ . '/../data/http-status.php';

    private array $db;

    private int   $statusCode;

    public function __construct(int $statusCode)
    {
        $db = (array) include self::FILENAME;
        $this->setDb($db);
        $this->validateStatusCode($statusCode);
        $this->setStatusCode($statusCode);
    }

    public function get(): Entity
    {
        $db         = $this->getDb();
        $statusCode = $this->getStatusCode();

        $entity             = new Entity();
        $entity->statusCode = $statusCode;
        $entity->name       = $db[$entity->statusCode]['name'];
        $entity->phrase     = $db[$entity->statusCode]['phrase'];
        $entity->exception  = $db[$entity->statusCode]['exception'];
        $entity->url        = sprintf('https://httpstatuses.com/%s', $entity->statusCode);

        return $entity;
    }

    private function getDb(): array
    {
        return $this->db;
    }

    private function setDb(array $db): self
    {
        $this->db = $db;

        return $this;
    }

    private function getStatusCode(): int
    {
        return $this->statusCode;
    }

    private function setStatusCode(int $statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    private function validateStatusCode(int $statusCode): self
    {
        if (!array_key_exists($statusCode, $this->getDb())) {
            $format  = 'The status code %d is not supported';
            $message = sprintf($format, $statusCode);
            throw new InvalidArgumentException($message);
        }

        return $this;
    }
}
