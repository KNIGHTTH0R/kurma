<?php
/**
 * Created by PhpStorm.
 * User: akbar
 * Date: 27.05.15
 * Time: 11:57
 */

namespace kurma\database\seeds;

use kurma\models\Users;

class UserSeed {

    public function run(){
        $user = new Users();
        $user->username = "admin";
        $user->password = md5("admin123");
        $user->save();
    }
} 