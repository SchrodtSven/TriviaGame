<?php

declare(strict_types=1);
/**
 * Testing Question entity
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package P8
 * @version 0.1
 * @since 2023-05-09
 */

use PHPUnit\Framework\TestCase;
use SchrodtSven\TriviaGame\Type\StringClass;
use SchrodtSven\TriviaGame\Type\ArrayClass;
use SchrodtSven\TriviaGame\Entity\Question;

class QuestionTest extends TestCase

{
     
    public function testBasix(): void
    {
        $dta = require 'src/TriviaGame/PersistedData/php/game_questions_2023-05-05.php';
        $this->assertInstanceOf(SchrodtSven\TriviaGame\Entity\Question::class, Question::createFromValues($dta[0]));
        
        $this->assertSame((string) 2*2, 4);
    }

    
}