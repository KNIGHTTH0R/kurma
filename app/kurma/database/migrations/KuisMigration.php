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
            $table->integer('id_kuis', true);
            $table->string('kuis_name');
            $table->string('kuis_pass');
            $table->string('kuis_winner')->nullable();
            $table->boolean('islogin');
            $table->boolean('isclosed');
            $table->dateTime('kuis_open');
            $table->timestamps();
        });
    }
} 