<?php

declare(strict_types=1);
/**
 * Simple template parser using PHP native *printf functions
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package TriviaGame
 * @version 0.1
 * @since %s
 */

namespace SchrodtSven\TriviaGame\Application\Internal;

class CodeBuilder
{
    private string $tplDir = 'src/TriviaGame/Application/Internal/Tpl/';

    private const TPL_SUFFIX = '.tpl';
    
    public function __construct(private string $tplName = 'GenericCodeDocBlock')
    {
        
    }

    public function generic(string $code, string $doc = '', string $date = ''): string
    {
        if($date === '') $date = date('y-m-d');
        return $this->render([$doc, $date, $code]);
    }

    private function getTpl(): string
    {
        return file_get_contents($this->tplDir . $this->tplName . self::TPL_SUFFIX);
    }

    public function render(array $args): string
    {
        //var_dump(func_get_args());        var_dump($args);die;
        return vsprintf($this->getTpl(), $args);
    }
}