<?php
/**
 * Created by PhpStorm.
 * User: MJA
 * Date: 26.05.2015
 * Time: 15:07
 */

namespace kurma;

use Slim\Slim;
use Slim\Views\Twig as Twig;
use Slim\Views\TwigExtension as TwigExtension;
use kurma\helper\Routing;
use Illuminate\Database\Capsule\Manager as Capsule;

class Setup extends Slim {

    public function __construct(){
        $twigView = new Twig();
        $twigView->parserExtensions = array(new TwigExtension());

        //setup twig template
        parent::__construct([
           'view'   => $twigView,
            'mode'  => 'development',
            'debug' => true,
            'template.path' => $_SERVER['DOCUMENT_ROOT'] . '/../templates',
            'cookies.encrypt' => true,
            'cookies.secret_key' => "981237123",
            'cookies.cipher' => MCRYPT_RIJNDAEL_256,
            'cookies.cipher_mode' => MCRYPT_MODE_CBC
        ]);

        //setup database connection
        $capsule = new Capsule;
        $capsule->addConnection(array(
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'kurma',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix'    => ''
        ));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        date_default_timezone_set('Europe/Berlin');
        $routing = new Routing();
        $routing->setupRouting($this);
    }
} 