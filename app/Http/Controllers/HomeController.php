<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AddMoney;
use Auth;
use Carbon\Carbon;
use App\Models\Settings;
//use App\Models\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function binary_count($placement_id,$pos)
    {
      //dd($placement_id,$pos);
       if ($pos == 1){
            $pos = 'left_count';
       }else{
           $pos = 'right_count';
       }

        while($placement_id != '' && $pos != ''){

            DB::statement("UPDATE users SET $pos = `$pos`+1 WHERE user_name = '$placement_id'");

            //$this->is_pair_generate($placement_id);
            $pos= $this->find_position_id($placement_id);
            $placement_id= $this->find_placement_id($placement_id);

        }

    }
    public function find_position_id($placement_id){

            $user_id = User::where('user_name',$placement_id)->first();
            $pos= $user_id->position;
            if ($pos == 1){
                $pos = 'left_count';
            }elseif($pos == 2){
                $pos = 'right_count';
            }

            return $pos;

    }
    public function find_placement_id($placement_id){

            $user_id = User::where('user_name',$placement_id)->first();
            return $user_id->placement_id;
    }
    public function Activate($id)
    {

      $data['user']=User::all();
      $data['deposit']=AddMoney::where('user_id',Auth::id())->first();

      $data['sum_deposit']=AddMoney::where('user_id',Auth::id())->where('status','approve')->sum('amount');

      return view('user.activation_package',compact('data'));
    }
    public function ActivatePackage(Request $request)
    {
        $user_data=User::where('id',Auth::id())->get()->first();
        //dd($user_data->placement_id);
        $this->binary_count($user_data->placement_id,$user_data->position);
      $membership=User::where('sponsor',$request['sponsor'])->count();
      //dd($membership);
      if($membership > 4)
      {
        $membership_bonus = User::find($request['sponsor']);
        //$member=$request['sponsor'];
        //$date= date('Y-m-d');
        $membership_bonus->membership_status= '1';
        //DB::statement("UPDATE users SET membership_status = `0`+1 WHERE id = '$member'");
        $membership_bonus->save();

      }

      $deduct_amount = new AddMoney();
      $deduct_amount->user_id = Auth::id();
      $deduct_amount->amount = -($request['amount']);
      $deduct_amount->method = 'Activation Charge';
      $deduct_amount->status = 'approve';
      $deduct_amount->created_at = Carbon::now();

      $deduct_amount->save();

      $deduct = User::find(Auth::user()->id);
      $deduct->activation_status= '1';

      $deduct->save();


      $settings= Settings::first();
      //dd($settings->sponsor_bonus);

      $sponsor_bonus = new AddMoney();
      $sponsor_bonus->user_id = $request['sponsor'];
      $sponsor_bonus->amount = $settings->sponsor_bonus;
      $sponsor_bonus->received_from= Auth::id();
      $sponsor_bonus->method = 'Sponsor Bonus';
      $sponsor_bonus->status = 'approve';
      $sponsor_bonus->created_at = Carbon::now();

      $sponsor_bonus->save();

      return back()->with('package_activated','Congratulations!! Your Package is Now Activated');
    }

}
