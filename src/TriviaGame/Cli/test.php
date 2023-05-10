#!/usr/bin/env php
<?php
    
use SchrodtSven\TriviaGame\Cli\StdIO;

system("stty -icanon -echo");
echo "input# ";

while ($c = fread(STDIN, 1)) {
    echo "Read from STDIN: " . $c . "\ninput# ";
}



$stdio = new StdIO();
$stdio->echo('Your input {quit with ENTER}');

$a = $stdio->readCharacterFromList();
$stdio->clear();
$stdio->echo('You entered: ' . $a);