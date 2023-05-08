<?php

declare(strict_types=1);
/**
 * Entity class for questions
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package TriviaGame
 * @version 0.1
 * @since 2023-05-04
 */


namespace SchrodtSven\TriviaGame\Application\Internal;

class Environment
{
    public static function runsOnCli(): bool
    {
        return (php_sapi_name() === 'cli');
    }
}