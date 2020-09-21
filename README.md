# sym435

git clone https://github.com/hong1234/sym435.git

cd sym435

composer install

php -S 127.0.0.1:8000 -t public

http://localhost:8000/ //=> Welcome to Symfony 4.3.3

//sudo nano .env
DATABASE_URL=mysql://root:vuanh123@127.0.0.1:3306/sym43

// bin/console doctrine:database:create
bin/console doctrine:schema:create

composer require --dev doctrine/doctrine-fixtures-bundle // make fixtures => set init-data in table
rm -rf var/cache // => reset routes...

// security
composer require symfony/security-bundle
php bin/console make:user

//created: src/Entity/User.php
//created: src/Repository/UserRepository.php
//updated: config/packages/security.yaml

// http://localhost:8000/list // => http://localhost:8000/login
// http://localhost:8000/logout // => http://localhost:8000/table//mail

//In Symfony 4.3, the Mailer component was introduced and can be used instead of Swift Mailer.
//composer require symfony/mailer
composer require symfony/swiftmailer-bundle

// sudo nano .env
###> symfony/swiftmailer-bundle ###
# For Gmail as a transport, use: "gmail://username:password@localhost"
# For a generic SMTP server, use: "smtp://localhost:25?encryption=&auth_mode="
# Delivery is disabled by default via "null://localhost"
#MAILER_URL=null://localhost
MAILER_URL=gmail://hong66.lenguyen@gmail.com
###< symfony/swiftmailer-bundle ###

//form
composer require symfony/form
// http://localhost:8000/contact => send mail über gmail an vuanhde@yahoo.de

// config/services.yaml---------------------------
# exception händler
App\EventListener\ExceptionListener:
tags:
- { name: kernel.event_listener, event: kernel.exception }

#https://symfony.com/doc/current/doctrine/pdo_session_storage.html
#session in db stored

#config/services.yaml

Symfony\Component\HttpFoundation\Session\Storage\Handler\PdoSessionHandler:
arguments:
- 'mysql:dbname=sym42; host=localhost; port=3306'
- { db_table: 'sessions', db_username: root, db_password: vuanh123 }

# config/packages/framework.yaml---------------------------

framework:

session:

# ...
handler_id: Symfony\Component\HttpFoundation\Session\Storage\Handler\PdoSessionHandler

CREATE TABLE `sessions` (
`sess_id` VARCHAR(128) NOT NULL PRIMARY KEY,
`sess_data` BLOB NOT NULL,
`sess_time` INTEGER UNSIGNED NOT NULL,
`sess_lifetime` MEDIUMINT NOT NULL
) COLLATE utf8mb4_bin, ENGINE = InnoDB;

// test session setting

// http://localhost:8000/session

// test session getting

// http://localhost:8000/session2


