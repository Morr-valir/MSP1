CDA BIO WEBSITE
CDA BIO est un site permettant de mettre en valeurs les agriculteur de l'ile de la réunion après qu'il puissent vendre leurs produis au client via le web.

FRAMEWORK

Symfony 6

Server Require

PHP 8.1

Installation

git clone ?
cd MSP1
composer install

Modification du  .ENV 

symfony console doctrine:database:create
symfony console doctrine:migrations:migrate

si erreur lors de la migration :
symfony console doctrine:schema:update --force


Contributing
Matthieu Picard - Chef de projet digital / Lead Dev
