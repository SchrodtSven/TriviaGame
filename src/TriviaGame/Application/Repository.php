<?php

declare(strict_types=1);
/**
 * Repository (aka container)
 * 
 *  - injecting instances to other objects
 *  - getting instances
 *  - create instance
 *  - invoking methods
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package TriviaGame
 * @version 0.1
 * @since 2023-05-08
 */

namespace SchrodtSven\TriviaGame\Application;

use SchrodtSven\TriviaGame\Application\Config;
use SchrodtSven\TriviaGame\Type\StringClass;
use SchrodtSven\TriviaGame\Type\ArrayClass;

class Repository
{
    private static ?self $me = null;

    public const CURR_ACTN_CTLR_KEY = 'currentActionController';

    public const CTLR_NS_KEY = 'actnControllerNS';
    
    private function __construct(private ArrayClass $instances = new ArrayClass([]))
    {

    }

    public function create(string $name, string $className): self
    {
        if($name === self::CURR_ACTN_CTLR_KEY) {
            $className = $this->get(Config::class)->get(self::CTLR_NS_KEY) . $className;
        }
        $this->instances[$name] = new $className();
        return $this;
    }


    public function createSingleton(string $name, string $className): self
    {
        $this->instances[$name] = $className::getInstance();
        return $this;
    }

    public function get(string $name): ?object
    {
        return $this->instances[$name] ?? null;
    }

    public function set(object $instance): self
    {
        $this->instances[$instance::class] = $instance;
        return  $this;
    }


    public function invoke(object $instance, string $method, array $params = []): mixed
    {
        return $instance->$method($params);

    }

    public static function getInstance(): self
    {
        if(is_null(self::$me)) {
            self::$me = new self();
        }
        return self::$me;
    }

}