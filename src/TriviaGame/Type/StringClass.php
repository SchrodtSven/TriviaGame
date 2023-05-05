<?php

declare(strict_types=1);
/**
 * Strings as instances 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package TriviaGame
 * @version 0.1
 * @since 2023-05-05
 */
namespace SchrodtSven\TriviaGame\Type;

class StringClass implements \Stringable
{
    public function __construct(private string $content = '')
    {
        
    }
    public function prepend(string $plus): self
    {
        $this->content = $plus . $this->content;
        return $this;
    }

    public function append(string $plus): self
    {
        $this->content .= $plus;
        return $this;
    }

    public function quote(string $mark = "'"): self
    {
        $this->replace($mark, '//' . $mark);
        return $this->margin($mark);
    }

    public function embrace(string $start = '(')
    {
        $stop = match($start) {
            '[' => ']',
            '{' => '}',
            '<' => '>',
            default => ')'
        };
        return $this->margin($start, $stop);
    }

    /**
     * Generic function used by others
     */
    public function margin(string $start = "|", ?string $stop = null): self
    {
        if(is_null($stop)) $stop = $start;
        return $this->prepend($start)->append($stop);
    }

    public function split(string $sparator): ArrayClass
    {
        return new ArrayClass(explode($sparator, $this->content));
    }

    public function replace(string|array $find, string|array $replace): self
    {
        $this->content = str_replace($find, $replace, $this->content);
        return $this;
    }

    public function __toString(): string
    {
        return $this->content;
    }
}