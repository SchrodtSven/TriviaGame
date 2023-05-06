<?php
declare(strict_types=1);
/**
 * Class building data structures for 
 * 
 * - PHPUnit data providers & 
 * - P8UnitCheck data suppliers 
 * 
 * from random mock data using PHP native functions to test developed functionality
 *
 *
 * @package P7TriviaGame
 * @author  Sven Schrodt <sven@schrodt.club>
 * @version 0.1
 * @link https://github.com/SchrodtSven/TriviaGame
 * @license https://github.com/SchrodtSven/TriviaGame/blob/master/LICENSE.md
 * @since 2023-05-06
 */

namespace SchrodtSven\TriviaGame\Application\Internal;
use SchrodtSven\TriviaGame\Type\ArrayClass;
use SchrodtSven\TriviaGame\Type\StringClass;


class ProviderBuilder
{
    private array $separators = [
                                     '!', '"', '#', '$', '%', '&', '\'', '(', ')', 
                                     '*', '+', ',', '-', '.', '/', // 'cause of macAddr ':', 
                                     ';', '<', '=', '>', '?', '@'
    ];

    private array $mockSet;
    private int $eleCnt;
    private array $keys;
    private int $keyCnt;
    private BuilderHelper $helper;

    /**
     * Constructor function initializing mock data
     */
    public function __construct()
    {
        $this->mockSet = require_once 'src/TriviaGame/MockData/great_mock_list.php';
        $this->eleCnt = count($this->mockSet);
        $this->keys = array_keys($this->mockSet[0]);
        $this->keyCnt = count($this->keys);
        $this->helper = new BuilderHelper();
    }

    /**
     * Getting array with random numbers for:
     * 
     * - index in data set $mockSet to be used
     * - number of elements to chose from array
     * - array with keys to be used from element with index
     * - separator   
     * 
     * @param int $amount
     * @return array
     */
    public function roolTheDice(int $amount = 10): array
    {
        $result = [];
        
        for($i=0; $i < $amount; $i++) {
            $randEle = $this->getrandomInt(0, $this->eleCnt-1);
            $tmp = [];
            $numberOfElements = $this->getrandomInt(1, count($this->mockSet[$randEle])-1);
            for($j=0;$j < $numberOfElements; $j++) {
                $randKey = $this->getrandomInt(0, count($this->mockSet[$randEle])-1);
                $tmp[] = $this->mockSet[$randEle][$this->keys[$randKey]];
                
            }
            $sep = $this->separators[array_rand($this->separators)];
            
            $result[] = [
                'no' => $numberOfElements,
                'separator' => ($sep), 
                'joined' =>implode($sep, $tmp),
                'parts' => $tmp
            ];
            
         }
        return $result;
    }

    public function getrandomInt(int $min = 0, int $max = 100)
    {
        return  (new \Random\Randomizer())->getInt($min, $max);
    }
}