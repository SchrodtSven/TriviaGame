<?php
declare(strict_types=1);
/**
 * Class helping using streams <stdin, stdout, stderr>
 * 
 *
 * @package P7TriviaGame
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @link https://github.com/SchrodtSven/TriviaGame
 * @license https://github.com/SchrodtSven/TriviaGame/blob/master/LICENSE.md
 * @since 2023-05-09
 */

namespace SchrodtSven\TriviaGame\Cli;

class StdIO
{
    public function read(int $maxLength = 1000): string
    {
        return fread(STDIN,1);
    }

    public function readCharacterFromList(array $allowed = ['a', 'b', 'c', 'd', 'A', 'B', 'C', 'D']): string
    {
        system("stty -icanon -echo"); //set up terminal options - no LF needed -do not echo back
        $a = '';
        while(!in_array($a, $allowed))
            $a = fread(STDIN,1);
        return $a;
    }


    

    public function clear(): self
    {
        system('clear');
        return $this;
    }

    public function echo(string $content): self
    {
        echo $content;
        return $this;
    }
}