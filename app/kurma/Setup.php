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

class Setup extends Slim {

    public function __construct(){
        $twigView = new Twig();
        $twigView->parserExtensions = array(new TwigExtension());

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

        date_default_timezone_set('Europe/Berlin');
        $routing = new Routing();
        $routing->setupRouting($this);
    }
} 