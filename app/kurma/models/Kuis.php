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

    public function getKurmaID($kurma_pass){
        $data = json_decode($this->query()->where('kuis_pass', '=', md5($kurma_pass))->get(['id_kuis']), true);
        foreach ($data as $id) {
            return $id['id_kuis'];
        }
    }

    public function isKeyExist($kurma_pass){
        if($this->query()->where('kuis_pass', '=', md5($kurma_pass))->get()->count() > 0){
            return true;
        }
        return false;
    }
} 