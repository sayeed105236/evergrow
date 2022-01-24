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
          $left_count= $result->left_active;
          $right_count= $result->right_active;

            if ($left_count != 0 && $right_count !=0 ) {
                //dd($left_count,$right_count);


                $min_pair = min($left_count,$right_count );

                switch($min_pair) {
                  case $min_pair == 1 || $min_pair < 3:
                            //$answer = (stripos($array[$i]['word'], 'Button') !== FALSE) ? 'Yes' : 'No';
                            $left = $left_count - 1;
                            $right = $right_count - 1;
                            $pair_bonus = 1*2;
                            $pair= 1;
                            break;
                        case $min_pair == 3 || $min_pair < 7:
                        $left = $left_count - 3;
                        $right = $right_count - 3;
                        $pair_bonus = 3*2;
                        $pair= 3;
                            //$answer = (stripos($array[$i]['word'], 'Input') !== FALSE) ? 'Yes' : 'No';
                            break;
                            case $min_pair == 7 || $min_pair < 15:
                            $left = $left_count - 7;
                            $right = $right_count - 7;
                            $pair_bonus = 7*2;
                            $pair=7;
                                //$answer = (stripos($array[$i]['word'], 'Input') !== FALSE) ? 'Yes' : 'No';
                                break;
                                case $min_pair == 15 || $min_pair < 30:
                                $left = $left_count - 15;
                                $right = $right_count - 15;
                                $pair_bonus = 15 * 2;
                                $pair=15;
                                    //$answer = (stripos($array[$i]['word'], 'Input') !== FALSE) ? 'Yes' : 'No';
                                    break;
                                    case $min_pair == 30 || $min_pair < 50:
                                    $left = $left_count - 30;
                                    $right = $right_count - 30;
                                    $pair_bonus = 30 * 2;
                                    $pair = 30;
                                        //$answer = (stripos($array[$i]['word'], 'Input') !== FALSE) ? 'Yes' : 'No';
                                        break;

                                        case $min_pair == 50|| $min_pair < 100:
                                        $left = $left_count - 50;
                                        $right = $right_count - 50;
                                        $pair_bonus = 50 * 2;
                                        $pair= 50;
                                            //$answer = (stripos($array[$i]['word'], 'Input') !== FALSE) ? 'Yes' : 'No';
                                            break;
                                            case $min_pair >= 100:
                                            $left = $left_count - 100;
                                            $right = $right_count - 100;
                                            $pair_bonus = 100 * 2;
                                            $pair = 100;
                                                //$answer = (stripos($array[$i]['word'], 'Input') !== FALSE) ? 'Yes' : 'No';
                                                break;


                              }
                  //dd($left,$right);

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
                  $pair_log->pair = $pair;
                  $pair_log->status = 1;


                  $pair_log->save();

                  $update = User::find($result->id);
                  if ($left<$right ) {
                      $update->left_active= '0';
                      $update->right_active= $right;
                      $update->save();
                  }elseif ($left>=$right) {
                    $update->left_active= $left;
                    $update->right_active= '0';
                    $update->save();
                  }



            }
        }
        $this->info('Successfully added Pair bonus.');
    }

}
