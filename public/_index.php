<?php

require_once 'src/TriviaGame/Autoload.php';
use SchrodtSven\TriviaGame\Entity\Question;
use SchrodtSven\TriviaGame\Application\Config;
use SchrodtSven\TriviaGame\Application\FrontController;
use SchrodtSven\TriviaGame\Communication\HttpClient;
use SchrodtSven\TriviaGame\Application\Internal\PhpTplParser;

use SchrodtSven\TriviaGame\Storage\SessionManager;

$sess = SessionManager::getInstance();
$tc = new FrontController();
//(new FrontController())->parseRoute();
$parser = new PhpTplParser('question');
$parser->questionText = 'Welches Märchen ist nicht von den Grimm Brüdern?';
$parser->answers = (['Hans im Glück', 'Dornröschen', 'Suppenkasper', 'Froschkönig']);
$parser->no =23;
$cont = $parser->render();

$parser = new PhpTplParser();
$parser->content = $cont;
//file_get_contents('src/TriviaGame/Application/Internal/PhpTpl/question.phtml');





$parser->title = 'Test';
$parser->lang = 'en';
$parser->cssHref = 'style/main.css'; 
$parser->questionText = 'Welches Märchen ist nicht von den Grimm Brüdern?';
$parser->answers = (['Hans im Glück', 'Dornröschen', 'Suppenkasper', 'Froschkönig']);
echo $parser->render();