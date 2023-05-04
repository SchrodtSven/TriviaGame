<?php
declare(strict_types=1);
/**
 * Configuration class
 *
 *
 * @package P7TriviaGame
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @since 2023-05-04
 * @link https://github.com/SchrodtSven/TriviaGame
 * @license https://github.com/SchrodtSven/TriviaGame/blob/master/LICENSE.md
 */

namespace SchrodtSven\TriviaGame\Application;

class Config
{
    private string $baseUri = 'https://opentdb.com/api.php?amount=%u';

    private string $tokenSuffix = '&token=%s';

    private string $retrieveTokenUri = 'https://opentdb.com/api_token.php?command=request';

    private string $resetTokenUri = 'https://opentdb.com/api_token.php?command=reset&token=%s';

    public function __construct(int $a, int $b)
    {
        for($i=$a; $i<$b+1;$i++) 
        {
            echo sprintf($this->baseUri, $i) . PHP_EOL;
        }
    }
}