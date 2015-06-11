<?php
/**
 * Created by PhpStorm.
 * User: akbar
 * Date: 08.06.15
 * Time: 15:23
 */

namespace kurma\database\seeds;


use kurma\models\Pertanyaan;

class PertanyaanSeed {

    public function run(){
        $pertanyaanData = [
            ['id_kuis' => '1', 'pertanyaan' => "apa nama kuis ini?", 'jawaban' => "kurma", 'isclosed' => false],
            ['id_kuis' => '1', 'pertanyaan' => "dimana ibu kota jerman berada?", 'jawaban' => "berlin", 'isclosed' => false],
            ['id_kuis' => '1', 'pertanyaan' => "apa nama ibu kota jakarta?", 'jawaban' => 'jakarta', 'isclosed' => false],
            ['id_kuis' => '1', 'pertanyaan' => "sebutkan huruf alfabet?", 'jawaban' => "a, b, c, d", 'isclosed' => false],
        ];

        foreach($pertanyaanData as $data){
            $kuis = new Pertanyaan();
            foreach($data as $key=>$value){
                $kuis->$key = $value;
            }
            $kuis->save();
        }
    }
} 