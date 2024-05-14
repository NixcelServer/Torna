<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ExhibitionDetail;
use Illuminate\Support\Carbon;

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
        //$currentDate = now()->toDateString();
        $currentDate= Carbon::now()->format('Y-m-d');
        $exhibitions = ExhibitionDetail::where('active_status', 'active_status')->get();
        foreach($exhibitions as $exhibition)
        {
          $exhibitionDate =  Carbon::parse($exhibition->ex_to_date);
          $day=$exhibitionDate->diffInDays(currentDate);

          if($day > 0)
          {
            ExhibitionDetail::where('tbl_ex_id', $exhibition->tbl_ex_id)->update(['active_status' => 'inactive']);

          }
          \Log::info($day);
        }
        // // Fetch exhibitions whose end dates have passed
        // $exhibitions = ExhibitionDetail::where('ex_to_date', '<', $currentDate)
        //     ->where('active_status', 'Active')
        //     ->get();

        // // Update the active status to "Inactive"
        // foreach ($exhibitions as $exhibition) {
        //     $exhibition->active_status = 'Inactive';
        //     $exhibition->save();

        // }
        // \Log::info($exhibitions);
        // $this->info('Exhibition statuses updated successfully.');
    }
    
}
