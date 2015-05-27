<?php
/**
 * Created by PhpStorm.
 * User: akbar
 * Date: 27.05.15
 * Time: 12:13
 */

namespace kurma\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Kuis extends Eloquent{

    protected $table = "kuis";
    protected $primaryKey = "id_kuis";
} 