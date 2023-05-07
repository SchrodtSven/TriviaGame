<?php


require_once 'src/TriviaGame/Autoload.php';
use SchrodtSven\TriviaGame\Type\ArrayClass;
use SchrodtSven\TriviaGame\Type\StringClass;
use SchrodtSven\TriviaGame\Application\Internal\PhpTplParser;
use SchrodtSven\TriviaGame\Application\Internal\CodeBuilder;
use SchrodtSven\TriviaGame\Application\Internal\ProviderBuilder;
use SchrodtSven\TriviaGame\Application\Internal\BuilderHelper;

$builder = new ProviderBuilder();
$helper = new BuilderHelper();
echo $res = $builder->rollTheDice(9999, false);