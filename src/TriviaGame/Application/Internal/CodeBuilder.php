<?php

declare(strict_types=1);
/**
 * Simple class building source code parts (snippets...) using:
 * 
 * - PHP native *printf functions and 
 * - SchrodtSven\TriviaGame\Application\Internal\CodeSnippets
 * - simple templates with {{PLACE_HOLDERS}}
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package TriviaGame
 * @version 0.1
 * @since %s
 */

namespace SchrodtSven\TriviaGame\Application\Internal;

use ArrayObject;
use SchrodtSven\TriviaGame\Application\Internal\CodeSnippets;
use SchrodtSven\TriviaGame\Type\ArrayClass;
use SchrodtSven\TriviaGame\Type\StringClass;

class CodeBuilder
{
    private string $tplDir = 'src/TriviaGame/Application/Internal/Tpl/';

    private const TPL_SUFFIX = '.tpl';
    
    /**
     * Constructor function setting default template name
     */
    public function __construct(private string $tplName = 'GenericCodeDocBlock')
    {
        
    }


    public function getArrayAssignIndexString(ArrayClass $data): StringClass
    {
        
        $arr = new ArrayClass();
        $data->walk(function($value, $index) use($arr) {
            $arr->push(sprintf(
                                CodeSnippets::ARR_ASSGN_IDX_STRING,
                                $index, 
                                $value 
                             )
            );
        });

        return $arr->join(CodeSnippets::ARR_SEPARATOR_NL)->embrace('[')->append(';');
    }

    /**
     * Generates generic code block with DocBlock comment on top
     * 
     * @param string $code
     * @param string $doc
     * @param $date
     * @return string
     */
    public function generic(string $code, string $doc = '', string $date = ''): string
    {
        if($date === '') 
                         $date = date('y-m-d');
        return $this->render([$doc, $date, $code]);
    }

    /**
     * Getting relative path to current template
     * 
     * @return string
     */
    private function getTpl(): string
    {
        return file_get_contents($this->tplDir . $this->tplName . self::TPL_SUFFIX);
    }

    /**
     * Setting name of template to be used
     * 
     * @param string $name
     * @return string
     */
    private function setTplName(string $name): self
    {
        $this->tplName = $name;
        return $this;
    }

    /**
     * *printformatting current template with (variable length) $args
     * 
     * @param array $args
     * @return string
     */
    public function render(array $args): string
    {
        return vsprintf($this->getTpl(), $args);
    }
}