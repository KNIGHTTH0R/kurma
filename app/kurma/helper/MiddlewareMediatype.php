<?php
/**
 * Created by PhpStorm.
 * User: akbar
 * Date: 05.06.15
 * Time: 18:08
 */

namespace kurma\helper;


class MiddlewareMediatype extends \Slim\Middleware{

    /**
     * just allow Content-Type : application/json
     * except view URI
     */
    public function call(){
        $request = $this->app->request();
        $response = $this->app->response();
        $mediatype = $request->getMediaType();

        // Reject all wrong content types
        if ($mediatype !== 'application/json' && strpos($request->getPathInfo(), '/view') === false) {
            $response['Content-type'] = 'application/json';
            $response->setBody(json_encode(['errmsg' => 'Unexpected Media Type']));
            $response->status(415);
            return;
        }
        $this->next->call();
    }
} 