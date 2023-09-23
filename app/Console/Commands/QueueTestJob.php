<?php

namespace App\Console\Commands;

use App\Jobs\TestQueuedJob;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class QueueTestJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:queue-test-job';

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
        TestQueuedJob::dispatch();
    }
}
