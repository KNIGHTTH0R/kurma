<?php
/**
 * Created by PhpStorm.
 * User: akbar
 * Date: 27.05.15
 * Time: 12:13
 */

namespace kurma\models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\Builder as Builder;

class Kuis extends Model{

    protected $table = "kuis";
    protected $primaryKey = "id_kuis";

    public function test(){
        $build = new Builder($this->query());
        var_dump($build->where('kuis_pass', '=', md5('kuis1')));
    }
} 