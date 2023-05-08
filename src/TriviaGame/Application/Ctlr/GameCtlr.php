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

class GameCtlr
{ 

    public function solveActn(): void
    {
        echo __FUNCTION__ . ' invoked @' . date('Y-m-d H:is:');
    }


    public function __call(string $name, array $arguments): mixed
    {
        echo $name . ' invoked @' . date('Y-m-d H:is:');   
        return true;
    }

}