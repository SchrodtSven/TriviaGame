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

namespace SchrodtSven\TriviaGame\Application\Internal;
//        PhpTplRuleInterface
interface PhpTplRuleInterface
{
    public function getRules(): array;
}