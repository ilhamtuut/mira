<?php

namespace App\Console\Commands;

use DB;
use App\EarnDay;
use App\Staking;
use App\Setting;
use App\StakingEarn;
use App\LogGenerate;
use App\HistoryTransaction;
use Illuminate\Console\Command;

class GenerateEarn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:earn';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Earn';

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
     * @return mixed
     */
    public function handle()
    {
        $datenow = date('Y-m-d');
        $data = StakingEarn::whereDate('created_at','<',$datenow)->get();
        foreach ($data as $key => $value) {
            echo ++$key." - \n";
            $staking_earn_id = $value->id;
            $start_date = date('Y-m-d',strtotime('+10 day', strtotime($value->created_at)));
            $expired_date = $value->date_expired;
            if($datenow <= $expired_date){
                if(!$value->earns()->whereDate('created_at', $datenow)->first()){
                    $earn = $value->earn / $value->stakings->duration;
                    EarnDay::create([
                        'staking_earn_id' => $staking_earn_id,
                        'earn' => $earn,
                        'status' => 1
                    ]);
                }

                $check = $value->earns()->where('status', 2)->orderBy('id','desc')->first();
                if($check){
                    $start_date = date('Y-m-d',strtotime('+10 day', strtotime($check->created_at)));
                }
                if($start_date == $datenow){
                    EarnDay::where('staking_earn_id',$staking_earn_id)
                        ->whereDate('created_at','<',$datenow)
                        ->update(['status' => 2]);
                }
            }else{
                $value->status = 2;
                $value->save();
            }
        }
        LogGenerate::create([
            'activity'=>'Generate Earn End',
            'status'=>1
        ]);
        echo "Selesai\n";
    }
}
