<?php
/**
 * Created by PhpStorm.
 * User: akbar
 * Date: 27.05.15
 * Time: 14:46
 */

namespace kurma\database\migrations;

use Illuminate\Database\Capsule\Manager as Capsule;

class PertanyaanMigration {

    public function run(){
        Capsule::schema()->dropIfExists('pertanyaan');
        Capsule::schema()->create('pertanyaan', function($table){
            $table->increments('id_pertanyaan');
            $table->integer('id_kuis')->references('id_kuis')->on('kuis')->onDelete('cascade');
            $table->string('pertanyaan');
            $table->string('jawaban');
            $table->boolean('isclosed');
            $table->timestamps();
        });
    }
} 