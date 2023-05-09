<?php

declare(strict_types=1);
/**
 * Testing DataInspector
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package P8
 * @version 0.1
 * @since 2023-05-09
 */

use SchrodtSven\TriviaGame\Application\Internal\CustomTestCase;
use SchrodtSven\TriviaGame\Type\StringClass;
use SchrodtSven\TriviaGame\Type\ArrayClass;
use SchrodtSven\TriviaGame\Type\DataInspector;
use SchrodtSven\TriviaGame\Entity\Datum;
use SchrodtSven\TriviaGame\Application\Api\StaticService;


class StaticServiceTest extends CustomTestCase
{
    public function testBasix(): void
    {
        $service = new StaticService();
        $rand = rand(1,100);
        $service->setAmountOfQuestions($rand)->draw();
        $this->assertSame(count($service->getQuestionList()), $rand);
        foreach($service->getQuestionList() as $item) {
            $this->assertInstanceOf(SchrodtSven\TriviaGame\Entity\Question::class, $item);
        }
    }

}