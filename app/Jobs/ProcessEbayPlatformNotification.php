<?php

namespace App\Jobs;

use App\Services\EbayPlatformNotificationsService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessEbayPlatformNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $payload;

    /**
     * Create a new job instance.
     */
    public function __construct(string $payload)
    {
        $this->payload = $payload;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $ebayPlatformNotificationsService = new EbayPlatformNotificationsService();
        $ebayPlatformNotificationsService->process($this->payload);
    }
}
