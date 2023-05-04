<?php
require_once 'src/TriviaGame/Autoload.php';
use SchrodtSven\TriviaGame\Entity\Question;
use SchrodtSven\TriviaGame\Application\Config;
use SchrodtSven\TriviaGame\Communication\HttpClient;
//$c = new HttpClient();
//echo $c->get('https://opentdb.com/api_token.php?command=request');

$foo = new Config(2, 23);

//var_dump($foo);

// https://opentdb.com/api.php?amount=%u&token=%s