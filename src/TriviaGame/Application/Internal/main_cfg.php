<?php
declare(strict_types=1);
/**
 * Main configuration
 *
 *
 * @package P7TriviaGame
 * @author  Sven Schrodt <sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @license https://github.com/SchrodtSven/TriviaGame/blob/master/LICENSE.md
 * @version 0.1
 * @since 2023-05-08
 */


return [
    'baseUri' =>'https://opentdb.com/api.php?amount=%u',
    'tokenSuffix' =>'token=%s',
    'categorySuffix' => '?category=%u',
    'retrieveTokenUri' =>'https://opentdb.com/api_token.php?command=request',
    'resetTokenUri' =>'https://opentdb.com/api_token.php?command=reset&token=%s',
    'actnControllerNS' =>'\SchrodtSven\TriviaGame\Application\Ctlr\\', 
    'actnControllerDir' =>'src/TriviaGame/Application/Ctlr/', 
    'retrieveCategoriesUri' => 'https://opentdb.com/api_category.php',
    'stats' => 'https://opentdb.com/api_count_global.php'


];