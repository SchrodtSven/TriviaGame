<?php

declare(strict_types=1);
/**
 * Testing ArrayClass operations
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package P8
 * @version 0.1
 * @since 2023-05-05
 */

use PHPUnit\Framework\TestCase;
use SchrodtSven\TriviaGame\Type\StringClass;
use SchrodtSven\TriviaGame\Type\ArrayClass;

class ArrayClassTest extends TestCase

{
    /**
     * @dataProvider splitJoinProvider
     */
    public function testJoinAndBasix(int $no, string $separator, string $joined, array $parts): void
    {
        
        $joinedNew = (new ArrayClass($parts))->join($separator);

        $partList = new ArrayClass($parts);
        foreach($parts as $key => $value) {
            $this->assertTrue($partList[$key]=== $parts[$key]);
        }

        $this->assertTrue(count($partList) === count($parts));
        $this->assertTrue(count($partList) === $no);
        $this->assertSame((string) $joinedNew, $joined);
    }

    

    public function splitJoinProvider(): array
    {
        return require 'src/TriviaGame/MockData/SundayIsNotRaw/splitData.php';
    }

    
}