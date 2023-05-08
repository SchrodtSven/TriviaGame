<?php
declare(strict_types=1);
/**
 * Configuration class
 *
 *
 * @package P7TriviaGame
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2023-05-04
 * @link https://github.com/SchrodtSven/TriviaGame
 * @license https://github.com/SchrodtSven/TriviaGame/blob/master/LICENSE.md
 */

namespace SchrodtSven\TriviaGame\Application;

use SchrodtSven\TriviaGame\Type\StringClass;
use SchrodtSven\TriviaGame\Type\ArrayClass;

class Config
{
    private ArrayClass $data;

    public function __construct()
    {
        $this->data = new ArrayClass(require_once \SchrodtSven\TriviaGame\Autoload::MAIN_CFG);
        var_dump($this);
    }

    public function set(string $name, mixed $data): self
    {
        $this->data[$name] = $data;
        return $this;
    }

    public function get(string $name): mixed
    {
        return $this->data[$name] ?? null;
        
    }
}