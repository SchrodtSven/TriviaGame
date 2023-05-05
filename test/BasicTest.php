<?php

declare(strict_types=1);
/**
 * Testing if PHPUnit testing worx 
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package P8
 * @version 0.1
 * @since 2023-05-05
 */

use PHPUnit\Framework\TestCase;

class BasicTest extends TestCase

{
    
    public function testBasix(): void
    {
        $this->assertSame(2 + 2, 4);
    }

    
}