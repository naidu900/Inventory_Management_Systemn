<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Log;

class ProcessDataJob implements ShouldQueue
{
    use Queueable, Dispatchable, InteractsWithQueue, SerializesModels;

    protected $data;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Validate that data is not empty
        if (empty($this->data)) {
            Log::error("No data provided to process.");
            return;
        }

        // Log the data (convert it to string if it's an array or object)
        Log::info("Processing Data: " . json_encode($this->data));

        // Add your logic for processing data here
        try {
            // Your data processing logic
        } catch (\Exception $e) {
            Log::error("Error processing data: " . $e->getMessage());
        }
    }
}
