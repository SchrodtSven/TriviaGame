<?php

declare(strict_types=1);
/**
 * Simple PHP template parser for tpls in alternative syntax
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package TriviaGame
 * @version 0.1
 * @since 2023-05-05
 */

namespace SchrodtSven\TriviaGame\Application\Internal;

use SchrodtSven\TriviaGame\Application\Internal\PhpTplRuleInterface;


class PhpTplParser
{
    private string $tplDir = 'src/TriviaGame/Application/Internal/PhpTpl/'; 

    private string $ruleNs = 'SchrodtSven\TriviaGame\Application\Internal\PhpTplRulez\\'; 

    private const TPL_SUFFIX = '.phtml';

    private array $props = ['lang' => 'en'];

    private ?PhpTplRuleInterface $rules = null;  

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

    public function injectRule(PhpTplRuleInterface $rules)
    {
        
        $this->rules = $rules;
    }

    public function loadRule(string $ruleName = 'GenericDoc')
    {
        $ruleClass = $this->ruleNs . $ruleName;
        $rules = new $ruleClass();
        $this->rules = $rules;
    }

    public function __set(string $name, mixed $value): void
    {
        if(!is_null($this->rules)) {
            if(!$this->doSanityCheck($name)) {
                throw new \Error('Rule violation:  REASON!');
            };
        }
        $this->props[$name] = $value;
    }

    //@FIXME - use ArrayClass & ArrayClass to check types, min, max , boundaries and other limitations
    private function doSanityCheck(string $name): bool
    {
        return in_array($name, $this->rules->getRules());
    }

    public function __get(string $name): mixed
    {
        return $this->props[$name] ?? null;
    }
}