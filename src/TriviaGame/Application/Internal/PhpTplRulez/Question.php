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

class Question implements PhpTplRuleInterface
{
    private array $allowableVars = [
                                    'no' => ['type' => 'int', 'min' => 1, 'max' => \PHP_INT_MAX], 
                                    'answers' => ['type' => 'SchrodtSven\TriviaGame\Type\StringClass']
    ];

    public function getRules(): array
    {
        return $this->allowableVars;
    }
}