<?php

declare(strict_types=1);
/**
 * Front controller class parsing HTTP routes and bootstrapping app
 * 
 *  - parse HTTP routes
 *  - dispatch to action controller {$controllername}Ctlr::{$action}Name() 
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
use  SchrodtSven\TriviaGame\Autoload;

class FrontController
{
    private const DEFAULT_CTLR = 'DefaultCtlr';
    private const DEFAULT_ACTN = 'defaultActn';

    public const ACTN_SUFFIX = 'Actn';
    public const CTLR_SUFFIX = 'Ctlr';

    public string $controller;
    public string $action;
    public ArrayClass $param;

    public const ACTN_CTRL_KEY = 'currentActionController';

    public function __construct(private Main $app)
    {

    }
    //@FIXME -> do real dispatch() and parse route externally
    public function parseRoute()
    {   
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
                    $this->controller = (ucfirst(strtolower($routeParts->shift()))) . self::CTLR_SUFFIX;
                    $this->action = self::DEFAULT_ACTN;
                    break;
            default:
                    $this->controller = (ucfirst(strtolower($routeParts->shift()))) . self::CTLR_SUFFIX;
                    $this->action = (strtolower($routeParts->shift())) . self::ACTN_SUFFIX;
                    $this->param = $routeParts->push($_REQUEST);

          }
          // attach current action controller to Repository 
          $this->app->getContainer()->create(
                        self::ACTN_CTRL_KEY,
                        $this->controller,
                        [$this->app->getContainer('SchrodtSven\TriviaGame\Application\Repository')]
                )     // and execute action
                ->invoke($this->app->getContainer()->get(self::ACTN_CTRL_KEY), 
                       $this->action
                );
     }
    
}