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
        $isExist = $this->getModel()->isKeyExist($request);

        if(!$key || !$isExist){
            $this->writeToJSON(['errmsg' => 'Tidak ada izin!'], 400);
            return;
        }

        $kurmaID = $this->getModel()->getKurmaID($request);
        $this->app->session->put("current_kurma$kurmaID", [rand(), "kurma_$kurmaID"]);
        $this->writeToJSON(["session created" => true, 'session name' => "current_kurma$kurmaID"]);
    }
} 