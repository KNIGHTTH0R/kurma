<?php
/**
 * Created by PhpStorm.
 * User: MJA
 * Date: 26.05.2015
 * Time: 15:20
 */

namespace kurma\helper;

use kurma\Setup;

class Routing {

    public function setupRouting(Setup $app){
        $app->group('/api', function() use($app){
            $app->get('/', function() {
               echo "HELLO WORLD!";
            });
        });
    }
} 