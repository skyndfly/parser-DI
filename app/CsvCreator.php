<?php

namespace app;

class CsvCreator
{
    public const string CSV_FILENAME = 'table.csv';
    public static function create(array $data): void
    {
        if ($file = fopen(self::CSV_FILENAME, 'w') ) {
            foreach ($data as $row){
                fputcsv($file, $row);
            }
            fclose($file);
        }
    }
}