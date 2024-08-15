<?php

declare(strict_types=1);

/**
 * This code was auto-generated by {this script}[https://github.com/cucumber/messages/blob/main/codegen/codegen.rb]
 */

namespace Cucumber\Messages;

use JsonSerializable;
use Cucumber\Messages\DecodingException\SchemaViolationException;

/**
 * Represents the TestCase message in Cucumber's message protocol
 * @see https://github.com/cucumber/messages
 *
 * //// TestCases
 *
 * A `TestCase` contains a sequence of `TestStep`s. */
final class TestCase implements JsonSerializable
{
    use JsonEncodingTrait;

    /**
     * Construct the TestCase with all properties
     *
     * @param list<TestStep> $testSteps
     */
    public function __construct(
        public readonly string $id = '',

        /**
         * The ID of the `Pickle` this `TestCase` is derived from.
         */
        public readonly string $pickleId = '',
        public readonly array $testSteps = [],
    ) {
    }

    /**
     * @throws SchemaViolationException
     *
     * @internal
     */
    public static function fromArray(array $arr): self
    {
        self::ensureId($arr);
        self::ensurePickleId($arr);
        self::ensureTestSteps($arr);

        return new self(
            (string) $arr['id'],
            (string) $arr['pickleId'],
            array_values(array_map(fn (array $member) => TestStep::fromArray($member), $arr['testSteps'])),
        );
    }

    /**
     * @psalm-assert array{id: string|int|bool} $arr
     */
    private static function ensureId(array $arr): void
    {
        if (!array_key_exists('id', $arr)) {
            throw new SchemaViolationException('Property \'id\' is required but was not found');
        }
        if (array_key_exists('id', $arr) && is_array($arr['id'])) {
            throw new SchemaViolationException('Property \'id\' was array');
        }
    }

    /**
     * @psalm-assert array{pickleId: string|int|bool} $arr
     */
    private static function ensurePickleId(array $arr): void
    {
        if (!array_key_exists('pickleId', $arr)) {
            throw new SchemaViolationException('Property \'pickleId\' is required but was not found');
        }
        if (array_key_exists('pickleId', $arr) && is_array($arr['pickleId'])) {
            throw new SchemaViolationException('Property \'pickleId\' was array');
        }
    }

    /**
     * @psalm-assert array{testSteps: array} $arr
     */
    private static function ensureTestSteps(array $arr): void
    {
        if (!array_key_exists('testSteps', $arr)) {
            throw new SchemaViolationException('Property \'testSteps\' is required but was not found');
        }
        if (array_key_exists('testSteps', $arr) && !is_array($arr['testSteps'])) {
            throw new SchemaViolationException('Property \'testSteps\' was not array');
        }
    }
}
