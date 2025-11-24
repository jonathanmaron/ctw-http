<?php
declare(strict_types=1);

namespace CtwTest\Http\Entity;

use Ctw\Http\Entity\HttpStatus as Entity;
use Ctw\Http\HttpException;
use Ctw\Http\HttpStatus;
use PHPUnit\Framework\Attributes\DataProvider;
use ReflectionClass;
use ReflectionProperty;

final class HttpStatusTest extends AbstractCase
{
    /**
     * Test that entity can be instantiated
     */
    public function testEntityInstantiation(): void
    {
        $entity = new Entity();

        // @phpstan-ignore-next-line
        self::assertInstanceOf(Entity::class, $entity);
    }

    /**
     * Test that statusCode property can be set and retrieved
     */
    public function testEntityStatusCodeProperty(): void
    {
        $entity = new Entity();

        $entity->statusCode = HttpStatus::STATUS_NOT_FOUND;
        self::assertSame(HttpStatus::STATUS_NOT_FOUND, $entity->statusCode);
    }

    /**
     * Test that name property can be set and retrieved
     */
    public function testEntityNameProperty(): void
    {
        $entity = new Entity();

        $entity->name = 'Not Found';
        self::assertSame('Not Found', $entity->name);
    }

    /**
     * Test that phrase property can be set and retrieved
     */
    public function testEntityPhraseProperty(): void
    {
        $entity = new Entity();

        $entity->phrase = 'The requested resource could not be found';
        self::assertSame('The requested resource could not be found', $entity->phrase);
    }

    /**
     * Test that exception property can be set and retrieved
     */
    public function testEntityExceptionProperty(): void
    {
        $entity = new Entity();

        $entity->exception = HttpException\NotFoundException::class;
        self::assertSame(HttpException\NotFoundException::class, $entity->exception);
    }

    /**
     * Test that url property can be set and retrieved
     */
    public function testEntityUrlProperty(): void
    {
        $entity = new Entity();

        $entity->url = 'https://httpstatuses.com/404';
        self::assertSame('https://httpstatuses.com/404', $entity->url);
    }

    /**
     * Test that all properties can be set at once
     */
    public function testEntityAllProperties(): void
    {
        $entity = new Entity();

        $entity->statusCode = HttpStatus::STATUS_NOT_FOUND;
        $entity->name = 'Not Found';
        $entity->phrase = 'The requested resource could not be found';
        $entity->exception = HttpException\NotFoundException::class;
        $entity->url = 'https://httpstatuses.com/404';

        self::assertSame(HttpStatus::STATUS_NOT_FOUND, $entity->statusCode);
        self::assertSame('Not Found', $entity->name);
        self::assertSame('The requested resource could not be found', $entity->phrase);
        self::assertSame(HttpException\NotFoundException::class, $entity->exception);
        self::assertSame('https://httpstatuses.com/404', $entity->url);
    }

    /**
     * Test that entity has correct public properties
     */
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

        self::assertSame($expected, $actual);
    }

    /**
     * Test that entity has exactly 5 public properties
     */
    public function testPublicPropertiesCount(): void
    {
        $reflect    = new ReflectionClass(new Entity());
        $properties = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);

        self::assertCount(5, $properties);
    }

    /**
     * @return array<string, array{statusCode: int, name: string, phrase: string, exception: string}>
     */
    public static function statusCodesProvider(): array
    {
        return [
            '404 Not Found' => [
                'statusCode' => HttpStatus::STATUS_NOT_FOUND,
                'name' => 'Not Found',
                'phrase' => 'The requested resource could not be found',
                'exception' => HttpException\NotFoundException::class,
            ],
            '200 OK' => [
                'statusCode' => HttpStatus::STATUS_OK,
                'name' => 'OK',
                'phrase' => 'The request was successful',
                'exception' => '',
            ],
            '500 Internal Server Error' => [
                'statusCode' => HttpStatus::STATUS_INTERNAL_SERVER_ERROR,
                'name' => 'Internal Server Error',
                'phrase' => 'An error occurred on the server',
                'exception' => HttpException\InternalServerErrorException::class,
            ],
        ];
    }

    /**
     * Test that entity can store various status codes
     */
    #[DataProvider('statusCodesProvider')]
    public function testEntityWithVariousStatusCodes(
        int $statusCode,
        string $name,
        string $phrase,
        string $exception
    ): void {
        $entity = new Entity();

        $entity->statusCode = $statusCode;
        $entity->name = $name;
        $entity->phrase = $phrase;
        $entity->exception = $exception;

        self::assertSame($statusCode, $entity->statusCode);
        self::assertSame($name, $entity->name);
        self::assertSame($phrase, $entity->phrase);
        self::assertSame($exception, $entity->exception);
    }
}
