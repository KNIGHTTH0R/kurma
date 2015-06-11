<?php
/**
 * Created by PhpStorm.
 * User: akbar
 * Date: 08.06.15
 * Time: 14:57
 */

namespace kurma\controller\kurma;


use kurma\models\Pertanyaan;

class SesiSatu{

    private $kuisId;

    private function getModel(){
        return new Pertanyaan();
    }
    public function getKuisSession($kuisId){
        $this->kuisId = $kuisId;
    }

    public function generatePertanyaan(){
        $pertanyaan = $this->getModel()->getPertanyaanFromKuisId($this->kuisId);

    }

    public function checkAnswer(){

    }
} 