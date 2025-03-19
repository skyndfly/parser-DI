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
    if (php_sapi_name() !== 'cli') {
        throw new DomainException("Этот скрипт должен быть запущен из командной строки.");
    }
    $console = Console::getInstance();
    $console->handle();

    $parser = Parser::getInstance(JsonLoader::load($console->getUrl()));
    $parser->execute();
    CsvCreator::create($parser->getResult());

} catch (Throwable $e) {
    echo 'Ошибка: ' . $e->getMessage() . PHP_EOL;
}