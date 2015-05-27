<?php
/**
 * Created by PhpStorm.
 * User: akbar
 * Date: 27.05.15
 * Time: 12:14
 */

namespace kurma\database\seeds;


use kurma\models\Kuis;

class KuisSeed {

    public function run(){
        $kuisData = [
            ['kuis_name' => 'Kurma I', 'isclosed' => false, 'kuis_open' => date('Y-m-d H:i:s', strtotime('12-06-2015 12:00'))],
            ['kuis_name' => 'Kurma II', 'isclosed' => false, 'kuis_open' => date('Y-m-d H:i:s', strtotime('19-06-2015 12:00'))],
            ['kuis_name' => 'Kurma III', 'isclosed' => false, 'kuis_open' => date('Y-m-d H:i:s', strtotime('26-06-2015 12:00'))],
            ['kuis_name' => 'Kurma IV', 'isclosed' => false, 'kuis_open' => date('Y-m-d H:i:s', strtotime('01-07-2015 12:00'))],
        ];

        foreach($kuisData as $data){
            $kuis = new Kuis();
            foreach($data as $key=>$value){
                $kuis->$key = $value;
            }
            $kuis->save();
        }
    }
} 