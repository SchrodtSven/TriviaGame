<?php

declare(strict_types=1);
/**
 * Strings as instances 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package TriviaGame
 * @version 0.1
 * @since 2023-05-05
 */

namespace SchrodtSven\TriviaGame\Application\Internal;

class PhpTplParser
{
    private string $tplDir = 'src/TriviaGame/Application/Internal/PhpTpl/'; 

    private const TPL_SUFFIX = '.phtml';

    private array $props = ['lang' => 'en'];



    public function __construct(private string $tplName = 'GenericDoc')
    {
        
    }

    public function render(): string
    {
        $tpl = $this->tplDir . $this->tplName . self::TPL_SUFFIX;
        \ob_start();
        require $tpl;
        $out =  \ob_get_contents();
        \ob_end_clean();

        return $out;
    }

    public function __set(string $name, mixed $value): void
    {
        $this->props[$name] = $value;
    }

    public function __get(string $name): mixed
    {
        return $this->props[$name] ?? null;
    }
}