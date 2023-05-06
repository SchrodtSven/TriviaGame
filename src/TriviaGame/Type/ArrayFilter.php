<?php

declare(strict_types=1);
/**
 * Class for filtering operations on arrays
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package TriviaGame
 * @version 0.1
 * @since 2023-05-05
 */

namespace SchrodtSven\TriviaGame\Type;
use SchrodtSven\TriviaGame\Type\StringClass;
use SchrodtSven\TriviaGame\Type\ArrayClass;


class ArrayFilter
{
    private ArrayClass $filtered;
    
    public function __construct(private ArrayClass $original, private string $subject)
    {
        
    }

    public function in(array $values): self
    {
        $subject = $this->subject;
        $this->filtered = new ArrayClass(
            array_filter(
                $this->original->getAsArray(), 
                function($item) use($values, $subject) {
                    if(in_array($item[$subject], $values)) return true;
                }
            )
        );
        return $this;
    }

    private function genericFilter(array $values, \callable $callback): self
    {
        $subject = $this->subject;
        $this->filtered = new ArrayClass(
            array_filter(
                $this->original->getAsArray(), 
                function($item) use($values, $subject, $callback) {
                    $callback($item);
                }
            )
        );
        return $this;
    }


    /**
     * Get the value of filtered
     *
     * @return ArrayClass
     */
    public function getFiltered(): ArrayClass
    {
        return $this->filtered;
    }

    /**
     * Set the value of filtered
     *
     * @param ArrayClass $filtered
     *
     * @return self
     */
    public function setFiltered(ArrayClass $filtered): self
    {
        $this->filtered = $filtered;

        return $this;
    }
}