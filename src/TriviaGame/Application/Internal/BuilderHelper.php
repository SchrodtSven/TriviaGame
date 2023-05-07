<?php
declare(strict_types=1);
/**
 * Class helping to generate assignment strings:
 * <code>
 *  = 2
 *  => 23.5
 *  => 'Hooh?'
 * etc.
 * <code>
 * 
 * - PHPUnit data providers & 
 * - P8UnitCheck data suppliers 
 * 
 * from random mock data using PHP native functions to test developed functionality
 *
 *
 * @package P7TriviaGame
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @link https://github.com/SchrodtSven/TriviaGame
 * @license https://github.com/SchrodtSven/TriviaGame/blob/master/LICENSE.md
 * @since 2023-05-06
 */

namespace SchrodtSven\TriviaGame\Application\Internal;

class BuilderHelper
{
    public function quote(string $value, string $mark ="'"): string
    {
        // if(strstr($value, $mark)!== false) {
        //     $value = str_replace($mark, "\\" . $mark, $value);
        // }
        return sprintf('%s%s%s', $mark, $value, $mark);
    }

    public function getAssignment(string $name, mixed $value): string
    {
        return sprintf(
                        '%s => %s', 
                        $this->quote($name),
                        $this->handleType($value)
        );
    }

    public function handleType(mixed $value): string
    {
        return match(gettype($value)) {

            'NULL' => 'null',
            'string' => $this->quote($value),
            'array' => $this->handleArray($value),
            
            default => (string) $value
        };
    }

    public function handleArray(array $values): string
    {
        array_walk($values, function(&$value, $key) {
            if(is_array($value)) $value = $this->handleArray($value);
            $assign = (is_string($key)) 
                                    ? sprintf('%s => %s', $this->quote($key), $this->handleType($value)) 
                                    : $this->handleType($value);
            $value = str_replace(
                                    ['\'[', ']\''],
                                    ['[', ']'], 
                                    $assign
            );
        });
        return sprintf('[%s]', implode(', ', $values));
    }


}