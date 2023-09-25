<?php

namespace App\Services;

use App\Models\Item;
use SimpleXMLElement;

class EbayPlatformNotificationsService
{
    protected string $payload;

    protected $itemUpdateEvents = [
        'BidReceived',
        'ItemListed',
        'ItemRevised',
    ];

    protected $itemTransactionUpdateEvents = [
        'AuctionCheckoutComplete',
        'EndOfAuction',
        'FixedPriceTransaction',
    ];

    public function process(string $payload)
    {
        $this->payload = $payload;

        $xml = new SimpleXMLElement($this->payload);
        $soapBody = $xml->children('soapenv', true)->Body;

        $event = $this->getEvent($soapBody);


        if ($this->eventIsItemUpdateEvent($event)) {
            $this->updateItem($soapBody);
        }
    }

    protected function getEvent(SimpleXMLElement $soapBody): string
    {
        return (string) $soapBody->children()[0]->NotificationEventName;
    }

    protected function eventIsItemUpdateEvent($event)
    {
        return in_array($event, $this->itemUpdateEvents);
    }

    protected function updateItem(SimpleXMLElement $soapBody)
    {
        $ebayItem = $soapBody->children()[0]->Item;

        $mapper = new EbayItemMapper;

        $attributes = $mapper->mapToItemAttributes($ebayItem);

        Item::updateOrCreate(['ebay_id' => $ebayItem->ItemID], $attributes);
    }

    public function verifySignature($payload)
    {
        $xml = new SimpleXMLElement($payload);
        $soapHeader = $xml->children('soapenv', true)->Header;
        $soapBody = $xml->children('soapenv', true)->Body;

        $signature = (string) $soapHeader->children('ebl', true)->RequesterCredentials->NotificationSignature;
        $timestamp = (string) $soapBody->children()[0]->Timestamp;

        return $this->checkSignature($signature, $timestamp);
    }

    protected function checkSignature($signature, $timestamp)
    {
        $ebayCreds = config('ebay.mode') === 'production' ? config('ebay.production.credentials') : config('ebay.sandbox.credentials');

        $signatureMd5 = md5($timestamp . $ebayCreds['devId'] . $ebayCreds['appId'] . $ebayCreds['certId']);

        $sigCalc = base64_encode(pack("H*", $signatureMd5));

        return $signature === $sigCalc;
    }
}
