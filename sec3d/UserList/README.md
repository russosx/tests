## Тестовое задание
На фреймворке Kohana 3 (или самая последняя версия этого фреймворка) сделать небольшое веб приложение,
которое позволяет добавлять, изменять и удалять клиентов в/из базы (Postgres) при помощи сохраненных процедур (Stored Procedures).
Выводить список клиентов нужно используя представление (View) в базе.
Графический вывод (таблица, кнопки и тп) нужно сделать используя Twitter Bootstrap (использовать последнюю стабильную версию!).
Запросы на сервер из графической части должны быть выполнены используя Ajax+JSON.
Запись клиента должна содержать: имя, фамилия, личный код, емайл, адрес (достаточно одного поля), город и страна;  +проверка на валидность всех полей (в трех местах: JS, PHP, база данных).
Представьте что Вашу апликашку будут использовать в продакшене, поэтому, частые ошибки ввиде SQL Инйекции, это сразу минус.

## Результат работы
Необходимо прислать в виде кода в ZIP/RAR формате, так же не забыть приложить дамп базы или DDL скрипты для ее разворачивания.

## Kohana PHP Framework

[Kohana](http://kohanaframework.org/) is an elegant, open source, and object oriented HMVC framework built using PHP5, by a team of volunteers. It aims to be swift, secure, and small.

Released under a [BSD license](http://kohanaframework.org/license), Kohana can be used legally for any open source, commercial, or personal project.

## Documentation
Kohana's documentation can be found at <http://kohanaframework.org/documentation> which also contains an API browser.

The `userguide` module included in all Kohana releases also allows you to view the documentation locally. Once the `userguide` module is enabled in the bootstrap, it is accessible from your site via `/index.php/guide` (or just `/guide` if you are rewriting your URLs).

## Reporting bugs
If you've stumbled across a bug, please help us out by [reporting the bug](http://dev.kohanaframework.org/projects/kohana3/) you have found. Simply log in or register and submit a new issue, leaving as much information about the bug as possible, e.g.

* Steps to reproduce
* Expected result
* Actual result

This will help us to fix the bug as quickly as possible, and if you'd like to fix it yourself feel free to [fork us on GitHub](https://github.com/kohana) and submit a pull request!
