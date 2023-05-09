#!/usr/bin/env php
<?php
system("stty -icanon");
echo "input# ";
while ($c = fread(STDIN, 1)) {
    echo "Read from STDIN: " . $c . "\ninput# ";
}



$stdio = new StdIO();
$stdio->echo('Your input {quit with ENTER}');

$a = $stdio->readCharacterFromList();
$stdio->clear();
$stdio->echo('You entered: ' . $a);