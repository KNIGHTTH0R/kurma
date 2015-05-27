<?php
/**
 * Created by PhpStorm.
 * User: MJA
 * Date: 27.05.2015
 * Time: 23:04
 */

namespace kurma\models;

use Rhumsaa\Uuid\Uuid;

class Session {

    /**
     * Generate a new Session id
     *
     * @return string
     */
    public static function generateUUID(){
        return Uuid::uuid4()->toString();
    }

    /**
     * Checks if a given Session id is valid
     *
     * @param $uuid
     * @return bool
     */
    public static function isValid($uuid){
        if(!Uuid::isValid($uuid)){
            return false;
        }

        return true;
    }
} 