<?php
/**
 * Created by PhpStorm.
 * User: akbar
 * Date: 27.05.15
 * Time: 12:13
 */

namespace kurma\models;

use Illuminate\Database\Eloquent\Model as Model;

class Kuis extends Model{

    protected $table = "kuis";
    protected $primaryKey = "id_kuis";

    public function isAllowed($kurmaId, $kurmaPass){
        $isAvailable = $this->query()->where('id_kuis', '=', $kurmaId)
                                     ->where('kuis_pass', '=', md5($kurmaPass))
                                     ->get()->count();
        if($isAvailable > 0){
            return true;
        }

        return false;
    }
} 