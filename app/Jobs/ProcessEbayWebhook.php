<?php

namespace App\Jobs;

use App\Models\EbayPlatformNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessEbayWebhook implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $headers;
    public $payload;

    /**
     * Create a new job instance.
     */
    public function __construct($headers, $payload)
    {
        $this->headers = $headers;
        $this->payload = $payload;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        EbayPlatformNotification::create([
            'raw_content' => $this->payload,
            'headers' => $this->headers,
            'body' => [],
        ]);
    }
}
