<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Broadcasting\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;

class SeedPost implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    // public $uniqueFor = 3600;
 
    // /**
    //  * Get the unique ID for the job.
    //  */
    // public function uniqueId(): string
    // {
    //     return $this->user->id;
    // }
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Artisan::call('db:seed');
    }
}
