# Приложение парсинга позывных для сайта https://r6z.srr.ru/
[v1.0] 19.03.2025 - добавлен базовый функционал
## Зависимости
Для работы необходим установленный php8.3
## Запуск
Для запуска в терминале выполнить команду:
```bash
php index.php
```
Далее следовать подсказкам.
Работает как со стандартным URL так можно вести и новый.
Результат записывает в файл `table.csv` в корне проекта

## Доработка
 - добавить базу данных sqlite и писать туда
   1. Базовый URL чтобы заменяло его если пользователь вводит новый
   2. Сохранять все данные в отдельную таблицу, если пользователю нужны старые данные без парсинга новых
 - сделать парсинг по чанкам


