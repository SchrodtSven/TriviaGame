<?php
declare(strict_types=1);
/**
 * Game action controller class
 *
 *
 * @package P7TriviaGame
 * @author  Sven Schrodt <sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @license https://github.com/SchrodtSven/TriviaGame/blob/master/LICENSE.md
 * @version 0.1
 * @since 2023-05-08
 */

namespace SchrodtSven\TriviaGame\Application\Modl;
use SchrodtSven\TriviaGame\Application\ActionController;
use SchrodtSven\TriviaGame\Entity\Question;
use SchrodtSven\TriviaGame\Type\StringClass;
use SchrodtSven\TriviaGame\Type\ArrayClass;

class SolverModl
{ 

    public function __construct(
                                private ArrayClass $questionList,
                                private ActionController $actionController
                                )
    {
        
    }

    public function solve()
    {
        //@FIXME 
        ob_start();
        echo '<pre><code>';
       
       /* 
       for($i=0;$i<10;$i++) {
            $key = 'answer_'.$i;
            var_dump($this->actionController->getPostByKey($key));
        }
        
        
        
        die;
        */
        foreach($this->questionList as $index => $value) {
            $value->setGivenAnswer($this->actionController->getPostByKey('answer_'.$index));
            //echo $this->actionController->getPost()['answer_' . $index];
           // echo '   ';
            //echo 'answer_' . $index. PHP_EOL;

            echo sprintf('given %s:  -  correct:%s%s',
                          $value->getGivenAnswer(),
                          $value->getCorrectAnswer(),
                          PHP_EOL  
            );
        }
        $view = ob_get_contents();
        ob_end_clean();
        return $view;
    }
    
}