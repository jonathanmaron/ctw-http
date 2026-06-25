<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException\OutOfBoundsException;

final class OutOfBoundsExceptionTest extends AbstractCase
{
    /**
     * Test that the exception reports an empty message and zero code when constructed with default values.
     */
    public function testOutOfBoundsExceptionInstantiation(): void
    {
        $exception = new OutOfBoundsException();

        // @phpstan-ignore-next-line
        self::assertInstanceOf(OutOfBoundsException::class, $exception);
        // @phpstan-ignore-next-line
        self::assertInstanceOf(\OutOfBoundsException::class, $exception);
        self::assertSame('', $exception->getMessage());
        self::assertSame(0, $exception->getCode());
    }

    /**
     * Test that the exception returns the supplied message and a zero code when constructed with a message only.
     */
    public function testOutOfBoundsExceptionWithMessage(): void
    {
        $message = 'Index out of bounds';
        $exception = new OutOfBoundsException($message);

        self::assertSame($message, $exception->getMessage());
        self::assertSame(0, $exception->getCode());
    }

    /**
     * Test that the exception returns both the supplied message and code when constructed with a message and code.
     */
    public function testOutOfBoundsExceptionWithMessageAndCode(): void
    {
        $message = 'Index out of bounds';
        $code = 1;
        $exception = new OutOfBoundsException($message, $code);

        self::assertSame($message, $exception->getMessage());
        self::assertSame($code, $exception->getCode());
    }

    /**
     * Test that the exception chains the prior throwable when constructed with a previous exception.
     */
    public function testOutOfBoundsExceptionWithPrevious(): void
    {
        $previousMessage = 'Previous exception';
        $previous = new \Exception($previousMessage);

        $message = 'Index out of bounds';
        $exception = new OutOfBoundsException($message, 0, $previous);

        self::assertSame($message, $exception->getMessage());
        self::assertSame($previous, $exception->getPrevious());
        self::assertSame($previousMessage, $exception->getPrevious()->getMessage());
    }

    /**
     * Test that the exception is raised with its message intact when thrown.
     */
    public function testOutOfBoundsExceptionThrow(): void
    {
        $message = 'Index out of bounds';

        $this->expectException(OutOfBoundsException::class);
        $this->expectExceptionMessage($message);

        throw new OutOfBoundsException($message);
    }

    /**
     * Test that the exception is catchable as the native OutOfBoundsException when thrown.
     */
    public function testOutOfBoundsExceptionCatchAsOutOfBounds(): void
    {
        $message = 'Index out of bounds';

        try {
            throw new OutOfBoundsException($message);
        } catch (\OutOfBoundsException $outOfBoundsException) {
            self::assertSame($message, $outOfBoundsException->getMessage());
            self::assertInstanceOf(OutOfBoundsException::class, $outOfBoundsException);
        }
    }

    /**
     * Test that the string cast contains the class name and message when the exception is converted to a string.
     */
    public function testOutOfBoundsExceptionToString(): void
    {
        $message = 'Index out of bounds';
        $exception = new OutOfBoundsException($message);

        $string = (string) $exception;

        self::assertStringContainsString(OutOfBoundsException::class, $string);
        self::assertStringContainsString($message, $string);
    }
}
