<?php

declare(strict_types=1);

/**
 * This code was auto-generated by {this script}[https://github.com/cucumber/messages/blob/main/codegen/codegen.rb]
 */

namespace Cucumber\Messages;

use JsonSerializable;
use Cucumber\Messages\DecodingException\SchemaViolationException;

/**
 * Represents the StepDefinitionPattern message in Cucumber's message protocol
 * @see https://github.com/cucumber/messages
 *
 */
final class StepDefinitionPattern implements JsonSerializable
{
    use JsonEncodingTrait;

    /**
     * Construct the StepDefinitionPattern with all properties
     *
     */
    public function __construct(
        public readonly string $source = '',
        public readonly StepDefinitionPattern\Type $type = StepDefinitionPattern\Type::CUCUMBER_EXPRESSION,
    ) {
    }

    /**
     * @throws SchemaViolationException
     *
     * @internal
     */
    public static function fromArray(array $arr): self
    {
        self::ensureSource($arr);
        self::ensureType($arr);

        return new self(
            (string) $arr['source'],
            StepDefinitionPattern\Type::from((string) $arr['type']),
        );
    }

    /**
     * @psalm-assert array{source: string|int|bool} $arr
     */
    private static function ensureSource(array $arr): void
    {
        if (!array_key_exists('source', $arr)) {
            throw new SchemaViolationException('Property \'source\' is required but was not found');
        }
        if (array_key_exists('source', $arr) && is_array($arr['source'])) {
            throw new SchemaViolationException('Property \'source\' was array');
        }
    }

    /**
     * @psalm-assert array{type: string|int|bool} $arr
     */
    private static function ensureType(array $arr): void
    {
        if (!array_key_exists('type', $arr)) {
            throw new SchemaViolationException('Property \'type\' is required but was not found');
        }
        if (array_key_exists('type', $arr) && is_array($arr['type'])) {
            throw new SchemaViolationException('Property \'type\' was array');
        }
    }
}
