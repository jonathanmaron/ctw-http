<?php
declare(strict_types=1);

namespace CtwTest\Http\HttpException;

use Ctw\Http\HttpException\OutOfBoundsException;

final class OutOfBoundsExceptionTest extends AbstractCase
{
    /**
     * Test that exception can be instantiated with default values
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
     * Test that exception can be instantiated with custom message
     */
    public function testOutOfBoundsExceptionWithMessage(): void
    {
        $message = 'Index out of bounds';
        $exception = new OutOfBoundsException($message);

        self::assertSame($message, $exception->getMessage());
        self::assertSame(0, $exception->getCode());
    }

    /**
     * Test that exception can be instantiated with custom message and code
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
     * Test that exception can be instantiated with previous exception
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
     * Test that exception can be thrown and caught
     */
    public function testOutOfBoundsExceptionThrow(): void
    {
        $message = 'Index out of bounds';

        $this->expectException(OutOfBoundsException::class);
        $this->expectExceptionMessage($message);

        throw new OutOfBoundsException($message);
    }

    /**
     * Test that exception can be caught as OutOfBoundsException
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
     * Test that exception has correct string representation
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
