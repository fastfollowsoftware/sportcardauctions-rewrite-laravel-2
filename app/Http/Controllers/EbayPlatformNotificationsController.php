<?php

namespace App\Http\Controllers;

use App\Models\EbayPlatformNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use VaclavVanik\DomToArray\DomToArray;

class EbayPlatformNotificationsController extends Controller
{
    public function index(Request $request)
    {
        Log::info("ebay platform notification: " . $request->getContent());
        $dom = new \DOMDocument();
        $dom->loadXML($request->getContent());

        $body = DomToArray::toArray($dom);

        EbayPlatformNotification::create([
            'headers' => $request->header(),
            'body' => $body,
        ]);

        return response('ok');
    }
}
