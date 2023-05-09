<?php
declare(strict_types=1);
/**
 * Game action controller class
 *
 *
 * @package P7TriviaGame
 * @author  Sven Schrodt <sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @license https://github.com/SchrodtSven/TriviaGame/blob/master/LICENSE.md
 * @version 0.1
 * @since 2023-05-08
 */

namespace SchrodtSven\TriviaGame\Application\Ctlr;
use SchrodtSven\TriviaGame\Application\ActionController;
use SchrodtSven\TriviaGame\Storage\SessionManager;
use SchrodtSven\TriviaGame\Application\Modl\SolverModl;

class GameCtlr extends ActionController
{ 

    public function solveActn(): void
    {
        echo __FUNCTION__ . ' invoked @' . date('Y-m-d H:is:');
        echo (new SolverModl($this->getSessionManager()->get('quoteList'), $this))->solve();
    }


    public function __call(string $name, array $arguments): mixed
    {
        echo $name . ' invoked @' . date('Y-m-d H:is:');   
        var_dump($this->container->keys());
        return true;
    }

}