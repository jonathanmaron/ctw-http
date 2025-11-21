<?php
declare(strict_types=1);

namespace CtwTest\Http\Exception;

use Ctw\Http\Exception\ExceptionInterface;
use Ctw\Http\Exception\InvalidArgumentException;

final class InvalidArgumentExceptionTest extends AbstractCase
{
    /**
     * Test that exception can be instantiated with default values
     */
    public function testInvalidArgumentExceptionInstantiation(): void
    {
        $exception = new InvalidArgumentException();

        self::assertInstanceOf(InvalidArgumentException::class, $exception);
        self::assertInstanceOf(\InvalidArgumentException::class, $exception);
        self::assertInstanceOf(ExceptionInterface::class, $exception);
        self::assertSame('', $exception->getMessage());
        self::assertSame(0, $exception->getCode());
    }

    /**
     * Test that exception can be instantiated with custom message
     */
    public function testInvalidArgumentExceptionWithMessage(): void
    {
        $message = 'Invalid argument provided';
        $exception = new InvalidArgumentException($message);

        self::assertSame($message, $exception->getMessage());
        self::assertSame(0, $exception->getCode());
    }

    /**
     * Test that exception can be instantiated with custom message and code
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
     * Test that exception can be instantiated with previous exception
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
     * Test that exception can be thrown and caught
     */
    public function testInvalidArgumentExceptionThrow(): void
    {
        $message = 'Invalid argument provided';

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage($message);

        throw new InvalidArgumentException($message);
    }

    /**
     * Test that exception can be caught as InvalidArgumentException
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
     * Test that exception can be caught as ExceptionInterface
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
     * Test that exception has correct string representation
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
