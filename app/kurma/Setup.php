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
use Slim\Middleware\SessionManager as SessionManager;
use Slim\Middleware\Session as Session;
use kurma\helper\Routing;

/**
 * For IDE auto completions
 *
 * @property \Illuminate\Session\Store $session
 */
class Setup extends Slim {

    public function __construct(){
        $twigView = new Twig();
        $twigView->parserExtensions = array(new TwigExtension());

        //setup twig template
        parent::__construct([
           'view'                   => $twigView,
            'mode'                  => 'development',
            'debug'                 => true,
            //set template path
            'template.path'         => $_SERVER['DOCUMENT_ROOT'] . '/../templates',
            //cookie encryption
            'cookies.encrypt'       => true,
            'cookies.secret_key'    => 'put your secret key',
            //session config
            'sessions.driver'        => 'database',
            'sessions.table'         => 'sessions'
        ]);

        //setup database connection
        $capsule = new \Illuminate\Database\Capsule\Manager;
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

        //setup session manager
        $manager = new SessionManager($this);
        $manager->setDbConnection($capsule->getConnection());
        $this->add(new Session($manager));

        //do routing
        $routing = new Routing();
        $routing->setupRouting($this);
    }
} 