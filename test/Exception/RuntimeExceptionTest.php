<?php
declare(strict_types=1);

namespace CtwTest\Http\Exception;

use Ctw\Http\Exception\ExceptionInterface;
use Ctw\Http\Exception\RuntimeException;

final class RuntimeExceptionTest extends AbstractCase
{
    /**
     * Test that exception can be instantiated with default values
     */
    public function testRuntimeExceptionInstantiation(): void
    {
        $exception = new RuntimeException();

        self::assertInstanceOf(RuntimeException::class, $exception);
        self::assertInstanceOf(\RuntimeException::class, $exception);
        self::assertInstanceOf(ExceptionInterface::class, $exception);
        self::assertSame('', $exception->getMessage());
        self::assertSame(0, $exception->getCode());
    }

    /**
     * Test that exception can be instantiated with custom message
     */
    public function testRuntimeExceptionWithMessage(): void
    {
        $message = 'Runtime error occurred';
        $exception = new RuntimeException($message);

        self::assertSame($message, $exception->getMessage());
        self::assertSame(0, $exception->getCode());
    }

    /**
     * Test that exception can be instantiated with custom message and code
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
     * Test that exception can be instantiated with previous exception
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
     * Test that exception can be thrown and caught
     */
    public function testRuntimeExceptionThrow(): void
    {
        $message = 'Runtime error occurred';

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage($message);

        throw new RuntimeException($message);
    }

    /**
     * Test that exception can be caught as RuntimeException
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
     * Test that exception can be caught as ExceptionInterface
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
     * Test that exception has correct string representation
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
