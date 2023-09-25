<?php

namespace App\Services\Ebay;

use App\Enums\ItemFormatEnum;
use Illuminate\Support\Carbon;
use SimpleXMLElement;

class EbayItemMapper
{
    public function mapToItemAttributes(SimpleXMLElement $ebayItem)
    {
        $result = [
            'ebay_id' => (string) $ebayItem->ItemID,
            'image_url' => (string) $ebayItem->PictureDetails->PictureURL,
            'name' => (string) $ebayItem->Title,
            'format' => $this->mapListingTypeToFormat((string) $ebayItem->ListingType),
            'current_price' => (int) round(((float) $ebayItem->SellingStatus->CurrentPrice) * 100),
            'available_quantity' => (int) $ebayItem->Quantity,
            'views' => (int) $ebayItem->WatchCount, // TODO: this isn't included by default
            'bids' => (int) $ebayItem->SellingStatus->BidCount,
            'ends_at' => Carbon::parse((string) $ebayItem->ListingDetails->EndTime),
        ];

        return $result;
    }

    protected function mapListingTypeToFormat(string $listingType)
    {
        switch ($listingType) {
            case 'Auction':
            case 'Chinese':
                return ItemFormatEnum::auction();
            case 'FixedPriceItem':
                return ItemFormatEnum::fixedPrice();
            default:
                throw new \Exception("Listing type {$listingType} not mapped");
        }
    }
}
