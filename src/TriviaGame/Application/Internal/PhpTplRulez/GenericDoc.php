<?php

declare(strict_types=1);
/**
 * Simple PHP template parser for tpls in alternative syntax
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package TriviaGame
 * @version 0.1
 * @since 2023-05-08
 */
//        SchrodtSven\TriviaGame\Application\Internal\PhpTplRulz\GenericDoc
namespace SchrodtSven\TriviaGame\Application\Internal\PhpTplRulez;
use SchrodtSven\TriviaGame\Application\Internal\PhpTplRuleInterface;
//                          PhpTplRuleInterface
class GenericDoc implements PhpTplRuleInterface
{
    private array $allowableVars = [
                                    'title', 'content', 'styleHref', 'jsExt',
                                    // just temp. testing
                                    'list', 'current'
    ];

    public function getRules(): array
    {
        return $this->allowableVars;
    }
}