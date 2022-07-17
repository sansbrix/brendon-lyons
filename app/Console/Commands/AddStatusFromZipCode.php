<?php

namespace App\Console\Commands;

use App\Models\Status;
use App\Models\ZipCode;
use Illuminate\Console\Command;

class AddStatusFromZipCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate_status';

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
        $zipCodeStatuses = ZipCode::all(['status'])->unique('status')->values()->toArray();
        foreach($zipCodeStatuses as $zip_code) {
            if($zip_code['status']) {
                $status = Status::where(['status' => $zip_code["status"]])->first();
                if(!$status && $zip_code["status"]) {
                    $status = Status::create(['status' => $zip_code["status"]]);
                }
                ZipCode::where('status',$zip_code["status"])->update(['status_id' => $status->id]);
            }
        }
    }
}
