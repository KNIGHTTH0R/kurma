<?php
/**
 * Created by PhpStorm.
 * User: MJA
 * Date: 26.05.2015
 * Time: 15:20
 */

namespace kurma\helper;

use kurma\models\Kuis;
use kurma\controller\KuisController;
use kurma\Setup;

class Routing {

    public function setupRouting(Setup $app){
        $app->group('/kurmaapi', function() use($app){
            $app->get('/', function() {
                $kurma = Kuis::all(['id_kuis']);
                echo $kurma;
            });

            $app->get('/:kuis_id', function($kuisId) use($app){
                $kuis = new KuisController($app);
                $kuis->setKuisId($kuisId);
                echo $kuis->openKuis();
            });
        });

        $app->group('/admin', function() use($app){
           $app->get('/', function(){

           });
        });
    }
} 