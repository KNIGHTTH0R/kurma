<?php
/**
 * Created by PhpStorm.
 * User: akbar
 * Date: 27.05.15
 * Time: 14:05
 */

namespace kurma\controller\api;

use kurma\models\Kuis;
use kurma\models\Pertanyaan;

class PertanyaanController extends AbstractController{

    private $kuisId;

    private function getModel(){
        return new Pertanyaan();
    }
    public function setKuisSession($kuisId){
        $this->kuisId = $kuisId;
        $current_user = $this->app->session->get('current_kurma'.$this->kuisId);

        if($current_user[1] != 'kurma_'.$kuisId){
            $this->writeToJSON(['errmsg' => 'Tidak ada izin!'], 400);
            return false;
        }
        return true;
    }

    public function getPertanyaan(){
        var_dump($this->getModel()->getPertanyaanFromKuisId($this->kuisId));
    }

    public function checkJawaban($idPertanyaan, $jawaban, $group = null){
        return $this->getModel()->checkJawaban($idPertanyaan, $jawaban, $group);
    }

    public function addNewPertanyaan(){
        $pertanyaan = $this->request->post('pertanyaan');
        $jawaban = $this->generateJawaban($this->request->post('jawaban'));
        $kuisId = $this->request->post('id_kuis');
        $kuisName = Kuis::find($kuisId, ["kuis_name"]);

        $db = $this->getModel();
        $db->pertanyaan = $pertanyaan;
        $db->jawaban = $jawaban;
        $db->id_kuis = $kuisId;

        if($db->save()){
            $this->writeToJSON(["pertanyaan added" => true, 'kuis name' => $kuisName, 'pertanyaan' => $pertanyaan, 'jawaban' => $jawaban]);
        }
    }

    private function generateJawaban($jawaban){
        $newJawaban = "";

        if(strpos($jawaban, ',')){
            
        }
        
        if(is_array($jawaban)){
            foreach ($jawaban as $value) {
                $newJawaban .= $value . ",";
            }
        }

        return $newJawaban;
    }
} 