# PHP7-QuickStart

[![MIT License](https://img.shields.io/packagist/l/doctrine/orm.svg)](https://opensource.org/licenses/MIT)
![Made in PHP 7](https://img.shields.io/badge/php-7-blue.svg)
![Stable Version](https://img.shields.io/badge/stable-1.0.0-blue.svg)

## Introduction

Welcome to the PHP7-quickstart-repository, a functional application that you can use as the skeleton for your new applications.

This repository corresponds to an update of [PHP5-quickstart](https://github.com/ulises-jeremias/php5-quickstart/).

* Supports multiple databases with different engines using PDO **simultaneously**
  * MySQL 5.1+
  * Oracle
  * PostgreSQL
  * SQLite
  * CUBRID
  * Interbase/Firebid
  * ODBC

## Requirements

To place the framework in production requires a VPS, Dedicated or Hosting that fulfills the following characteristics:

* PHP 7
* APACHE 2

## Setup
### Download
Clone the repository.
```
  git clone https://github.com/ulises-jeremias/php7-quickstart.git
```

Downloading manually.

[Downloads](https://github.com/ulises-jeremias/php7-quickstart/releases)

### Settings

In case of being in LINUX and obtain problems of writing permissions by the Firewall, put in the console the following:

```
  ~ $ sudo chmod -R 777 /path/where/the/framework/is/located
```

__./core/config.php__

```php

<?php

# Strict types for PHP 7
declare(strict_types=1);

//------------------------------------------------
# Security
defined('INDEX_DIR') OR exit('PHP7-quickstart software says .i.');

//------------------------------------------------
# Timezone DOC http://php.net/manual/es/timezones.php
date_default_timezone_set('America/Argentina/Buenos_Aires');

//------------------------------------------------
/**
  * Settings for DB connection.
  * @param host 'Server for connection to the database -> local/remote hosting'
  * @param user 'Database user'
  * @param pass 'Password of the database user'
  * @param name 'Database name'
  * @param port 'Database port (not required on most engines)'
  * @param protocol 'Connection protocol (not required on most engines)'
  * @param motor 'Default connection engine'
  * MOTORS VALUES:
  *        mysql
  *        sqlite
  *        oracle
  *        postgresql
  *        cubrid
  *        firebird
  *        odbc
  */
define('DATABASE', array(
  'host' => 'localhost', 
  'user' => 'root',
  'pass' => '',
  'name' => '',
  'port' => 1521,
  'protocol' => 'TCP',
  'motor' => 'mysql'
));

//------------------------------------------------
/**
 * Defines the directory in which the framework is installed
 * @example "/" If to access the framework we place http://url.com in the URL, or http://localhost
 * @example "/php7-quickstart/" if to access the framework we place http://url.com/php7-quickstart, or http://localhost/php7-quickstart/
*/
define('__ROOT__', '/php7-quickstart/');

# App constants
define('URL', 'http://localhost/php7-quickstart/');
define('APP', 'PHP7-quickstart');
define('HTML_DIR', 'templates/');
define('APP_COPY','Copyright &copy; ' . date('Y',time()) . APP);

//------------------------------------------------
# Session control
define('DB_SESSION', false);
define('SESSION_TIME', 18000); # life time for session cookies -> 5 hs = 18000 seconds.
define('SESS_APP_ID', '_sess_app_id_');
define('KEY', '');
session_start([
  'use_strict_mode' => true,
  'use_cookies' => true,
  'cookie_lifetime' => SESSION_TIME,
  'cookie_httponly' => true # Avoid access to the cookie using scripting languages (such as javascript)
]);

//------------------------------------------------
# PHPMailer constants
define('PHPMAILER', array(
  'HOST' => '',
  'USER' => '',
  'PASS' => '',
  'PORT' => 465
));

//------------------------------------------------
# PayPal SDK
define('PAYPAL', array(
  'MODE' => 'sandbox', //sandbox or live
  'CLIENT_ID' => '',
  'CLIENT_SECRET' => ''
));

//------------------------------------------------
# Firewall
define('FIREWALL', true);

//------------------------------------------------
# DEBUG mode
define('DEBUG', false);

//------------------------------------------------
define('E_ERNO','');


//------------------------------------------------
# Current version of the framework
define('VERSION', '0.3');

?>
```

## First Hello World

Create __./core/controllers/helloController.php__
```php

  class helloController extends Controller {

    public function __construct() {
      parent::__construct();
      $this->render('hello/hello');
    }

  }
```
Create __./templates/hello/hello.php__

```php

<!DOCTYPE html>
<html>
  <?php $this->render('overall/header'); ?>
  <body>
    <?php $this->render('overall/topnav'); ?>
    <div class="cmd_container">
    	<h1>Hello World!!!</h1>
    	<hr><br>
    </div>
    <?php $this->render('overall/footer'); ?>
  </body>
</html>
```

Access to http://url.com/hello/
