<?php
declare(strict_types=1);

namespace CtwTest\Http\Entity;

use Ctw\Http\Entity\HttpStatus as Entity;
use Ctw\Http\HttpStatus;
use ReflectionClass;
use ReflectionProperty;

class HttpStatusTest extends AbstractCase
{
    public function testEntity(): void
    {
        $entity = new Entity();

        $entity->statusCode = HttpStatus::STATUS_NOT_FOUND;
        self::assertEquals(HttpStatus::STATUS_NOT_FOUND, $entity->statusCode);
    }

    public function testPublicProperties(): void
    {
        $reflect    = new ReflectionClass(new Entity());
        $properties = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);

        $actual = [];
        foreach ($properties as $property) {
            $actual[] = $property->getName();
        }
        sort($actual);

        $expected = ['statusCode', 'name', 'phrase', 'exception', 'url'];
        sort($expected);

        self::assertEquals($expected, $actual);
    }
}
