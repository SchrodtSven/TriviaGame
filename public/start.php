<?php
declare(strict_types=1);
/**
 * Game start local tests
 *
 *
 * @package P7TriviaGame
 * @author  Sven Schrodt <sven@schrodt.club>
 * @link https://github.com/SchrodtSven/TriviaGame
 * @license https://github.com/SchrodtSven/TriviaGame/blob/master/LICENSE.md
 * @version 0.1
 * @since 2023-05-09
 */

//die(getcwd());
chdir('../');
require_once 'src/TriviaGame/Autoload.php';
use SchrodtSven\TriviaGame\Application\Main;
use SchrodtSven\TriviaGame\TYpe\StringClass;
use SchrodtSven\TriviaGame\Application\Repository;
use SchrodtSven\TriviaGame\Autoload;
use SchrodtSven\TriviaGame\Application\Internal\PhpTplParser;
use SchrodtSven\TriviaGame\Application\FrontController;
use SchrodtSven\TriviaGame\Application\Ctlr\GameCtlr;
use SchrodtSven\TriviaGame\Application\Internal\Environment;
use SchrodtSven\TriviaGame\Type\ArrayClass;
use SchrodtSven\TriviaGame\Type\DataInspector;
use SchrodtSven\TriviaGame\Storage\SessionManager;


use SchrodtSven\TriviaGame\Application\Api\StaticService;



$sessM = SessionManager::getInstance();
$docParser = new PhpTplParser('GameStartDoc');

$service = new StaticService();
$rand = 15;
$service->setAmountOfQuestions($rand)->draw();
$ql = $service->getQuestionList();
$sessM->set('quoteList', $ql);
$docParser->content = '';
$docParser->cssHref = '/style/main.css';
foreach($ql as $no => $item) {
    $question = new PhpTplParser('Question');
    $question->no = $no;
    $question->questionText = $item->getQuestionText();
    $question->answers = $item->getAnswers();
    $question->correctAnswer = $item->getCorrectAnswer();
    $docParser->content .= $question->render();
}

echo $docParser->render();