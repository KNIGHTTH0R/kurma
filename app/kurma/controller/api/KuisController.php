<?php
/**
 * Created by PhpStorm.
 * User: akbar
 * Date: 27.05.15
 * Time: 14:05
 */

namespace kurma\controller\api;

use kurma\models\Kuis;

class KuisController extends AbstractController{

    private $kuisId;

    private function getModel(){
        return new Kuis();
    }

    public function setKuisId($kuisId){
        $this->kuisId = $kuisId;
    }

    public function closeKuis(){

    }

    public function openKuis(){
        $request = $this->request->get('kuis_pass');

        $key = isset($request) ? filter_var($request, FILTER_SANITIZE_STRING) : false;
        $isAllowed = $this->getModel()->isAllowed($this->kuisId, $key);

        if(!$key || !$isAllowed){
            $this->writeToJSON(['errmsg' => 'Tidak ada izin!'], 400);
            return;
        }

        $this->app->session->put("current_kurma".$this->kuisId, [rand(), "kurma_".$this->kuisId]);
        $this->writeToJSON(["session created" => true, 'session name' => "current_kurma".$this->kuisId]);
    }
} 