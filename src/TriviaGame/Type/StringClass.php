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


    public function quoteTypographic(): self
    {
        $this->content = "“{$this->content}”";
        return $this;
    }

    public function trim(): self
    {
        $this->content = trim($this->content);
        return $this;
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

    /**
     * Converting current content to upper case
     * 
     * @return self
     */
    public function toUpper(): self
    {
        $this->content = \strtoupper($this->content);
        return $this;
    }

    /**
     * Converting current content to lower case
     * 
     * @return self
     */
    public function toLower(): self
    {
        $this->content = \strtolower($this->content);
        return $this;
    }

    /**
     * Checking if current content ends with $end
     * 
     * @param string $end
     * @return self 
     */
    public function ends(string $end): bool
    {
        return \str_ends_with($this->content, $end);
    }

    /**
     * Checking if current content begins with $begin
     * 
     * @param string $begin
     * @return self 
     */
    public function begins(string $begin): bool
    {
        return \str_starts_with($this->content, $begin);
    }

    /**
     * Checking if current content contains $needle
     * 
     * @param string $needle
     * @return self
     */
    public function contains(string $needle): bool
    {
        return \str_contains($this->content, $needle);
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