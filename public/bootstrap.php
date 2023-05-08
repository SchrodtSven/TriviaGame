<pre><?php

require_once 'src/TriviaGame/Autoload.php';
use SchrodtSven\TriviaGame\Entity\Question;
use SchrodtSven\TriviaGame\Application\Config;
use SchrodtSven\TriviaGame\Application\FrontController;
use SchrodtSven\TriviaGame\Communication\HttpClient;
use SchrodtSven\TriviaGame\Application\Main;
use SchrodtSven\TriviaGame\Application\Repository;

new Main(Repository::getInstance());
//(new FrontController())->parseRoute();

