<?php

namespace App\Http\Controllers;

use App\Farm;

class FarmController extends Controller {

    public function getWhereId($farmid, $token) {

        //$farm = App\Farm::find($farmid);
        $farm = new Farm;
        $farm->name = 'Farm Dude 6';
        $farm->number = 5754;

        $farm->upsert();

        return $token;
    }

}
