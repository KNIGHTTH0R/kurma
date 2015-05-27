<?php
/**
 * Created by PhpStorm.
 * User: akbar
 * Date: 27.05.15
 * Time: 14:05
 */

namespace kurma\controller;

use kurma\models\Kuis;

class KuisController extends AbstractController{

    private $kuisId;

    public function setKuisId($kuisId){
        $this->kuisId = $kuisId;
    }

    public function closeKuis(){

    }

    //TODO: fixed this method!
    public function openKuis(){
        $request = $this->request->get('kuis_pass');

        $key = isset($request) ? filter_var($request, FILTER_SANITIZE_STRING) : false;
        $isExist = Kuis::query()->where('kuis_pass', '=', md5($request))->get()->count();
        $isAlreadyLogin = Kuis::query()->where('islogin', '=', false)->get();

        if(!$key && $isExist > 0 && !$isAlreadyLogin){
            $this->writeToJSON(['errmsg' => 'Tidak ada izin!'], 400);
            return;
        }
echo "OK";
    }
} 