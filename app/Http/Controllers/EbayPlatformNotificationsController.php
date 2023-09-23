<?php

namespace App\Http\Controllers;

use App\Models\EbayPlatformNotification;
use Illuminate\Http\Request;
use VaclavVanik\DomToArray\DomToArray;

class EbayPlatformNotificationsController extends Controller
{
    public function index(Request $request)
    {
        $ebayPlatformNotification = EbayPlatformNotification::create([
            'raw_content' => $request->getContent(),
            'headers' => $request->header(),
            'body' => [],
        ]);

        $dom = new \DOMDocument();
        $dom->loadXML($request->getContent());

        $body = DomToArray::toArray($dom);

        $ebayPlatformNotification->body = $body;
        $ebayPlatformNotification->save();


        return response('ok');
    }
}
