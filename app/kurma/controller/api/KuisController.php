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

    public function displayKuis(){
        $this->writeToJSON($this->getModel()->all(['id_kuis', 'kuis_name', 'kuis_open', 'kuis_winner']));
    }

    /**
     * closed the current kuis
     */
    public function closeKuis(){
        $this->getModel()->closeCurrKuis($this->kuisId);
        $this->app->session->forget('current_kurma'.$this->kuisId);
        $this->writeToJSON(["kuis closed" => true]);
    }

    /**
     * open the kuis
     * need kuis password
     */
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

    /**
     * create new kuis
     * value will be added: kuis_name, kuis_pass, kuis_open
     */
    public function createNewKuis(){
        $kuis_name = $this->request->post('kuis_name');
        $kuis_pass = $this->request->post('kuis_pass');
        $kuis_open = date('Y-m-d H:i:s', strtotime($this->request->post('kuis_open')));

        $kuis = $this->getModel();
        $kuis->kuis_name = $kuis_name;
        $kuis->kuis_pass = $kuis_pass;
        $kuis->kuis_open = $kuis_open;

        if($kuis->save()){
            $this->writeToJSON(["new kuis created" => true, 'kuis name' => $kuis_name, 'kuis open on' => $kuis_open]);
        }
    }
} 