<?php

declare(strict_types=1);
/**
 * Session manager - abstracting from:
 *  - session* functions and
 * -  super global $_SESSION
 * 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package TriviaGame
 * @version 0.1
 * @since 2023-05-08
 */

namespace SchrodtSven\TriviaGame\Storage;

use Error;
use SchrodtSven\TriviaGame\Type\StringClass;
use SchrodtSven\TriviaGame\Type\ArrayClass;

class SessionManager
{
     /**
     * Static instance (or null, if unused) of Session
     *
     * @var Session | null
     */
    public static ?self $instance = null;

    /**
     * Private constructor function initializing session, private - only one instance to rule 'em all
     *
     * @see self::getInstance()
     */
    private function __construct()
    {
        session_start();
    }

    /**
     * Public getter for (singleton) instance of Session - one session to rule them all
     *
     * @return Session
     */
    public static function getInstance(): self
    {
        // Alive yet?
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Getter for key in Session
     *
     * @param string
     * @return mixed | null
     */
    public function get(string $key): mixed
    {
        return $_SESSION[$key] ?? null;
    }

    /**
     * Setter for key in Session
     *
     * @return Session
     */
    public function set(string $key, $value): self
    {
        $_SESSION[$key] = $value;
        return $this;
    }

    /**
     * Unsetter for key in Session
     *
     * @return Session
     */
    public function unset(string $key): self
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
        return $this;
    }

    /**
     * Discarding current session's state and restore previous
     *
     * @return Session
     */
    public function rollback(): self
    {
        session_abort();
        return $this;
    }

    /**
     * Interceptor to avoid instance from being cloned
     */
    public function __clone()
    {
          throw new Error(sprintf('Cloning is not allowed for %s',
                                    $this::class
        ));  
    }
}