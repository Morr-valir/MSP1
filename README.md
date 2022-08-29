# CDA BIO WEBSITE
CDA BIO est un site permettant de mettre en valeurs les agriculteur de l'ile de la réunion après qu'il puissent vendre leurs produis au client via le web.

## FRAMEWORK

Symfony 6

## Version de Php

PHP 8.1

## Installation

```bash
git clone ?
cd MSP1
composer install
```

Modification du  .ENV 

```bash
symfony console doctrine:database:create
symfony console doctrine:migrations:migrate
```

si erreur lors de la migration :
```bash
symfony console doctrine:schema:update --force
```


## Contributing
[Matthieu Picard] - Chef de projet digital / Lead Dev
