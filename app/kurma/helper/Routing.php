<?php
/**
 * Created by PhpStorm.
 * User: MJA
 * Date: 26.05.2015
 * Time: 15:20
 */

namespace kurma\helper;

use kurma\controller\api\KuisController;
use kurma\Setup;

class Routing {

    public function setupRouting(Setup $app){

        $app->group('/kurmaapi', function() use($app){
            $kuisController = new KuisController($app);

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

            //need admin role
            $app->post('/', function() use($kuisController){
                $kuisController->createNewKuis();
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