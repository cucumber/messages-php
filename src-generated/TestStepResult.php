<?php

declare(strict_types=1);

/**
 * This code was auto-generated by {this script}[https://github.com/cucumber/common/blob/main/messages/jsonschema/scripts/codegen.rb]
 */

namespace Cucumber\Messages;

use JsonSerializable;
use Cucumber\Messages\DecodingException\SchemaViolationException;

/**
 * Represents the TestStepResult message in Cucumber's message protocol
 * @see https://github.com/cucumber/common/tree/main/messages#readme
 *
 */
final class TestStepResult implements JsonSerializable
{
    use JsonEncodingTrait;

    /**
     * Construct the TestStepResult with all properties
     *
     */
    public function __construct(
        public readonly Duration $duration = new Duration(),
        public readonly ?string $message = null,
        public readonly TestStepResult\Status $status = TestStepResult\Status::UNKNOWN,
    ) {
    }

    /**
     * @throws SchemaViolationException
     *
     * @internal
     */
    public static function fromArray(array $arr): self
    {
        self::ensureDuration($arr);
        self::ensureMessage($arr);
        self::ensureStatus($arr);

        return new self(
            Duration::fromArray($arr['duration']),
            isset($arr['message']) ? (string) $arr['message'] : null,
            TestStepResult\Status::from((string) $arr['status']),
        );
    }

    /**
     * @psalm-assert array{duration: array} $arr
     */
    private static function ensureDuration(array $arr): void
    {
        if (!array_key_exists('duration', $arr)) {
            throw new SchemaViolationException('Property \'duration\' is required but was not found');
        }
        if (array_key_exists('duration', $arr) && !is_array($arr['duration'])) {
            throw new SchemaViolationException('Property \'duration\' was not array');
        }
    }

    /**
     * @psalm-assert array{message?: string|int|bool} $arr
     */
    private static function ensureMessage(array $arr): void
    {
        if (array_key_exists('message', $arr) && is_array($arr['message'])) {
            throw new SchemaViolationException('Property \'message\' was array');
        }
    }

    /**
     * @psalm-assert array{status: string|int|bool} $arr
     */
    private static function ensureStatus(array $arr): void
    {
        if (!array_key_exists('status', $arr)) {
            throw new SchemaViolationException('Property \'status\' is required but was not found');
        }
        if (array_key_exists('status', $arr) && is_array($arr['status'])) {
            throw new SchemaViolationException('Property \'status\' was array');
        }
    }
}
