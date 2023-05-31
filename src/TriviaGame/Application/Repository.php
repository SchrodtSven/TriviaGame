<?php

declare(strict_types=1);
/**
 * Repository (aka “container”)
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
use SchrodtSven\TriviaGame\Autoload;

class Repository
{
    private static ?self $me = null;

    /**
     * Container key for current action controller instance
     * 
     * @var string
     */
    public const CURR_ACTN_CTLR_KEY = 'currentActionController';

    /**
     * Namespace for action controller
     * 
     * @var string
     */
    public const CTLR_NS_KEY = 'actnControllerNS';
    
    
    /**
     * Private constructor function
     * 
     * @see: self::getInstance()
     */
    private function __construct(private ArrayClass $instances = new ArrayClass([]))
    {

    }

    /**
     * Creating instance of $className and storing it with key $name in Repository
     *
     * @param string $name
     * @param string $classNmae
     * @return self
     */

    public function create(string $name, string $className): self
    {
        if($name === self::CURR_ACTN_CTLR_KEY) {
            $className = $this->get(Config::class)->get(self::CTLR_NS_KEY) . $className;
            $this->instances[$name] = new $className($this);
        } else {
            $this->instances[$name] = new $className();
        }
        return $this;
    }

    /**
     * Creating singleton instance of $className and storing it with key $name in Repository
     *
     * @param string $name
     * @param string $classNmae
     * @return self
     */
    public function createSingleton(string $name, string $className): self
    {
        $this->instances[$name] = $className::getInstance();
        return $this;
    }

    /**
     * Getting instance with key $name or null
     * 
     * @param string $name
     * @return ?object
     */
    public function get(string $name): ?object
    {
        return $this->instances[$name] ?? null;
    }

    /**
     * Storing object to Repo
     * 
     * @param onject $instance
     * @return self
     */
    public function set(object $instance): self
    {
        $this->instances[$instance::class] = $instance;
        return  $this;
    }

    /**
     * Getting information, if current Repository has memeber with key $name
     * 
     * @param string $name
     * @return bool
     */
    public function has(string $name): bool
    {
        return $this->instances->hasKey($name);
    }

    /**
     * Getting current keys
     * 
     * @return ArrayClass
     */
    public function keys(): ArrayClass
    {
        return $this->instances->getKeys();
    }

    /**
     * Invoking $mthod $method of $instance
     * 
     * @param object $instance
     * @param string $method
     * @param array $params
     */
    public function invoke(object $instance, string $method, array $params = []): mixed
    {
        return $instance->$method($params);

    }

    /**
     * Getting singleton instance of Repository
     * 
     * @return self
     */
    public static function getInstance(): self
    {
        if(is_null(self::$me)) {
            self::$me = new self();
        }
        return self::$me;
    }

}