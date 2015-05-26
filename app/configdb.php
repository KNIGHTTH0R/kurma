<?php
/**
 * Created by PhpStorm.
 * User: MJA
 * Date: 26.05.2015
 * Time: 14:57
 */

use Illuminate\Database\Capsule\Manager as Capsule;
/**
 * Configure the database and boot Eloquent
 */
$capsule = new Capsule;
$capsule->addConnection(array(
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'kurma',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => ''
));
$capsule->setAsGlobal();
$capsule->bootEloquent();
// set timezone for timestamps etc
date_default_timezone_set('UTC');