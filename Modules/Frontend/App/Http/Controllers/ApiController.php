<?php

namespace Modules\Frontend\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    public function loginAsTaxpayerSystem()
    {
        return view('frontend::api.login-as-taxpayer-system');
    }

    public function loginAsIntermediarySystem()
    {
        return view('frontend::api.login-as-intermediary-system');
    }
}
