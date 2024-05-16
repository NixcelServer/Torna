<?php

namespace App\Console\Commands;

use App\Models\ExhibitionDetail;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;

class UpdateExhibitionStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-exhibition-status';
   // protected $signature = 'exhibitions:update-status';
    

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update status of exhibitions based on end dates';

    /**
     * Execute the console command.
     */

     public function __construct()
    {
        parent::__construct();
    }

    

    public function handle()
{
    $currentDate = Carbon::now()->format('Y-m-d');
    $exhibitions = ExhibitionDetail::where('active_status', 'active')->get();
    
    foreach($exhibitions as $exhibition) {
        $exhibitionDate = Carbon::parse($exhibition->ex_to_date);
        
        if ($exhibitionDate->lessThan($currentDate)) {
            ExhibitionDetail::where('tbl_ex_id', $exhibition->tbl_ex_id)
                ->update(['active_status' => 'Past']);
        }
    }
}

}

