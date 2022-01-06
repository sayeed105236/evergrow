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
        $users=User::selectRaw('GROUP_CONCAT(users.user_name) all_user,max(u.user_name) sponsor_name,
        max(users.sponsor) sponsor,max(users.position) position,count(users.sponsor) active_sponsor,
        max(users.user_name) user_name')
            ->join('users as u', 'users.sponsor', '=', 'u.id')
            //->join('packages', 'users.package_id', '=', 'packages.id')
            ->groupBy('users.sponsor','users.position')
            ->where('users.position','!=',null)
            ->where('users.activation_status',1)
           // ->where('users.sponsor',259)
            ->get()->toArray();

        $results = array();
        foreach ($users as $key => $element) {
            $results[$element['sponsor_name']][] = $element;
        }

//dd($results);
        foreach ($results as $key => $result) {
            if (count($result) == 2) {

                $min_pair = min($result[0]['active_sponsor'], $result[1]['active_sponsor']);
                  //dd($min_pair);

                if ($min_pair == 1 || $min_pair == 3 || $min_pair == 7 || $min_pair == 15 || $min_pair == 30){
                    $pair_bonus = $min_pair * 2;
                    $pair_check = PairLog::where('sponsor_id',$result[0]['sponsor'])->pluck('pair')->toArray();
                   // dd($pair_check);
                    if (count($pair_check) >= 0){
                        $pair_given = array_intersect($pair_check, [1,3,7,15,30]);
                        //dd($pair_given);
//dd(!in_array($min_pair,$pair_given),$pair_given,$min_pair);

                        if (!in_array($min_pair,$pair_given)) {
                            $bonus_amount = new AddMoney();
                            $bonus_amount->user_id = $result[0]['sponsor'];
                            $bonus_amount->amount = $pair_bonus;
                            $bonus_amount->method = 'Pair Bonus';
                            $bonus_amount->save();

                            //store pair log

                            $pair_log = new PairLog();
                            $pair_log->sponsor_id = $result[0]['sponsor'];
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
