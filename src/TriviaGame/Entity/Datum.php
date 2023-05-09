<?php

declare(strict_types=1);
/**
 * Entity class representing given data (structure) by:
 * 
 * - (optional) name
 * - value
 * - type / (optional) class hierarchy / interface implementation
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package TriviaGame
 * @version 0.1
 * @since 2023-05-09
 */

namespace SchrodtSven\TriviaGame\Entity;

class Datum
{
    
    private string $name; 
    private string $type; 
    private mixed $value; 
    private string $class;
    private array|false $interfaces = [];

    

    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of value
     *
     * @return mixed
     */
    public function getValue(): mixed
    {
        return $this->value;
    }

    /**
     * Set the value of value
     *
     * @param mixed $value
     *
     * @return self
     */
    public function setValue(mixed $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get the value of class
     *
     * @return string
     */
    public function getClass(): string
    {
        return $this->class;
    }

    /**
     * Set the value of class
     *
     * @param string $class
     *
     * @return self
     */
    public function setClass(string $class): self
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get the value of interfaces
     *
     * @return array
     */
    public function getInterfaces(): array
    {
        return $this->interfaces;
    }

    /**
     * Set the value of interfaces
     *
     * @param array $interfaces
     *
     * @return self
     */
    public function setInterfaces(array $interfaces): self
    {
        $this->interfaces = $interfaces;

        return $this;
    }
}