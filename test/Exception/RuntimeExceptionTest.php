<?php
declare(strict_types=1);

namespace CtwTest\Http\Exception;

use Ctw\Http\Exception\ExceptionInterface;
use Ctw\Http\Exception\RuntimeException;

final class RuntimeExceptionTest extends AbstractCase
{
    /**
     * Test that the exception reports an empty message and zero code when constructed with default values.
     */
    public function testRuntimeExceptionInstantiation(): void
    {
        $exception = new RuntimeException();

        // @phpstan-ignore-next-line
        self::assertInstanceOf(RuntimeException::class, $exception);
        // @phpstan-ignore-next-line
        self::assertInstanceOf(\RuntimeException::class, $exception);
        // @phpstan-ignore-next-line
        self::assertInstanceOf(ExceptionInterface::class, $exception);
        self::assertSame('', $exception->getMessage());
        self::assertSame(0, $exception->getCode());
    }

    /**
     * Test that the exception returns the supplied message and a zero code when constructed with a message only.
     */
    public function testRuntimeExceptionWithMessage(): void
    {
        $message = 'Runtime error occurred';
        $exception = new RuntimeException($message);

        self::assertSame($message, $exception->getMessage());
        self::assertSame(0, $exception->getCode());
    }

    /**
     * Test that the exception returns both the supplied message and code when constructed with a message and code.
     */
    public function testRuntimeExceptionWithMessageAndCode(): void
    {
        $message = 'Runtime error occurred';
        $code = 500;
        $exception = new RuntimeException($message, $code);

        self::assertSame($message, $exception->getMessage());
        self::assertSame($code, $exception->getCode());
    }

    /**
     * Test that the exception chains the prior throwable when constructed with a previous exception.
     */
    public function testRuntimeExceptionWithPrevious(): void
    {
        $previousMessage = 'Previous exception';
        $previous = new \Exception($previousMessage);

        $message = 'Runtime error occurred';
        $exception = new RuntimeException($message, 0, $previous);

        self::assertSame($message, $exception->getMessage());
        self::assertSame($previous, $exception->getPrevious());
        self::assertSame($previousMessage, $exception->getPrevious()->getMessage());
    }

    /**
     * Test that the exception is raised with its message intact when thrown.
     */
    public function testRuntimeExceptionThrow(): void
    {
        $message = 'Runtime error occurred';

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage($message);

        throw new RuntimeException($message);
    }

    /**
     * Test that the exception is catchable as the native RuntimeException when thrown.
     */
    public function testRuntimeExceptionCatchAsRuntimeException(): void
    {
        $message = 'Runtime error occurred';

        try {
            throw new RuntimeException($message);
        } catch (\RuntimeException $runtimeException) {
            self::assertSame($message, $runtimeException->getMessage());
            self::assertInstanceOf(RuntimeException::class, $runtimeException);
        }
    }

    /**
     * Test that the exception is catchable as the package ExceptionInterface when thrown.
     */
    public function testRuntimeExceptionCatchAsExceptionInterface(): void
    {
        $message = 'Runtime error occurred';

        try {
            throw new RuntimeException($message);
        } catch (ExceptionInterface $exception) {
            self::assertSame($message, $exception->getMessage());
            self::assertInstanceOf(RuntimeException::class, $exception);
        }
    }

    /**
     * Test that the string cast contains the class name and message when the exception is converted to a string.
     */
    public function testRuntimeExceptionToString(): void
    {
        $message = 'Runtime error occurred';
        $exception = new RuntimeException($message);

        $string = (string) $exception;

        self::assertStringContainsString(RuntimeException::class, $string);
        self::assertStringContainsString($message, $string);
    }
}
