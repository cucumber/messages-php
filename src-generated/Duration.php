<?php

declare(strict_types=1);

/**
 * This code was auto-generated by {this script}[https://github.com/cucumber/messages/blob/main/codegen/codegen.rb]
 */

namespace Cucumber\Messages;

use JsonSerializable;
use Cucumber\Messages\DecodingException\SchemaViolationException;

/**
 * Represents the Duration message in Cucumber's message protocol
 * @see https://github.com/cucumber/messages
 *
 * The structure is pretty close of the Timestamp one. For clarity, a second type
 * of message is used. */
final class Duration implements JsonSerializable
{
    use JsonEncodingTrait;

    /**
     * Construct the Duration with all properties
     *
     */
    public function __construct(
        public readonly int $seconds = 0,

        /**
         * Non-negative fractions of a second at nanosecond resolution. Negative
         * second values with fractions must still have non-negative nanos values
         * that count forward in time. Must be from 0 to 999,999,999
         * inclusive.
         */
        public readonly int $nanos = 0,
    ) {
    }

    /**
     * @throws SchemaViolationException
     *
     * @internal
     */
    public static function fromArray(array $arr): self
    {
        self::ensureSeconds($arr);
        self::ensureNanos($arr);

        return new self(
            (int) $arr['seconds'],
            (int) $arr['nanos'],
        );
    }

    /**
     * @psalm-assert array{seconds: string|int|bool} $arr
     */
    private static function ensureSeconds(array $arr): void
    {
        if (!array_key_exists('seconds', $arr)) {
            throw new SchemaViolationException('Property \'seconds\' is required but was not found');
        }
        if (array_key_exists('seconds', $arr) && is_array($arr['seconds'])) {
            throw new SchemaViolationException('Property \'seconds\' was array');
        }
    }

    /**
     * @psalm-assert array{nanos: string|int|bool} $arr
     */
    private static function ensureNanos(array $arr): void
    {
        if (!array_key_exists('nanos', $arr)) {
            throw new SchemaViolationException('Property \'nanos\' is required but was not found');
        }
        if (array_key_exists('nanos', $arr) && is_array($arr['nanos'])) {
            throw new SchemaViolationException('Property \'nanos\' was array');
        }
    }
}
