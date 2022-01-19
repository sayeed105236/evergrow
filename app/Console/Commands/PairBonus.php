<?php

namespace App\Console\Commands;

use App\Models\AddMoney;
use App\Models\PairLog;
use App\Models\User;
use Illuminate\Console\Command;

class PairBonus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pairbonus:daily';

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

        //return Command::SUCCESS;
        $results= User::all();



//dd($results);
        foreach ($results as $key => $result) {
          $left_count= $result->left_count;
          $right_count= $result->right_count;

            if ($left_count != 0 && $right_count !=0 ) {
                //dd($left_count,$right_count);


                $min_pair = min($left_count,$right_count );
                  //dd($min_pair);

                if ($min_pair == 1 || $min_pair == 3 || $min_pair == 7 || $min_pair == 15 || $min_pair == 30 || $min_pair == 50 || $min_pair == 100){
                    $pair_bonus = $min_pair * 2;
                    $pair_check = PairLog::where('sponsor_id',$result->id)->pluck('pair')->toArray();
                  //  dd($pair_check);
                    if (count($pair_check) >= 0){
                        $pair_given = array_intersect($pair_check, [1,3,7,15,30,50,100]);
                      //  dd($pair_given);
                      //    dd(!in_array($min_pair,$pair_given),$pair_given,$min_pair);

                        if (!in_array($min_pair,$pair_given)) {
                            $bonus_amount = new AddMoney();
                            $bonus_amount->user_id = $result->id;
                            $bonus_amount->amount = $pair_bonus;
                            $bonus_amount->type = 'Credit';
                            $bonus_amount->method = 'Pair Bonus';
                            $bonus_amount->status = 'approve';
                            $bonus_amount->save();

                            //store pair log

                            $pair_log = new PairLog();
                            $pair_log->sponsor_id = $result->id;
                            $pair_log->pair = $min_pair;
                            $pair_log->status = 1;


                            $pair_log->save();

                        }
                    }

                }

            }
        }
        $this->info('Successfully added Pair bonus.');
    }

}
