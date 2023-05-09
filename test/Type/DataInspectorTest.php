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

class DataInspectorTest extends CustomTestCase

{
    /**
     * @dataProvider dataInspectorProvider
     */
    public function testBasix(mixed $value, string $type): void
    {
        $inspector = new DataInspector($value);
        $this->assertSame($type, $inspector->getDatum()->getType());
    }

    

    public function splitJoinProvider(): array
    {
        return require 'src/TriviaGame/MockData/SundayIsNotRaw/splitData.php';
    }

    public function dataInspectorProvider(): array
    {
        return $this->getDataForDataProvider('dataInspector');
    }
    
}