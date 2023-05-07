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
use SchrodtSven\TriviaGame\Type\StringClass;

class StringClassTest extends TestCase

{
    
    public function testBasix(): void
    {
        $this->assertSame(2 + 2, 4);
    }

    /**
     * @dataProvider firstAppPrepProvider
     */
    public function testPrepAppBracing(string $original, 
                                       string $start,
                                       string $end,
                                       string $pre,
                                       string $app,
                                       string $braced,
                                       string $braced2,
                                       string $braced3,
                                       string $braced4
                                       ): void
    {
                //'$original', '*', '#', '*$original', '$original#', '($original)', '<$original>', '{{$original}}', '[$original]'
    
            $this->assertSame((string) (new StringClass($original)), $original);
            $this->assertSame((string) (new StringClass($original))->prepend($start), $start . $original);
            $this->assertSame((string) (new StringClass($original))->append($end), $original . $end);
            $this->assertSame((string) (new StringClass($original))->embrace(), "($original)");
            $this->assertSame((string) (new StringClass($original))->embrace('<'), "<$original>");
            $this->assertSame((string) (new StringClass($original))->embrace('{'), "{{$original}}");
            $this->assertSame((string) (new StringClass($original))->embrace('['), "[$original]");

    }

    /**
     * @dataProvider splitJoinProvider
     */
    public function testSplitJoin(int $no, string $separator, string $joined, array $parts): void
    {
        
        $foo = new StringClass($joined);
        $parts = $foo->split(($separator));
        
        foreach($parts as $key => $value) {
            $this->assertTrue($value === $parts[$key]);
        }
        $this->assertTrue((string) $parts->join($separator) === $joined);
        $this->assertTrue(count($foo->split($separator)) === $no);
        $this->assertTrue(count($parts) === $no);
    }

    public function firstAppPrepProvider(): array
    {
        return require_once 'src/TriviaGame/MockData/firstName_string_basic_test.php';
    }

    public function splitJoinProvider(): array
    {
        return require_once 'src/TriviaGame/MockData/SundayIsNotRaw/splitData.php';
    }
    
}