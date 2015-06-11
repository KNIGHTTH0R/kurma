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

    public function getPertanyaanFromKuisId($kuisId){
        return $this->query()->where("id_kuis", "=", $kuisId)
                      ->where("isclosed", "=", "false")
                      ->first(['id_pertanyaan', 'pertanyaan', 'jawaban'])->toArray();
    }

    public function checkJawaban($pertanyaanId, $jawaban, $group){
        $isTrue = $this->query()->where('id_pertanyaan', '=', $pertanyaanId)
                                ->where('jawaban', '=', strtolower($jawaban))
                                ->get()->count();

        //TODO: tambahkan juga ke database pertanyaan <=> group
        if($isTrue > 0){
            $loginStatus = $this->find(id_pertanyaan);
            $loginStatus->isclose = true;
            $loginStatus->save();
            return true;
        }

        return false;
    }
} 