<?php
declare(strict_types=1);

namespace CtwTest\Http\Exception;

use Ctw\Http\Exception\ExceptionInterface;
use Ctw\Http\Exception\InvalidArgumentException;

final class InvalidArgumentExceptionTest extends AbstractCase
{
    /**
     * Test that the exception reports an empty message and zero code when constructed with default values.
     */
    public function testInvalidArgumentExceptionInstantiation(): void
    {
        $exception = new InvalidArgumentException();

        // @phpstan-ignore-next-line
        self::assertInstanceOf(InvalidArgumentException::class, $exception);
        // @phpstan-ignore-next-line
        self::assertInstanceOf(\InvalidArgumentException::class, $exception);
        // @phpstan-ignore-next-line
        self::assertInstanceOf(ExceptionInterface::class, $exception);
        self::assertSame('', $exception->getMessage());
        self::assertSame(0, $exception->getCode());
    }

    /**
     * Test that the exception returns the supplied message and a zero code when constructed with a message only.
     */
    public function testInvalidArgumentExceptionWithMessage(): void
    {
        $message = 'Invalid argument provided';
        $exception = new InvalidArgumentException($message);

        self::assertSame($message, $exception->getMessage());
        self::assertSame(0, $exception->getCode());
    }

    /**
     * Test that the exception returns both the supplied message and code when constructed with a message and code.
     */
    public function testInvalidArgumentExceptionWithMessageAndCode(): void
    {
        $message = 'Invalid argument provided';
        $code = 100;
        $exception = new InvalidArgumentException($message, $code);

        self::assertSame($message, $exception->getMessage());
        self::assertSame($code, $exception->getCode());
    }

    /**
     * Test that the exception chains the prior throwable when constructed with a previous exception.
     */
    public function testInvalidArgumentExceptionWithPrevious(): void
    {
        $previousMessage = 'Previous exception';
        $previous = new \Exception($previousMessage);

        $message = 'Invalid argument provided';
        $exception = new InvalidArgumentException($message, 0, $previous);

        self::assertSame($message, $exception->getMessage());
        self::assertSame($previous, $exception->getPrevious());
        self::assertSame($previousMessage, $exception->getPrevious()->getMessage());
    }

    /**
     * Test that the exception is raised with its message intact when thrown.
     */
    public function testInvalidArgumentExceptionThrow(): void
    {
        $message = 'Invalid argument provided';

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage($message);

        throw new InvalidArgumentException($message);
    }

    /**
     * Test that the exception is catchable as the native InvalidArgumentException when thrown.
     */
    public function testInvalidArgumentExceptionCatchAsInvalidArgument(): void
    {
        $message = 'Invalid argument provided';

        try {
            throw new InvalidArgumentException($message);
        } catch (\InvalidArgumentException $invalidArgumentException) {
            self::assertSame($message, $invalidArgumentException->getMessage());
            self::assertInstanceOf(InvalidArgumentException::class, $invalidArgumentException);
        }
    }

    /**
     * Test that the exception is catchable as the package ExceptionInterface when thrown.
     */
    public function testInvalidArgumentExceptionCatchAsExceptionInterface(): void
    {
        $message = 'Invalid argument provided';

        try {
            throw new InvalidArgumentException($message);
        } catch (ExceptionInterface $exception) {
            self::assertSame($message, $exception->getMessage());
            self::assertInstanceOf(InvalidArgumentException::class, $exception);
        }
    }

    /**
     * Test that the string cast contains the class name and message when the exception is converted to a string.
     */
    public function testInvalidArgumentExceptionToString(): void
    {
        $message = 'Invalid argument provided';
        $exception = new InvalidArgumentException($message);

        $string = (string) $exception;

        self::assertStringContainsString(InvalidArgumentException::class, $string);
        self::assertStringContainsString($message, $string);
    }
}
