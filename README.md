ShortUrl
========

![ShortUrl](http://www.techgid.ru/img/2012/11/28/turn-long-short.jpg)

Описание
---------

ShortURL это Web-приложение, которое преобразует длинные URL-адреса в сокращенные. ShortURL основан на перенаправление URL. 

Более длинные из них часто ломаются в сообщениях электронной почты, и могут работать не надежно. Кроме того, для некоторых видов связи, таких как обмен текстовыми сообщениями и размещения на Twitter, количество символов, разрешенных в пост настолько ограничено, что длинный URL не оставит места для сообщения.

Изображение
---------
![ShortUrl](https://github.com/PitBult/shorturl/blob/master/demo.png)

Установка
---------
Для установки и запуска приложения необходимо:
- дополнительно скачать PHP framework Yii 1.1.15. http://www.yiiframework.com/download/
- необходимо создать папки /assets/ и /protected/runtime/ с правами 777 для записи
- изменить файл /index.php, прописать правильный путь к PHP Yii-framework 
- создать БД MySQL, дамп расположен в /protected/data/sql_dump.sql

Использование сторонних библиотек
---------
- Bootstrap v3.2.0 (http://getbootstrap.com/)
- ZeroClipboard v2.1.5 (http://zeroclipboard.org/)

Принцип работы
---------
