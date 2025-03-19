<?php
require_once 'app/Parser.php';
require_once 'app/Console.php';
require_once 'app/JsonLoader.php';
require_once 'app/CsvCreator.php';

use app\Parser;
use app\Console;
use app\JsonLoader;
use app\CsvCreator;


try {
    $console = Console::getInstance();
    $console->handle();

    $data = JsonLoader::load($console->getUrl());
    $parser = Parser::getInstance($data);
    $parser->execute();
    CsvCreator::create($parser->getResult());

} catch (Throwable $e) {
    echo 'Ошибка' . $e->getMessage();
}