<?php

declare(strict_types=1);
/**
 * Custom test case class inherits from PHPUnit\Framework\TestCase
 * 
 * - adding methods for dataProvider usage
 * 
 * @author Sven Schrodt<sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @package P8
 * @version 0.1
 * @since 2023-05-05
 */


namespace SchrodtSven\TriviaGame\Application\Internal;
use SchrodtSven\TriviaGame\MockData\Repository;
use PHPUnit\Framework\TestCase;


class CustomTestCase extends TestCase
{
    public const MOCK_DIR = 'src/TriviaGame/MockData/SundayIsNotRaw/';

    public function getDataForDataProvider(string $providerName): array
    {
        return require self::MOCK_DIR . $providerName . '.php';
    }
}