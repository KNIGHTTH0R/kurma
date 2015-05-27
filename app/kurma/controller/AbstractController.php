<?php
/**
 * Created by PhpStorm.
 * User: akbar
 * Date: 27.05.15
 * Time: 16:02
 */

namespace kurma\controller;

use kurma\Setup;

class AbstractController{

    /**
     * @var \Slim\Http\Request
     */
    protected $request;

    /**
     * @var \Slim\Http\Response
     */
    protected $response;

    /**
     * @var Setup
     */
    private $app;

    /**
     * @param Setup $app
     */
    public function __construct(Setup $app){
        $this->app = $app;
        $this->request = $app->request;
        $this->response = $app->response;
    }

    protected function writeToJSON($data, $status = 200){
        $this->response->status($status);
        $this->response['Content-Type'] = 'application/json';
        $this->response->body(json_encode($data));
    }
} 