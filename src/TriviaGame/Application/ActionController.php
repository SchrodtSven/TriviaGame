<?php

declare(strict_types=1);
/**
 * Abstract action controller class
 * 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package TriviaGame
 * @version 0.1
 * @since 2023-05-08
 */

namespace SchrodtSven\TriviaGame\Application;

use SchrodtSven\TriviaGame\Type\StringClass;
use SchrodtSven\TriviaGame\Type\ArrayClass;


abstract class ActionController
{
    
    public function __construct(protected Repository $container)
    {

    }

   
    
}