<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessEbayPlatformNotification;
use Illuminate\Http\Request;

class EbayPlatformNotificationsController extends Controller
{
    public function index(Request $request)
    {

        ProcessEbayPlatformNotification::dispatch($request->getContent());

        return response('ok');
    }
}
