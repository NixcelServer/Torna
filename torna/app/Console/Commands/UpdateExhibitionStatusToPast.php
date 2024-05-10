<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateExhibitionStatusToPast extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-exhibition-status-to-past';
    protected $description = 'Update status of past exhibitions';

    public function handle()
    {
        $currentDate = now()->toDateString();

        ExhibitionDetail::where('ex_from_date', '<', $currentDate)
            ->where('active_status', '!=', 'Past') // To avoid unnecessary updates
            ->update(['active_status' => 'Past']);

        $this->info('Status of past exhibitions updated successfully.');
    }

    /**
     * The console command description.
     *
     * @var string
     */
    
    /**
     * Execute the console command.
     */
   
}
