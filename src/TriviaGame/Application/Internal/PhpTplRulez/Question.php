<?php

declare(strict_types=1);
/**
 * Ruleset for template Question.phtml
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package TriviaGame
 * @version 0.1
 * @since 2023-05-08
 */

 namespace SchrodtSven\TriviaGame\Application\Internal\PhpTplRulez;
use SchrodtSven\TriviaGame\Application\Internal\PhpTplRuleInterface;

class GenericDoc implements PhpTplRuleInterface
{
    private array $allowableVars = [
                                    'no' => ['int'], 
                                    'answers' => ['SchrodtSven\TriviaGame\Type\StringClass']
    ];

    public function getRules(): array
    {
        return $this->allowableVars;
    }
}