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

namespace SchrodtSven\TriviaGame\Entity;

class Question
{
    
    private string $category; 
    private string $type; 
    private string $difficulty; 
    private string $question; 
    private string $correctAnswer; 
    private array $incorrectAnswers; 


    /**
     * Creating instance of question from data array resulting from parsed JSON
     * output of opentdb API
     * 
     * @param array
     * @return self
     */
    public static function createFromValues(array $data): self
    {

        $tmp = new self();
        foreach ($data as $name => $value) {
            switch($name) {
                case 'category' :
                        $tmp->category = $value;
                        break;
                case 'type' :
                        $tmp->type = $value;
                        break;
                case 'difficulty' :
                        $tmp->difficulty = $value;
                        break;
                case 'question' :
                        $tmp->question = html_entity_decode($value);
                        break;
                case 'incorrect_answers' :
                        $tmp->incorrectAnswers = $value;
                        array_walk($tmp->incorrectAnswers, function(&$item) {
                            $item = html_entity_decode($item);
                        });
                        break;
                case 'correct_answer' :
                        $tmp->correctAnswer = html_entity_decode($value);
                        break;
            }
        }
        return $tmp;
    }

    /**
     * Merging incorrect answer(s) with correct one - shuffling order to obfuscate
     * & returning it
     * 
     * @return array
     */
    public function getAnswers(): array
    {
        $tmp = array_merge([$this->correctAnswer], $this->incorrectAnswers);
        shuffle($tmp);
        return $tmp;
    }

    /**
     * Getting text of current question
     * 
     * @return string
     */
    public function getQuestionText(): string
    {
        return $this->question;
    }

     /**
     * Getting text of correct answer
     * 
     * @return string
     */
    public function getAnswerText(): string
    {
        return $this->correctAnswer;
    }
}