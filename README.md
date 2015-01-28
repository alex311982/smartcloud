Разворачивание проекта.
* git clone https://github.com/alex311982/smartcloud.git
* cd smartcloud
* composer update - задать параметры к базе (pdo_mysql) в консольном режиме
* создать базу - php app/console doctrine:database:create
* создать таблицы - php app/console doctrine:schema:update --force
* загрузить фикстуры - php app/console doctrine:fixtures:load
* php app/console assets:install --symlink
* php app/console cache:clear
* sudo chmod 777 -R app/cache app/logs
* создать виртуальный хост с DocumentRoot - папка web
* зайти на главную страницу проекта - http://{host}/tasks

При изменении налогового законодательства необходимы будут изменения в базе данных (структура базы, таблиц и данные).
Необходимо использовать миграции. Для этого, к примеру, в Symfony2 есть бандл.