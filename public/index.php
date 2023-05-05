<?php
require_once 'src/TriviaGame/Autoload.php';
use SchrodtSven\TriviaGame\Entity\Question;
use SchrodtSven\TriviaGame\Application\Config;
use SchrodtSven\TriviaGame\Communication\HttpClient;
//$c = new HttpClient();
//echo $c->get('https://opentdb.com/api_token.php?command=request');

//var_dump(json_decode(file_get_contents('src/TriviaGame/Application/cats.json')));die;
//$foo = new Config(2, 23);

//var_dump($foo);


for($i=50; $i<5000; $i+=50)
{
    $token = '6f908ada2e21ff882e2a95c49d3d066ffcee97b62b049d34b9e3529b52d6cc76';
    $file = sprintf('src/TriviaGame/PersistedData/json/dta_%u.json', $i);
   echo PHP_EOL;
    $cmd = sprintf('curl "https://opentdb.com/api.php?amount=%u&token=%s" > %s ', 50, $token, $file);
    exec($cmd);
    echo $cmd . PHP_EOL; 
   echo 'sleep(4) ...' . PHP_EOL;


}
// https://opentdb.com/api.php?amount=%u&token=%s