<?php

namespace App\Http\Controllers\API;

use Illuminate\Routing\Controller as BaseController;

class FarmController extends BaseController {

    public function getWhereId($farmid) {
        return $farmid;
    }

}
