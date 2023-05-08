<?php


require_once 'src/TriviaGame/Autoload.php';
use SchrodtSven\TriviaGame\Type\ArrayClass;
use SchrodtSven\TriviaGame\Type\StringClass;
use SchrodtSven\TriviaGame\Application\Internal\PhpTplParser;
use SchrodtSven\TriviaGame\Application\Internal\CodeBuilder;
use SchrodtSven\TriviaGame\Application\Internal\ProviderBuilder;
use SchrodtSven\TriviaGame\Application\Internal\BuilderHelper;

$fh = fopen('php://stderr', 'w');
var_dump($fh);
while(1) {
    $in = fread(STDIN,1000);
    var_dump($in);
	echo "[ECHO] $in";
	if (trim($in) === 'QUIT') {
	    exit(0);
	}
}




use SchrodtSven\TriviaGame\Application\FrontController;
use SchrodtSven\TriviaGame\Communication\HttpClient;
use SchrodtSven\TriviaGame\Application\Internal\PhpTplParser;

use SchrodtSven\TriviaGame\Storage\SessionManager;
use SchrodtSven\TriviaGame\Entity\Question;
use SchrodtSven\TriviaGame\Application\Config;

//$container =  Repository::getInstance();
//$tc = new FrontController();
//$container->set($tc);
//(new FrontController())->parseRoute();
//$parser = new PhpTplParser('question');