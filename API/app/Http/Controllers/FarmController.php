<?php

namespace App\Http\Controllers;

use App\Farm;

class FarmController extends Controller {

    public function getWhereId($farmid, $token) {

        $farm = new Farm;
        $farm->name = 'Farm';
        $farm->number = 3111;

        //$farm->upsert();

        $farm = $farm->fetch();
        $farm->delete();

        //var_dump($obj->getData());

        return $token;
    }

}
