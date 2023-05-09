<?php
declare(strict_types=1);
/**
 * Main app for playing in text mode on a shell
 * 
 *
 * @package P7TriviaGame
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @link https://github.com/SchrodtSven/TriviaGame
 * @license https://github.com/SchrodtSven/TriviaGame/blob/master/LICENSE.md
 * @since 2023-05-09
 */

namespace SchrodtSven\TriviaGame\Cli;
use SchrodtSven\TriviaGame\Entity\Question;
use SchrodtSven\TriviaGame\Type\StringClass;
use SchrodtSven\TriviaGame\Type\ArrayClass;
use SchrodtSven\TriviaGame\Application\Api\StaticService;

class Game
{
    private ArrayClass $questionList;
    private stdIO $stdio;
    
    protected array $map = ['A', 'B', 'C', 'D'];

    public function __construct(int $amount = 10)
    {
        $this->stdio = new StdIO();
        $this->stdio->clear();
        $this->questionList = (new StaticService)->setAmountOfQuestions($amount)->draw()->getQuestionList();
        $this->questionList->shuffle();
       // var_dump($this->questionList);
        $this->showQuestion($this->questionList[0]);        
    }

    
    public function showQuestion(Question $question)
    {
        printf('** %s           **%s', $question->getQuestionText(), PHP_EOL);
        printf('      category: %s - level: %s%s', $question->getCategory(), $question->getDifficulty(), PHP_EOL);
        // we want to shuffle only once!!!!
        $answers = $question->getAnswers();
        foreach($answers as $no => $text)
        printf('  %s - %s%s', $this->map[$no], $text, PHP_EOL);
        $answer = $this->stdio->readCharacterFromList();
        $a = strtoupper($answer);
        
        //$this->stdio->clear();
        //var_dump(array_flip($this->map));
        $value = $answers[array_flip($this->map)[$a]];
        $question->setGivenAnswer($value);
        printf('you said: %s - %s %s', $a, $value, PHP_EOL);
        var_dump($question);
    }
}