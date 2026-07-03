<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException;
use Ctw\Http\HttpException\AbstractClientErrorException;
use Ctw\Http\HttpException\AbstractException;
use Ctw\Http\HttpException\AbstractServerErrorException;
use PHPUnit\Framework\Attributes\DataProvider;
use ReflectionClass;

final class AbstractClientErrorExceptionTest extends AbstractCase
{
    /**
     * Representative 4xx client-error exceptions spanning the low, middle and
     * high ends of the client-error range.
     *
     * @return array<string, array{class-string}>
     */
    public static function provideClientErrorExceptions(): array
    {
        return [
            '400 Bad Request'                   => [HttpException\BadRequestException::class],
            '401 Unauthorized'                  => [HttpException\UnauthorizedException::class],
            '403 Forbidden'                     => [HttpException\ForbiddenException::class],
            '404 Not Found'                     => [HttpException\NotFoundException::class],
            '429 Too Many Requests'             => [HttpException\TooManyRequestsException::class],
            '451 Unavailable For Legal Reasons' => [HttpException\UnavailableForLegalReasonsException::class],
        ];
    }

    /**
     * Test that each representative client-error exception extends the shared
     * AbstractClientErrorException base, enabling all 4xx errors to be caught
     * as a single family.
     */
    #[DataProvider('provideClientErrorExceptions')]
    public function testClientErrorExceptionExtendsAbstractClientErrorException(string $class): void
    {
        self::assertTrue(is_subclass_of($class, AbstractClientErrorException::class));
    }

    /**
     * Test that each representative client-error exception also extends the
     * common AbstractException base shared by every HTTP exception.
     */
    #[DataProvider('provideClientErrorExceptions')]
    public function testClientErrorExceptionExtendsAbstractException(string $class): void
    {
        self::assertTrue(is_subclass_of($class, AbstractException::class));
    }

    /**
     * Test that a client-error exception is not categorized under the
     * server-error family, keeping the 4xx and 5xx groupings mutually exclusive.
     */
    #[DataProvider('provideClientErrorExceptions')]
    public function testClientErrorExceptionIsNotServerError(string $class): void
    {
        self::assertFalse(is_subclass_of($class, AbstractServerErrorException::class));
    }

    /**
     * Test that a thrown client-error exception is catchable through the
     * AbstractClientErrorException family type while still reporting its own
     * status code and message.
     */
    public function testClientErrorExceptionIsCatchableAsAbstractClientErrorException(): void
    {
        $message = 'Client error occurred';

        try {
            throw new HttpException\ForbiddenException($message);
        } catch (AbstractClientErrorException $clientErrorException) {
            self::assertSame($message, $clientErrorException->getMessage());
            self::assertSame(403, $clientErrorException->getStatusCode());
        }
    }

    /**
     * Test that AbstractClientErrorException is declared abstract and therefore
     * cannot be instantiated directly.
     */
    public function testAbstractClientErrorExceptionIsAbstract(): void
    {
        $reflection = new ReflectionClass(AbstractClientErrorException::class);

        self::assertTrue($reflection->isAbstract());
    }

    /**
     * Test that the AbstractClientErrorException base itself extends the common
     * AbstractException base.
     */
    public function testAbstractClientErrorExceptionExtendsAbstractException(): void
    {
        $reflection = new ReflectionClass(AbstractClientErrorException::class);
        $parent     = $reflection->getParentClass();

        self::assertNotFalse($parent);
        self::assertSame(AbstractException::class, $parent->getName());
    }
}
