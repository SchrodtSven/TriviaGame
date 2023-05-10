<?php

declare(strict_types=1);
/**
 * Class holding usual code snippets as public constants to be used within *printf functions
 * or uses *printf itself
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package TriviaGame
 * @version 0.1
 * @since 2023-05-10
 */

namespace SchrodtSven\TriviaGame\Application\Internal;

class CodeSnippets
{
    public const ASSGN = '%s = %d';

    public const ASSGN_STRING = "%s = '%s'";

    public const ASSGN_INT = "%s = %u";

    public const ASSGN_FLOAT = "%s = %d";

    public const ARR_ASSGN_IDX_STRING = "[%u] => '%s'";

    public const ARR_ASSGN_STRING = "'%s' => '%s'";

    public const ARR_ASSGN_INT = "'%s' => %u";

    public const ARR_ASSGN_FLOAT = "'%s' => %d";

    public const ARR_SEPARATOR = ', ';

    public const ARR_SEPARATOR_NL =',' . PHP_EOL;
}