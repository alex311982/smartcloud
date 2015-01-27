Разворачивание проекта.
1. git clone https://github.com/alex311982/smartcloud.git
2. cd smartcloud
3. composer update - задать параметры к базе (pdo_mysql) в консольном режиме
4. создать базу - php app/console doctrine:database:create
5. создать таблицы - php app/console doctrine:schema:update --force
6. загрузить фикстуры - php app/console doctrine:fixtures:load
7. php app/console assets:install --symlink
8. php app/console cache:clear
9. sudo chmod 777 -R app/cache app/logs
10. создать виртуальный хост с DocumentRoot - папка web
11. зайти на главную страницу проекта - http://{host}/tasks

