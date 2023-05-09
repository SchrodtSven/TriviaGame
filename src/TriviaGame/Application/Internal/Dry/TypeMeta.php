<?php

declare(strict_types=1);
/**
 * Trait getting / matching meta data for types
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package TriviaGame
 * @version 0.1
 * @since 2023-05-04
 */

namespace SchrodtSven\TriviaGame\Application\Internal\Dry;

trait TypeMeta
{
    public function matchTypeFromValue(mixed $value): string
    {
        return match(gettype($value)) {
            'integer' => 'int',
            'double' => 'float',
            'boolean' => 'bool',
            default => gettype($value)
        };
    }
}