<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct() {
        $this->checkloginuser();
    }
    public function checkloginuser() {
        if (Auth::guard('admin')->check()){
            $dataUser = Auth::guard('admin')->user();
            view()->share('dataUserLogin', $dataUser);
        }
    }
}

