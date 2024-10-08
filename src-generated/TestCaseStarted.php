<?php

declare(strict_types=1);

/**
 * This code was auto-generated by {this script}[https://github.com/cucumber/messages/blob/main/codegen/codegen.rb]
 */

namespace Cucumber\Messages;

use JsonSerializable;
use Cucumber\Messages\DecodingException\SchemaViolationException;

/**
 * Represents the TestCaseStarted message in Cucumber's message protocol
 * @see https://github.com/cucumber/messages
 *
 */
final class TestCaseStarted implements JsonSerializable
{
    use JsonEncodingTrait;

    /**
     * Construct the TestCaseStarted with all properties
     *
     */
    public function __construct(

        /**
         * The first attempt should have value 0, and for each retry the value
         * should increase by 1.
         */
        public readonly int $attempt = 0,

        /**
         * Because a `TestCase` can be run multiple times (in case of a retry),
         * we use this field to group messages relating to the same attempt.
         */
        public readonly string $id = '',
        public readonly string $testCaseId = '',

        /**
         * An identifier for the worker process running this test case, if test cases are being run in parallel. The identifier will be unique per worker, but no particular format is defined - it could be an index, uuid, machine name etc - and as such should be assumed that it's not human readable.
         */
        public readonly ?string $workerId = null,
        public readonly Timestamp $timestamp = new Timestamp(),
    ) {
    }

    /**
     * @throws SchemaViolationException
     *
     * @internal
     */
    public static function fromArray(array $arr): self
    {
        self::ensureAttempt($arr);
        self::ensureId($arr);
        self::ensureTestCaseId($arr);
        self::ensureWorkerId($arr);
        self::ensureTimestamp($arr);

        return new self(
            (int) $arr['attempt'],
            (string) $arr['id'],
            (string) $arr['testCaseId'],
            isset($arr['workerId']) ? (string) $arr['workerId'] : null,
            Timestamp::fromArray($arr['timestamp']),
        );
    }

    /**
     * @psalm-assert array{attempt: string|int|bool} $arr
     */
    private static function ensureAttempt(array $arr): void
    {
        if (!array_key_exists('attempt', $arr)) {
            throw new SchemaViolationException('Property \'attempt\' is required but was not found');
        }
        if (array_key_exists('attempt', $arr) && is_array($arr['attempt'])) {
            throw new SchemaViolationException('Property \'attempt\' was array');
        }
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
     * @psalm-assert array{testCaseId: string|int|bool} $arr
     */
    private static function ensureTestCaseId(array $arr): void
    {
        if (!array_key_exists('testCaseId', $arr)) {
            throw new SchemaViolationException('Property \'testCaseId\' is required but was not found');
        }
        if (array_key_exists('testCaseId', $arr) && is_array($arr['testCaseId'])) {
            throw new SchemaViolationException('Property \'testCaseId\' was array');
        }
    }

    /**
     * @psalm-assert array{workerId?: string|int|bool} $arr
     */
    private static function ensureWorkerId(array $arr): void
    {
        if (array_key_exists('workerId', $arr) && is_array($arr['workerId'])) {
            throw new SchemaViolationException('Property \'workerId\' was array');
        }
    }

    /**
     * @psalm-assert array{timestamp: array} $arr
     */
    private static function ensureTimestamp(array $arr): void
    {
        if (!array_key_exists('timestamp', $arr)) {
            throw new SchemaViolationException('Property \'timestamp\' is required but was not found');
        }
        if (array_key_exists('timestamp', $arr) && !is_array($arr['timestamp'])) {
            throw new SchemaViolationException('Property \'timestamp\' was not array');
        }
    }
}
