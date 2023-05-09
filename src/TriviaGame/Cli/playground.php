#!/usr/bin/env php
<?php
declare(strict_types=1);
/**
 * Tewmp. playground testing on cli
 *
 * @package P7TriviaGame
 * @author  Sven Schrodt <sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @license https://github.com/SchrodtSven/TriviaGame/blob/master/LICENSE.md
 * @version 0.1
 * @since 2023-05-09
 */

//die(getcwd());
//chdir('../');
require_once 'src/TriviaGame/Autoload.php';
use SchrodtSven\TriviaGame\Cli\StdIO;
use SchrodtSven\TriviaGame\Cli\Game;

$game = new Game();
