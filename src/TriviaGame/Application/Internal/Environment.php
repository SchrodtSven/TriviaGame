<?php

declare(strict_types=1);
/**
 * Entity class for questions
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package TriviaGame
 * @version 0.1
 * @since 2023-05-04
 */

namespace SchrodtSven\TriviaGame\Application\Internal;
use SchrodtSven\TriviaGame\Autoload;

class Environment
{
    public static function runsOnCli(): bool
    {
        return (php_sapi_name() === 'cli');
    }

    public static function getHttpContextArray(): array
    {
        $floated = rand(1,100) / rand(120, 1000);   
        $tmp = require Autoload::MOCK_HTTP_CFG;
        foreach($tmp as &$item) {
            $item = str_replace(
                                ['{{SERVER_HOST}}', '{{USER_NAME}}', '{{REMOTE_PORT}}', '{{ROUTE}}', '{{SESS_ID}}', '{{TSUFX}}', '{{TIME}}'], 
                                ['marvell.schrodt.club', 'Captain_Future', '666','/foo/Bar/id/2342/', md5(date('Ymd..-His')), $floated, time() ],
                                (string) $item);
        }
        return $tmp;
    }
}