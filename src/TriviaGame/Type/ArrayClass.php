<?php

declare(strict_types=1);
/**
 * Arrays as instances 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package TriviaGame
 * @version 0.1
 * @since 2023-05-05
 */

namespace SchrodtSven\TriviaGame\Type;
use SchrodtSven\TriviaGame\Application\Internal\FileError;
use SchrodtSven\TriviaGame\Type\StringClass;
use SchrodtSven\TriviaGame\Type\ArrayFilter;

class ArrayClass implements \Iterator, \ArrayAccess, \Countable
{
    public function __construct(private array $content = [])
    {
        
    }

    // Implementing \ArrayAccess allowing array access to instances ([])
    public function offsetGet($offset): mixed
    {
        return $this->content[$offset] ?? null;
    }

    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->content[] = $value;
        } else {
            $this->content[$offset] = $value;
        }
    }

    public function offsetExists($offset): bool
    {
        return isset($this->content[$offset]);
    }

    public function offsetUnset($offset): void
    {
        unset($this->content[$offset]);
    }

    // The following functions implement interface \Iterator making it possible
    // to iterate container objects with foreach

    /**
     * Resetting pointer to first array element
     */
    public function rewind(): void
    {
        reset($this->content);
    }

    /**
     * Getting current element
     *
     */
    public function current(): mixed
    {
        return current($this->content);
    }

    /**
     * Getting key of current element
     * 
     * @return mixed
     */
    public function key(): mixed
    {
        return key($this->content);
    }

    /**
     * Forward internal array pointer
     * 
     * @return mixed|void
     */
    public function next(): void
    {
        next($this->content);
    }

    /**
     * Returning if current element is valid
     *
     * @return bool
     */
    public function valid(): bool
    {
        return ($this->current() !== false);
    }

    //Implementing \Countable

    public function count(): int
    {
        return count($this->content);
    }


    /**
     * Get the value of content
     * 
     * @return array
     */
    public function getContent(): array
    {
        return $this->content;
    }

    /**
     * Set the value of content
     * 
     * @param array
     * @return self
     */
    public function setContent(array $content): self
    {
        $this->content = $content;

        return $this;
    }

     /**
     * Alias for self::getContent()
     * 
     * @return array
     */
    public function getAsArray(): array
    {
        return $this->content;
    }


    /**
     * Creating new instance by reading content of $filename splitting each line to
     * an element of internal content array -> trimming data by default
     * 
     * @param string filename
     * @param bool autoTrim
     * @return self
     * 
     * @FIXME --> trimAll() exists!
     */
    public static function createFromFile(string $filename, bool $autoTrim = true): self
    {
        if(!\file_exists($filename)) {
            throw new FileError($filename, 404);
        }
        $tmp = new self(file($filename));
        if($autoTrim) {
            $tmp->walk(function(&$item) {
                $item = trim($item);
            });
        }
        return $tmp;
    }

    /**
     * Trimming all elements
     * 
     * @return self
     */
    public function trimAll(): self
    {
        $this->walk(function(&$item) {
            $item = trim($item);
        });
        return $this;
    }

    /**
     * Quoting each element with quote sign $mark
     * 
     * @param string $mark
     * @return self
     */
    public function quoteAll(string $mark ="'"): self
    {
        $this->walk(function(&$item) use($mark) {
            $item = (string) (new StringClass((string) $item))->quote($mark);
        });
        return $this;
    }


    /** 
     * Quoting if is_string || stringable
     * 
     * @FIXME!!!!
     * @return self 
     */
    public function quoteByType(): self
    {
        $this->walk(function(&$item) {
            if(!is_numeric($item))
                $item = (string) (new StringClass((string) $item))->quote();
        });
        return $this;
    }

    public function join(string $glue): StringClass
    {
        return new StringClass(implode($glue, $this->content));
    }

    /**
     * Unsetting elements with empty values
     * 
     * @return self
     */
    public function unsetEmptyAtMargins(): self
    {   
        $first = 0;
        $last = count($this)-1;
       
        if(empty($this->content[$first])) unset($this->content[$first]);
       
        if(empty($this->content[$last])) unset($this->content[$last]);
        return $this;
    }

    /**
     * Creating instance from JSON file
     * 
     * @param string $filenname
     * @return self
     */
    public static function createFromJsonFile(string $filename, bool $asArray=true): self
    {
        if(!\file_exists($filename)) {
            throw new FileError($filename, 404);
        }
        return new self(\json_decode(\file_get_contents($filename), $asArray));
    }

     /**
     * Adding $value to current array content as newest|last element 
     * 
     * @param mixed $value
     * @return self
     */
    public function push(mixed $value): self
    {
        array_push($this->content, $value);
        return $this;
    }


    /**
     * Popping last element from current array content and retuning it
     * 
     * @return mixed 
     */
    public function pop(): mixed
    {
        return array_pop($this->content);
    }

    /**
     * Shifting first element from current array content and returning it
     * 
     * @return mixed 
     */
    public function shift(): mixed
    {
        return array_shift($this->content);
    }

    /**
     * Adding $value to current array content as first element
     * 
     * @param mixed $value
     * @return self
     */
    public function unshift(mixed $value): self
    {
        array_unshift($this->content, $value);
        return $this;
    }

    /**
     * Removing duplicate values
     * 
     * @int $mode
     * @return self
     */
    public function removeDuplicates(int $mode = \SORT_REGULAR): self
    {
        $this->content = \array_values(\array_unique($this->content, $mode));
        return $this;
    }

    /**
     * Splitting values  keyed|indexed by $columnKey
     */
    public function splitColumn(int|string $columnKey, int|string|null $indexKey = null): self
    {
        //@FIXME -> error handling
        //);die;
        return new self(\array_column($this->content, $columnKey, $indexKey));
    }

    public function countValues(): self
    {
        return new self(\array_count_values($this->content));
    }

    public function getKeys(): self
    {
        return new self(array_keys($this->content)) ;
    }

    public function hasKey(string $name): bool
    {
        return array_key_exists($name, $this->content);
    }

    /**
     * Applying callback on every element
     * 
     * @param callable $callback 
     * @return self
     */
    public function walk(callable $callback): self
    {
        array_walk($this->content, $callback);
        return $this;
    }

    /**
     * Getting $num (existing) key(s) from current content
     * 
     * @param int $num
     * @return self
     */
    public function getRandomKey(int $num = 1): self
    {
        $r =  new \Random\Randomizer();
            return new self(
                $r->pickArrayKeys($this->content, $num)
            );
    }


    /**
     *  Getting random $num (existing) element(s) from current content
     *  
     * @param int $num
     * @reeturn self
     */   
    public function getRandomElement(int $num = 1): self
    {
            $tmp =  new self();
            if($num ===1) {
                return $tmp->push($this->content[$this->getRandomKey()]);
            } else {
                $tmp2 = $this->getRandomKey($num);
                for($i=0; $i < count($tmp2); $i++) {
                    $tmp->push($this->content[$i]);
                }

            return $tmp;
            }
    }

    public function getAssignmentList(): StringClass
    {
        return ($this->join((', ')))->embrace('[')->append(';');
    }

    public function sort(): self
    {
        \natsort($this->content);
        return $this;
    }
    
    public function shuffle(): self
    {
        \shuffle($this->content);
        return $this;
    }

    public function filterBy(string $subject): ArrayFilter
    {
        return new ArrayFilter($this, $subject);
    }
}