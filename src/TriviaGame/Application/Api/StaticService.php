<?php
declare(strict_types=1);
/**
 * Service offering trivia game data with persisted data 
 * (from php data structures, json, xml, RDBMS)
 * 
 *
 * @package P7TriviaGame
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @link https://github.com/SchrodtSven/TriviaGame
 * @license https://github.com/SchrodtSven/TriviaGame/blob/master/LICENSE.md
 * @since 2023-05-06
 */

namespace SchrodtSven\TriviaGame\Application\Api;
use SchrodtSven\TriviaGame\Entity\Question;
use SchrodtSven\TriviaGame\Type\StringClass;
use SchrodtSven\TriviaGame\Type\ArrayClass;

class StaticService
{
   private const PHP_PERSISTENCE_LOCATION = 'src/TriviaGame/PersistedData/php/game_questions_2023-05-05.php';
 
   private const DATA_SOURCE_TYPE = 'php';

   private int $amountOfQuestions = 10;

   private int $categeory = 0; // all categories

   private ArrayClass $questionList;

   private ArrayClass $all;

   public function __construct()
   {
        $this->all = new ArrayClass(require self::PHP_PERSISTENCE_LOCATION);
        $this->questionList = new ArrayClass();
   } 

   public function draw(): self
   {
        $indices = $this->all->getRandomKey($this->amountOfQuestions);
        for($i = 0; $i < count($indices); $i++) {
        //    var_dump($i);
          $this->questionList->push(Question::createFromValues($this->all[$i]));
        }
        return $this;
        
   }

   public function getQuestionList(): ArrayClass
   {
        return $this->questionList;
   }


   /**
    * Get the value of amountOfQuestions
    *
    * @return int
    */
   public function getAmountOfQuestions(): int
   {
      return $this->amountOfQuestions;
   }

   /**
    * Set the value of amountOfQuestions
    *
    * @param int $amountOfQuestions
    *
    * @return self
    */
   public function setAmountOfQuestions(int $amountOfQuestions): self
   {
      $this->amountOfQuestions = $amountOfQuestions;

      return $this;
   }
}