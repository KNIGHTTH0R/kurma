<?php
/**
 * Created by PhpStorm.
 * User: MJA
 * Date: 26.05.2015
 * Time: 15:08
 */

namespace kurma;

require '../vendor/autoload.php';

$app = new Setup();
$app->run();

//require_once __DIR__ . '/../vendor/autoload.php';
//date_default_timezone_set('UTC');
//
///**
// * For IDE auto completions
// *
// * @property \Illuminate\Session\Store $session
// */
//class MySlim extends \Slim\Slim {}
//
//$app = new MySlim([
//    // cookie encryption (strongly recommend)
//    'cookies.encrypt' => true,
//    'cookies.secret_key' => 'put your secret key',
//    // session config
//    'sessions.driver' => 'database', // or database
//    'sessions.table' => 'sessions', // require create table
//]);
//
//
//$capsule = new \Illuminate\Database\Capsule\Manager;
//$capsule->addConnection(array(
//    'driver'    => 'mysql',
//    'host'      => 'localhost',
//    'database'  => 'kurma',
//    'username'  => 'root',
//    'password'  => '',
//    'charset'   => 'utf8',
//    'collation' => 'utf8_general_ci',
//    'prefix'    => ''
//));
//$capsule->setAsGlobal();
//$capsule->bootEloquent();
////setup session manager
//$manager = new \Slim\Middleware\SessionManager($app);
//$manager->setDbConnection($capsule->getConnection());
//$app->add(new \Slim\Middleware\Session($manager));
//
//
//
//$app->get('/', function() use ($app)
//{
//    $current_user = $app->session->get('current_user');
//    if (is_null($current_user)) {
//        echo <<<HTML
//Hello Session.<br>
//<form method="POST" action="/session"><input type="submit" value="login"/></form></br>
//HTML;
//    } else {
//        list($id, $name) = $current_user;
//        echo <<<HTML
//Welcome, {$name} (id={$id})</br>
//<form method="POST" action="/session"><input type="submit" value="logout"/>
//<input type="hidden" name="_METHOD" value="DELETE"/></form></br>
//HTML;
//    }
//    echo $app->session->get('message').'</br>';
//});
//$app->post('/session', function() use ($app)
//{
//    $app->session->put('current_user', [15234, 'hoge_user']);
//    $app->session->flash('message', 'logged in.');
//    $app->response->redirect('/');
//});
//$app->delete('/session', function() use ($app)
//{
//    $app->session->forget('current_user');
//    $app->session->flash('message', 'logged out.');
//    $app->response->redirect('/');
//});
//
//$app->run();