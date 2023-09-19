<?php

namespace App\Console\Commands;

use App\Models\Item;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class SeedItems extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:seed-items';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $items = array(
            0 =>
            array(
                'id' => '83876',
                'name' => '2015 Upper Deck Star Rookie Connor McDavid SSP SP Rare RC Rookie Auto Autograph',
                'imageUrl' => 'https://i.ebayimg.com/00/s/MTAyNFg3Mzk=/z/F78AAOSwbR1hjY2f/$_1.JPG?set_id=880000500F',
                'format' => 'Fixed',
                'consignor' =>
                array(
                    'id' => 4,
                    'name' => 'D Cook',
                ),
                'currentPrice' => 6999.99,
                'availableQuantity' => 1,
                'views' => 5,
                'bids' => 0,
                'endsAt' => '2d 46m',
            ),
            1 =>
            array(
                'id' => '88941',
                'name' => '2014 Panini Spectra Peyton Manning 24/25 Jersey Auto Autograph',
                'imageUrl' => 'https://i.ebayimg.com/00/s/MTAyNFg3ODU=/z/RrUAAOSwTPBhtU2q/$_1.JPG?set_id=880000500F',
                'format' => 'Fixed',
                'consignor' =>
                array(
                    'id' => 4,
                    'name' => 'D Cook',
                ),
                'currentPrice' => 349.99,
                'availableQuantity' => 1,
                'views' => 1,
                'bids' => 0,
                'endsAt' => '2d 4h 24m',
            ),
            2 =>
            array(
                'id' => '90102',
                'name' => '2021 Topps Tier One Lou Brock /25 Auto Game Used Patch Jersey',
                'imageUrl' => 'https://i.ebayimg.com/00/s/OTcwWDEyODA=/z/O4oAAOSw8hFhv~sX/$_1.JPG?set_id=880000500F',
                'format' => 'Fixed',
                'consignor' =>
                array(
                    'id' => 4,
                    'name' => 'D Cook',
                ),
                'currentPrice' => 109.99,
                'availableQuantity' => 1,
                'views' => 13,
                'bids' => 0,
                'endsAt' => '10d 6h 47m',
            ),
            3 =>
            array(
                'id' => '95807',
                'name' => '2001 Upper Deck Game Jersey Johnny Bench Auto Autograph',
                'imageUrl' => 'https://i.ebayimg.com/00/s/OTk0WDEyODA=/z/GYEAAOSwFuJh9zn8/$_1.JPG?set_id=880000500F',
                'format' => 'Fixed',
                'consignor' =>
                array(
                    'id' => 4,
                    'name' => 'D Cook',
                ),
                'currentPrice' => 149.99,
                'availableQuantity' => 1,
                'views' => 2,
                'bids' => 0,
                'endsAt' => '21d 4h 30m',
            ),
            4 =>
            array(
                'id' => '95828',
                'name' => '2019 Topps Transcendant Gold Framed Deion Sanders 5/25 Auto Autograph',
                'imageUrl' => 'https://i.ebayimg.com/00/s/MTAyNFg3ODU=/z/RGIAAOSwTzxh9zn7/$_1.JPG?set_id=880000500F',
                'format' => 'Fixed',
                'consignor' =>
                array(
                    'id' => 4,
                    'name' => 'D Cook',
                ),
                'currentPrice' => 219.99,
                'availableQuantity' => 1,
                'views' => 6,
                'bids' => 0,
                'endsAt' => '21d 4h 30m',
            ),
            5 =>
            array(
                'id' => '96743',
                'name' => '2019 Panini Opulence USA Gold Metal Kevin Durant Jersey Auto Autograph',
                'imageUrl' => 'https://i.ebayimg.com/00/s/MTAyNFg2NzI=/z/qy0AAOSwTLtiAA5k/$_1.JPG?set_id=880000500F',
                'format' => 'Fixed',
                'consignor' =>
                array(
                    'id' => 4,
                    'name' => 'D Cook',
                ),
                'currentPrice' => 699.99,
                'availableQuantity' => 1,
                'views' => 6,
                'bids' => 0,
                'endsAt' => '26d 21h 14m',
            ),
            6 =>
            array(
                'id' => '100432',
                'name' => '2018 Panini Dominion Larry Bird /49 Jersey Autograph Auto',
                'imageUrl' => 'https://i.ebayimg.com/00/s/OTc4WDEyODA=/z/iXMAAOSwIvFiFxub/$_1.JPG?set_id=880000500F',
                'format' => 'Fixed',
                'consignor' =>
                array(
                    'id' => 4,
                    'name' => 'D Cook',
                ),
                'currentPrice' => 249.99,
                'availableQuantity' => 1,
                'views' => 3,
                'bids' => 0,
                'endsAt' => '14d 8h 53m',
            ),
            7 =>
            array(
                'id' => '102535',
                'name' => '2013 Panini Prizm #60 Larry Bird Auto Autograph',
                'imageUrl' => 'https://i.ebayimg.com/00/s/MTAyNFg3NzM=/z/oP8AAOSwgMhiK7t~/$_1.JPG?set_id=880000500F',
                'format' => 'Fixed',
                'consignor' =>
                array(
                    'id' => 4,
                    'name' => 'D Cook',
                ),
                'currentPrice' => 699.99,
                'availableQuantity' => 1,
                'views' => 0,
                'bids' => 0,
                'endsAt' => '2d 20m',
            ),
            8 =>
            array(
                'id' => '104385',
                'name' => '2019 Bowman Wander Samuel Franco Full Name RC Rookie Gem Mint PSA DNA 10 10 Auto',
                'imageUrl' => 'https://i.ebayimg.com/00/s/MTAyNFg2MDA=/z/ziUAAOSwbkRiQ8Dv/$_1.JPG?set_id=880000500F',
                'format' => 'Fixed',
                'consignor' =>
                array(
                    'id' => 4,
                    'name' => 'D Cook',
                ),
                'currentPrice' => 1299.99,
                'availableQuantity' => 1,
                'views' => 3,
                'bids' => 0,
                'endsAt' => '20d 6h 38m',
            ),
            9 =>
            array(
                'id' => '105901',
                'name' => '2020 Bowman 1st Edition Baseball Factory Sealed Hobby Box',
                'imageUrl' => 'https://i.ebayimg.com/00/s/MTAyM1g2MTc=/z/1aMAAOSw8a5iUfj2/$_1.JPG?set_id=880000500F',
                'format' => 'Fixed',
                'consignor' =>
                array(
                    'id' => 4,
                    'name' => 'D Cook',
                ),
                'currentPrice' => 799.99,
                'availableQuantity' => 1,
                'views' => 5,
                'bids' => 0,
                'endsAt' => '1h 29m',
            ),
            10 =>
            array(
                'id' => '107572',
                'name' => '2021 Bowman Chrome Baseball 12 Box Factory Sealed Hobby Case',
                'imageUrl' => 'https://i.ebayimg.com/00/s/OTYwWDEyODA=/z/DngAAOSwghBiNiQN/$_1.JPG?set_id=880000500F',
                'format' => 'Fixed',
                'consignor' =>
                array(
                    'id' => 4,
                    'name' => 'D Cook',
                ),
                'currentPrice' => 5099.99,
                'availableQuantity' => 1,
                'views' => 6,
                'bids' => 0,
                'endsAt' => '15d 27m',
            ),
            11 =>
            array(
                'id' => '109771',
                'name' => '2021 National Treasures 1st FOTL Football Factory Sealed Box Mac Lawrence Fields',
                'imageUrl' => 'https://i.ebayimg.com/00/s/MTIwMFgxNjAw/z/86QAAOSwW0didx~v/$_1.JPG?set_id=8800005007',
                'format' => 'Fixed',
                'consignor' =>
                array(
                    'id' => 4,
                    'name' => 'D Cook',
                ),
                'currentPrice' => 5999.99,
                'availableQuantity' => 5,
                'views' => 6,
                'bids' => 0,
                'endsAt' => '8h 31m',
            ),
            12 =>
            array(
                'id' => '110620',
                'name' => '2019 Panini Opulence Gold Medal USA Basketball Kevin Garnett 25/25 Auto',
                'imageUrl' => 'https://i.ebayimg.com/00/s/ODY2WDEyODA=/z/7X8AAOSwVwFib03I/$_1.JPG?set_id=880000500F',
                'format' => 'Fixed',
                'consignor' =>
                array(
                    'id' => 4,
                    'name' => 'D Cook',
                ),
                'currentPrice' => 299.99,
                'availableQuantity' => 1,
                'views' => 7,
                'bids' => 0,
                'endsAt' => '7d 2h 23m',
            ),
            13 =>
            array(
                'id' => '115599',
                'name' => '2018 Spectra Neon Pink Prizm Josh Allen Jersey #17/25 Patch RC SGC 8 10 Auto',
                'imageUrl' => 'https://i.ebayimg.com/00/s/MTAyNFg2MzQ=/z/p3IAAOSwuxRippXT/$_1.JPG?set_id=880000500F',
                'format' => 'Fixed',
                'consignor' =>
                array(
                    'id' => 4,
                    'name' => 'D Cook',
                ),
                'currentPrice' => 3999.99,
                'availableQuantity' => 1,
                'views' => 5,
                'bids' => 0,
                'endsAt' => '3d 5h 48m',
            ),
            14 =>
            array(
                'id' => '119667',
                'name' => '2020 Panini Donruss Optic Basketball Factory Sealed Retail 24 Box Case',
                'imageUrl' => 'https://i.ebayimg.com/00/s/OTYwWDEyODA=/z/190AAOSwwNxiz2rG/$_1.JPG?set_id=880000500F',
                'format' => 'Fixed',
                'consignor' =>
                array(
                    'id' => 4,
                    'name' => 'D Cook',
                ),
                'currentPrice' => 2999.99,
                'availableQuantity' => 1,
                'views' => 3,
                'bids' => 0,
                'endsAt' => '4d 5h 8m',
            ),
            15 =>
            array(
                'id' => '121555',
                'name' => '2021 Topps Dynasty Dale Murphy #1/10 Patch Jersey Auto Autograph',
                'imageUrl' => 'https://i.ebayimg.com/00/s/ODUwWDEyODA=/z/I~YAAOSw619i3bEt/$_1.JPG?set_id=880000500F',
                'format' => 'Fixed',
                'consignor' =>
                array(
                    'id' => 4,
                    'name' => 'D Cook',
                ),
                'currentPrice' => 269.99,
                'availableQuantity' => 1,
                'views' => 18,
                'bids' => 0,
                'endsAt' => '15d 1h ',
            ),
            16 =>
            array(
                'id' => '123462',
                'name' => '1987 Topps Red Ink #362 Jim Kelly Autograph RC Rookie Gem Mint PSA DNA 10 Auto',
                'imageUrl' => 'https://i.ebayimg.com/00/s/MTAyNFg2MTA=/z/hV4AAOSw-d1i7Xjd/$_1.JPG?set_id=880000500F',
                'format' => 'Fixed',
                'consignor' =>
                array(
                    'id' => 4,
                    'name' => 'D Cook',
                ),
                'currentPrice' => 199.99,
                'availableQuantity' => 1,
                'views' => 4,
                'bids' => 0,
                'endsAt' => '26d 16m',
            ),
            17 =>
            array(
                'id' => '126475',
                'name' => '2019 Panini Immaculate Collection Moments John Stockton 40/49 Auto Autograph',
                'imageUrl' => 'https://i.ebayimg.com/00/s/MTAyNFg3NTU=/z/XiAAAOSw1fljArT0/$_1.JPG?set_id=880000500F',
                'format' => 'Fixed',
                'consignor' =>
                array(
                    'id' => 4,
                    'name' => 'D Cook',
                ),
                'currentPrice' => 179.99,
                'availableQuantity' => 1,
                'views' => 5,
                'bids' => 0,
                'endsAt' => '12d 2h 50m',
            ),
            18 =>
            array(
                'id' => '126476',
                'name' => '2014 Panini Immaculate Collection Shadowbox Larry Bird 29/35 Auto Autograph',
                'imageUrl' => 'https://i.ebayimg.com/00/s/MTAyM1g3NjU=/z/ujUAAOSw~5xjArT7/$_1.JPG?set_id=880000500F',
                'format' => 'Fixed',
                'consignor' =>
                array(
                    'id' => 4,
                    'name' => 'D Cook',
                ),
                'currentPrice' => 499.99,
                'availableQuantity' => 1,
                'views' => 3,
                'bids' => 0,
                'endsAt' => '12d 2h 50m',
            ),
            19 =>
            array(
                'id' => '126478',
                'name' => '2021 Topps Finest #FA1 Ichiro Suzuki Auto Autograph',
                'imageUrl' => 'https://i.ebayimg.com/00/s/MTAyNFg3NTU=/z/s-4AAOSwP9FjArT3/$_1.JPG?set_id=880000500F',
                'format' => 'Fixed',
                'consignor' =>
                array(
                    'id' => 4,
                    'name' => 'D Cook',
                ),
                'currentPrice' => 299.99,
                'availableQuantity' => 1,
                'views' => 14,
                'bids' => 0,
                'endsAt' => '12d 2h 50m',
            ),
            20 =>
            array(
                'id' => '126482',
                'name' => '2009 Topps Signature Basketball Bill Russell 475/499 Auto Autograph',
                'imageUrl' => 'https://i.ebayimg.com/00/s/MTAyNFg3NDI=/z/QPwAAOSwNZ1jArT7/$_1.JPG?set_id=880000500F',
                'format' => 'Auction',
                'consignor' =>
                array(
                    'id' => 4,
                    'name' => 'D Cook',
                ),
                'currentPrice' => 599.99,
                'availableQuantity' => 1,
                'views' => 4,
                'bids' => 0,
                'endsAt' => '12d 2h 50m',
            ),
            21 =>
            array(
                'id' => '126488',
                'name' => '2019 National Treasures Reggie Jackson 28/49 Auto Autograph Jersey',
                'imageUrl' => 'https://i.ebayimg.com/00/s/MTAyNFg3NTk=/z/93kAAOSwf1BjArT9/$_1.JPG?set_id=880000500F',
                'format' => 'Fixed',
                'consignor' =>
                array(
                    'id' => 4,
                    'name' => 'D Cook',
                ),
                'currentPrice' => 109.99,
                'availableQuantity' => 1,
                'views' => 0,
                'bids' => 0,
                'endsAt' => '12d 2h 50m',
            ),
            22 =>
            array(
                'id' => '126490',
                'name' => '1999 Upper Deck Century Legends Oscar Robertson Auto Autograph',
                'imageUrl' => 'https://i.ebayimg.com/00/s/MTAyM1g3NDg=/z/mJMAAOSwprRjArT9/$_1.JPG?set_id=880000500F',
                'format' => 'Fixed',
                'consignor' =>
                array(
                    'id' => 4,
                    'name' => 'D Cook',
                ),
                'currentPrice' => 129.99,
                'availableQuantity' => 1,
                'views' => 14,
                'bids' => 0,
                'endsAt' => '12d 2h 50m',
            ),
            23 =>
            array(
                'id' => '127392',
                'name' => '2018 Panini NFL Stickers #24 Josh Allen RC Rookie Gem Mint PSA DNA 10 9 Auto',
                'imageUrl' => 'https://i.ebayimg.com/00/s/MTAyNFg2MDM=/z/ofAAAOSwvr5jBtGK/$_1.JPG?set_id=880000500F',
                'format' => 'Fixed',
                'consignor' =>
                array(
                    'id' => 4,
                    'name' => 'D Cook',
                ),
                'currentPrice' => 799.99,
                'availableQuantity' => 1,
                'views' => 15,
                'bids' => 0,
                'endsAt' => '15d 5h 41m',
            ),
            24 =>
            array(
                'id' => '128753',
                'name' => '2020 Panini Immaculate Collection Vince Carter #1/10 Auto Autograph Jumbo Patch',
                'imageUrl' => 'https://i.ebayimg.com/00/s/MTAyNFg3MzM=/z/djEAAOSwKcBi9HPh/$_1.JPG?set_id=880000500F',
                'format' => 'Fixed',
                'consignor' =>
                array(
                    'id' => 4,
                    'name' => 'D Cook',
                ),
                'currentPrice' => 799.99,
                'availableQuantity' => 1,
                'views' => 8,
                'bids' => 0,
                'endsAt' => '20d 20h 57m',
            ),
        );

        foreach ($items as $itemData) {
            Item::create([
                'name' => $itemData['name'],
                'ebay_id' => $itemData['id'],
                'image_url' => $itemData['imageUrl'],
                'format' => strtolower($itemData['format']),
                'name' => $itemData['name'],
                'current_price' => $itemData['currentPrice'] * 100,
                'available_quantity' => $itemData['availableQuantity'],
                'views' => $itemData['views'],
                'bids' => $itemData['bids'],
                'ends_at' => now(),
            ]);
        }
    }
}
