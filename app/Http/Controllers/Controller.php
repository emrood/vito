<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    static function getUniqueSaltWithPrefix($prefix , $l = 10) {
        return strtoupper(substr(md5(uniqid($prefix.mt_rand(), true)), 0, $l));
    }
}
