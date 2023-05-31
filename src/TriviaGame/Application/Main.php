<?php
declare(strict_types=1);
/**
 * Class running application 
 *
 * @package P7TriviaGame
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @link https://github.com/SchrodtSven/TriviaGame
 * @license https://github.com/SchrodtSven/TriviaGame/blob/master/LICENSE.md
 * @since 2023-05-06
 */

namespace SchrodtSven\TriviaGame\Application;
use SchrodtSven\TriviaGame\Storage\SessionManager;
use SchrodtSven\TriviaGame\Application\FrontController;
use SchrodtSven\TriviaGame\Application\PhpTplParser;
use SchrodtSven\TriviaGame\Application\Internal\Environment;

class Main
{
    private const RUNTIME_MODES = ['live', 'static'];
    
    private string $currentMode = self::RUNTIME_MODES[1];

    public function __construct(private Repository $container)
    {
        
            $this->init();
            $this->run();
    }

    /**
     * Get the value of container
     */
    public function getContainer(): Repository
    {
        return $this->container;
    }

    /**
     * Set the value of container
     */
    public function setContainer(Repository $container): self
    {
        $this->container = $container;
        return $this;
    }

    private function init():void
    {
        $this->container->set(new Config());
        //$this->container->set($this);
        if(!Environment::runsOnCli()) { // in cli mode we do not http session handling ....
            $this->container->set(SessionManager::getInstance());
        } else { /// ... but we have to "emulate" http context for controller/view testing in cli mode
            $httpContext = Environment::getHttpContextArray();
            $_SERVER = array_merge($_SERVER, $httpContext);
        }
        $this->container->set(new FrontController($this));
    }

    private function run():void
    {
       $this->container->get(FrontController::class)->parseRoute();
    }
}