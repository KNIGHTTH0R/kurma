<?php
/**
 * Created by PhpStorm.
 * User: akbar
 * Date: 27.05.15
 * Time: 15:36
 */

namespace kurma\models;

use Illuminate\Database\Eloquent\Model as Model;

class Pertanyaan extends Model{

    protected $table = 'pertanyaan';
    protected $primaryKey = 'id_pertanyaan';
} 