<?php

namespace app;

use DomainException;

class Console
{
    public const string BASE_URL = 'https://region.srr.ru/out25.php?_=1742369658929';
    public static ?self $instance = null;
    private string $url;

    private function __construct()
    {

    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function handle(): void
    {
        echo "Использовать стандартный URL (" . self::BASE_URL . ")? [Y/n]: ";
        $answer = trim(fgets(STDIN));
        if (mb_strtolower($answer) === 'y') {
            $this->url = self::BASE_URL;
            return;
        }
        echo "Введите новый URL: ";
        $url = trim(fgets(STDIN));
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new DomainException('Некорректный URL');
        }
        $this->url = $url;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}