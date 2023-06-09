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
    private string $givenAnswer; 
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
                case 'incorrectAnswers' :
                        $tmp->incorrectAnswers = $value;
                        array_walk($tmp->incorrectAnswers, function(&$item) {
                            $item = html_entity_decode((string) $item);
                        });
                        break;
                case 'correctAnswer' :
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


    /**
     * Get the value of correctAnswer
     *
     * @return string
     */
    public function getCorrectAnswer(): string
    {
        return $this->correctAnswer;
    }

    /**
     * Get the value of givenAnswer
     *
     * @return string
     */
    public function getGivenAnswer(): string
    {
        return $this->givenAnswer;
    }

    /**
     * Set the value of givenAnswer
     *
     * @param string $givenAnswer
     *
     * @return self
     */
    public function setGivenAnswer(string $givenAnswer): self
    {
        $this->givenAnswer = $givenAnswer;

        return $this;
    }

    /**
     * Get the value of category
     *
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @param string $category
     *
     * @return self
     */
    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get the value of type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of difficulty
     *
     * @return string
     */
    public function getDifficulty(): string
    {
        return $this->difficulty;
    }

    /**
     * Set the value of difficulty
     *
     * @param string $difficulty
     *
     * @return self
     */
    public function setDifficulty(string $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }
}