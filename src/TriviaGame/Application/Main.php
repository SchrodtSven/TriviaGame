<?php
declare(strict_types=1);
/**
 * Class running application and starting bootstrapping
 *
 * @package P7TriviaGame
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @link https://github.com/SchrodtSven/TriviaGame
 * @license https://github.com/SchrodtSven/TriviaGame/blob/master/LICENSE.md
 * @since 2023-05-06
 */

namespace SchrodtSven\TriviaGame\Application;

class Main
{
    private const RUNT_TIME_MODES = ['live', 'static'];
    
    private string $currentMode = self::RUNT_TIME_MODES[1];


}