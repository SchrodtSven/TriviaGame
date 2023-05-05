<?php

declare(strict_types=1);
/**
 * Front controller class parsing HTTP routes and bootstrapping app
 * 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package TriviaGame
 * @version 0.1
 * @since 2023-05-05
 */

namespace SchrodtSven\TriviaGame\Application;

use SchrodtSven\TriviaGame\Type\StringClass;
use SchrodtSven\TriviaGame\Type\ArrayClass;

class FrontController
{
    private const DEFAULT_CTLR = 'DefaultCtlr';
    private const DEFAULT_ACTN = 'defaultActn';

    public string $controller;
    public string $action;
    public ArrayClass $param;

    public function parseRoute()
    {
        var_dump(getcwd());
        $tmp = (isset( $_SERVER['QUERY_STRING'])) 
        ? (new  StringClass($_SERVER['REQUEST_URI']))->replace('?' . $_SERVER['QUERY_STRING'], '')
        : new  StringClass($_SERVER['REQUEST_URI']);

        $routeParts = $tmp->split('/')->unsetEmptyAtMargins();
        
          switch(count($routeParts)) {

            case 0: 
                    $this->controller = self::DEFAULT_CTLR;
                    $this->action = self::DEFAULT_ACTN;
                    break;
            
            case 1: 
                    $this->controller = $routeParts->shift().'Ctlr';
                    $this->action = self::DEFAULT_CTLR;
                    break;
            default:
                    $this->controller = $routeParts->shift().'Ctlr';
                    $this->action = $routeParts->shift().'Actn';
                    $this->param = $routeParts->push($_REQUEST);

          }
          
          


           \var_dump($this);
    }
    
}