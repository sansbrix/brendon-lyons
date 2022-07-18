<?php

namespace App\Console\Commands;

use App\Models\ZipCode;
use Illuminate\Console\Command;

class LeadingZerosInFront extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'leading_zeros_in_front';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $zipCodes = ZipCode::all();
        foreach($zipCodes as $zipCode) {
            $zipCode->update([
                'zip_code' => str_pad($zipCode->zip_code, 5, '0', STR_PAD_LEFT),
            ]);
        }

        print_r("Zip Code Updated Successfully /n");
    }
}
