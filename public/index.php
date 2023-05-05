<pre><?php

require_once 'src/TriviaGame/Autoload.php';
use SchrodtSven\TriviaGame\Entity\Question;
use SchrodtSven\TriviaGame\Application\Config;
use SchrodtSven\TriviaGame\Application\FrontController;
use SchrodtSven\TriviaGame\Communication\HttpClient;

//var_dump($_SERVER);
var_dump(getcwd());
(new FrontController())->parseRoute();

