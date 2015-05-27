<?php
/**
 * Created by PhpStorm.
 * User: akbar
 * Date: 27.05.15
 * Time: 12:07
 */

namespace kurma\database\migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

class KuisMigration {

    public function run(){
        Capsule::schema()->dropIfExists('kuis');
        Capsule::schema()->create('kuis', function($table){
            $table->increments('id_kuis');
            $table->string('kuis_name');
            $table->string('kuis_winner')->nullable();
            $table->boolean('isclosed');
            $table->dateTime('kuis_open');
            $table->timestamps();
        });
    }
} 