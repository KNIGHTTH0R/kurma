<?php
/**
 * Created by PhpStorm.
 * User: akbar
 * Date: 27.05.15
 * Time: 11:11
 */

namespace kurma\database\migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

class UsersMigration {

    public function run(){
        Capsule::schema()->dropIfExists('users');
        Capsule::schema()->create('users', function($table){
            $table->increments('id_user');
            $table->string('username', 50);
            $table->string('password');
            $table->timestamps();
        });
    }
} 