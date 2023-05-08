<?php
declare(strict_types=1);
/**
 * Mock data -> "emulating" HTTP context for cli
 *
 *
 * @package P7TriviaGame
 * @author  Sven Schrodt <sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @license https://github.com/SchrodtSven/TriviaGame/blob/master/LICENSE.md
 * @version 0.1
 * @since 2023-05-08
 */

return [ //FIXME -> generate randomized data
    'DOCUMENT_ROOT' => '/Users/svenschrodt/projects/TriviaGame/public', 
    'REMOTE_ADDR' => '::1', 
    'REMOTE_PORT' => '53367', 
    'SERVER_SOFTWARE' => 'PHP 8.2.5 Development Server', 
    'SERVER_PROTOCOL' => 'HTTP/1.1', 
    'SERVER_NAME' => 'localhost', 
    'SERVER_PORT' => '8080', 
    'REQUEST_URI' => '/game/solve', 
    'REQUEST_METHOD' => 'GET', 
    'SCRIPT_NAME' => 'bootstrap.php', 
    'SCRIPT_FILENAME' => 'router.php', 
    'PHP_SELF' => '/game/solve', 
    'HTTP_HOST' => 'localhost:8080', 
    'HTTP_USER_AGENT' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:109.0) Gecko/20100101 Firefox/112.0', 
    'HTTP_ACCEPT' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8', 
    'HTTP_ACCEPT_LANGUAGE' => 'de,en-US;q=0.7,en;q=0.3', 
    'HTTP_ACCEPT_ENCODING' => 'gzip, deflate, br', 
    'HTTP_CONNECTION' => 'keep-alive', 
    'HTTP_COOKIE' => 'PHPSESSID=vh1b3r0c2iv85fkuo2ba4dbmsv', 
    'HTTP_UPGRADE_INSECURE_REQUESTS' => '1', 
    'HTTP_SEC_FETCH_DEST' => 'document', 
    'HTTP_SEC_FETCH_MODE' => 'navigate', 
    'HTTP_SEC_FETCH_SITE' => 'cross-site', 
    'REQUEST_TIME_FLOAT' => '1683547101.0604', 
    'REQUEST_TIME' => '1683547101'
];