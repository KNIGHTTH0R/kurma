<?php
/**
 * Created by PhpStorm.
 * User: MJA
 * Date: 26.05.2015
 * Time: 15:20
 */

namespace kurma\helper;

use kurma\controller\api\KuisController;
use kurma\controller\api\PertanyaanController;
use kurma\Setup;

class Routing {

    public function setupRouting(Setup $app){

        $app->group('/kurmaapi', function() use($app){
            $kuisController = new KuisController($app);
            $pertanyaanController = new PertanyaanController($app);

            // Kuis Controller
            $app->get('/', function() use($kuisController){
                $kuisController->displayKuis();
            });

            $app->get('/:kuis_id', function($kuisId) use($kuisController){
                $kuisController->setKuisId($kuisId);
                $kuisController->openKuis();
            });

            $app->get('/:kuis_id/logout', function($kuisId) use($kuisController){
                $kuisController->setKuisId($kuisId);
                $kuisController->closeKuis();
            });

            //TODO: add admin role
            $app->post('/', function() use($kuisController){
                $kuisController->createNewKuis();
            });

            // Pertanyaan Controller
            $app->get('/:kuis_id/pertanyaan', function($kuisId) use($pertanyaanController){
                if($pertanyaanController->setKuisSession($kuisId)) $pertanyaanController->getPertanyaan();
            });

            //TODO: add admin role
            $app->post('/', function() use($pertanyaanController){
               $pertanyaanController->addNewPertanyaan();
            });
        });

        $app->group('/view', function() use($app){
            $app->group('/admin', function() use($app){
                $app->get('/', function(){
                    echo "admin";
                });
            });

            $app->group('/kurma', function() use($app){
                $app->get('/', function() use($app) {
                    echo "template";
                });
            });
        });
    }
} 