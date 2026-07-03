<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpException\AbstractClientErrorException;
use Ctw\Http\HttpException\AbstractException;
use Ctw\Http\HttpException\AbstractServerErrorException;
use PHPUnit\Framework\Attributes\DataProvider;
use ReflectionClass;

final class AbstractServerErrorExceptionTest extends AbstractCase
{
    /**
     * Representative 5xx server-error exceptions spanning the low, middle and
     * high ends of the server-error range.
     *
     * @return array<string, array{class-string}>
     */
    public static function provideServerErrorExceptions(): array
    {
        return [
            '500 Internal Server Error'            => [HttpException\InternalServerErrorException::class],
            '501 Not Implemented'                  => [HttpException\NotImplementedException::class],
            '502 Bad Gateway'                      => [HttpException\BadGatewayException::class],
            '503 Service Unavailable'              => [HttpException\ServiceUnavailableException::class],
            '507 Insufficient Storage'             => [HttpException\InsufficientStorageException::class],
            '511 Network Authentication Required'  => [HttpException\NetworkAuthenticationRequiredException::class],
        ];
    }

    /**
     * Test that each representative server-error exception extends the shared
     * AbstractServerErrorException base, enabling all 5xx errors to be caught
     * as a single family.
     */
    #[DataProvider('provideServerErrorExceptions')]
    public function testServerErrorExceptionExtendsAbstractServerErrorException(string $class): void
    {
        self::assertTrue(is_subclass_of($class, AbstractServerErrorException::class));
    }

    /**
     * Test that each representative server-error exception also extends the
     * common AbstractException base shared by every HTTP exception.
     */
    #[DataProvider('provideServerErrorExceptions')]
    public function testServerErrorExceptionExtendsAbstractException(string $class): void
    {
        self::assertTrue(is_subclass_of($class, AbstractException::class));
    }

    /**
     * Test that a server-error exception is not categorized under the
     * client-error family, keeping the 4xx and 5xx groupings mutually exclusive.
     */
    #[DataProvider('provideServerErrorExceptions')]
    public function testServerErrorExceptionIsNotClientError(string $class): void
    {
        self::assertFalse(is_subclass_of($class, AbstractClientErrorException::class));
    }

    /**
     * Test that a thrown server-error exception is catchable through the
     * AbstractServerErrorException family type while still reporting its own
     * status code and message.
     */
    public function testServerErrorExceptionIsCatchableAsAbstractServerErrorException(): void
    {
        $message = 'Server error occurred';

        try {
            throw new HttpException\ServiceUnavailableException($message);
        } catch (AbstractServerErrorException $serverErrorException) {
            self::assertSame($message, $serverErrorException->getMessage());
            self::assertSame(503, $serverErrorException->getStatusCode());
        }
    }

    /**
     * Test that AbstractServerErrorException is declared abstract and therefore
     * cannot be instantiated directly.
     */
    public function testAbstractServerErrorExceptionIsAbstract(): void
    {
        $reflection = new ReflectionClass(AbstractServerErrorException::class);

        self::assertTrue($reflection->isAbstract());
    }

    /**
     * Test that the AbstractServerErrorException base itself extends the common
     * AbstractException base.
     */
    public function testAbstractServerErrorExceptionExtendsAbstractException(): void
    {
        $reflection = new ReflectionClass(AbstractServerErrorException::class);
        $parent     = $reflection->getParentClass();

        self::assertNotFalse($parent);
        self::assertSame(AbstractException::class, $parent->getName());
    }
}
