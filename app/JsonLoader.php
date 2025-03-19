<?php

namespace app;

use DomainException;

class JsonLoader
{
    public static function load($url): array
    {
        $jsonData = file_get_contents($url);
        if ($jsonData === false) {
            throw new DomainException('Ошибка при получении содержимого по URL');
        }

        return json_decode($jsonData, true);
    }
}