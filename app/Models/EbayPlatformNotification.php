<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EbayPlatformNotification extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'headers' => 'json',
        'body' => 'json',
    ];
}
