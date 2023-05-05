<?php

declare(strict_types=1);
/**
 * Class for instances representing error in context of file operations
 * 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package TriviaGame
 * @version 0.1
 * @since 2023-05-05
 */

namespace SchrodtSven\TriviaGame\Application\Internal;

class FileError extends \Error
{
    public const MESSAGE_CODE_MATCH = [
        404 => 'The file resource %s could not be found!'
    ];
    
    public function __construct(string $message = "", int $code = 0, ?\Throwable $previous = null)
    {
        $message = sprintf(self::MESSAGE_CODE_MATCH[$code], $message);
        parent::__construct($message, $code, $previous);
    }
}