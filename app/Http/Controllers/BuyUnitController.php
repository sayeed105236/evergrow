<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddMoney;
use App\Models\User;
use App\Models\Unit;
use Carbon\Carbon;
use Auth;
use DB;

class BuyUnitController extends Controller
{
  public function __construct()
  {

      //session()->put('checkout', true);
      $this->middleware('auth');
  }


  public function index($id)
  {
    $lastid = DB::table('units')->latest('id')->first();

    $data['user']=User::all();
    $data['deposit']=AddMoney::where('user_id',Auth::id())->first();

    $data['sum_deposit']=AddMoney::where('user_id',Auth::id())->where('status','approve')->sum('amount');
      return view('user.buy_unit',compact('data','lastid'));
  }
  public function buy_unit(Request $request)
  {
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $unitId = substr(str_shuffle($chars), 0, 10);


    $current_date_data= Unit::where('user_id',Auth::id())->select("*")->whereDate('created_at',Carbon::today())->count('id');
    if ($current_date_data>=500) {
        return back()->with('unit_limit','Sorry!! Your daily limit to buy unit Exceeded!!');
    }else {

      //$unit_get= Unit::orderBy('id','ASC')->get()->toArray();
        $unit_get= Unit::where('first_pos', '=', null)
        ->orWhere('second_pos','=',null)
        ->orWhere('third_pos','=',null)
        ->orWhere('forth_pos','=',null)
        ->orderBy('id','ASC')->first();
        //dd(is_null($unit_get->first_pos));
        $unit_update= Unit::find($unit_get->id);

        if (is_null($unit_get->first_pos)) {
          $unit_update->first_pos=$unitId;

        }elseif (is_null($unit_get->second_pos)) {
          $unit_update->second_pos=$unitId;
        }elseif (is_null($unit_get->third_pos)) {
          $unit_update->third_pos=$unitId;
        }elseif (is_null($unit_get->forth_pos)) {
          $unit_update->forth_pos=$unitId;
          $unit_update->unit_level=1;
          $unit_bonus = new Addmoney;
          $unit_bonus->user_id =  $unit_get->user_id;
          $unit_bonus->amount = 0.4;
          $unit_bonus->method = 'Unit Bonus';
          $unit_bonus->status = 'approve';
          $unit_bonus->save();

        }



    $unit_update->save();

    $unit = new Unit;
    //$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    //$unitId = substr(str_shuffle($chars), 0, 10);
    $unit->unit_code= $unitId;
    $unit->user_id= Auth::id();
    $unit->date= Carbon::today();
    $unit->placement_id=$request->placement_id;
    $unit->save();
    $unit_get= Unit::orderBy('id','ASC')->get();

    $unit_buy= new AddMoney;

    $unit_buy->user_id = Auth::id();
    $unit_buy->amount = -($request->unit_amount);
    $unit_buy->method = 'Activation Charge For Unit';
    $unit_buy->status = 'approve';
    $unit_buy->type = 'Debit';
    $unit_buy->created_at = Carbon::now();

    $unit_buy->save();


    $unit_pos_count= Unit::where('first_pos', '!=', null)
    ->orWhere('second_pos','!=',null)
    ->orWhere('third_pos','!=',null)
    ->orWhere('forth_pos','!=',null)
    ->orderBy('id','ASC')->get()->toArray();
  //  $placement_id= $this->find_placement_id($unit_pos_count['forth_pos']);
  //dd($unit_pos_count);
  foreach ($unit_pos_count as  $value) {

    if(!empty($value['forth_pos'])){


      //  DB::statement("UPDATE units SET 'unit_level' = `unit_level`+1 WHERE unit_code = '$value['forth_pos']'");
        $placement_id= $this->find_placement_id($value['forth_pos']);
        //dd($placement_id,$value['unit_code'] );
        if ($placement_id != 0) {

          $unit_level_update = Unit::where('unit_code',$value['unit_code'])->first();
          //dd($unit_level_update);
          $unit_level_update->unit_level= $placement_id;
          //$unit_level_update= $placement_id;
          $unit_level_update->save();
        }

    }
  }






    }
    return back()->with('unit_buy','Congratulations!! Your have successfully buy an Unit for 1 Usd!!');


  }
  public function find_placement_id($placement_id){
    //dd($placement_id);

      $unit_id = Unit::where('unit_code',$placement_id)->first();
      //dd($unit_id,$placement_id);
      if ($unit_id->unit_level == 1) {
        $unit_bonus = new Addmoney;
        $unit_bonus->user_id =  $unit_id->user_id;
        $unit_bonus->amount = 1.6;
        $unit_bonus->method = 'Unit Bonus';
        $unit_bonus->status = 'approve';
        $unit_bonus->save();
        return 2;
      }elseif ($unit_id->unit_level == 2) {
        $unit_bonus = new Addmoney;
        $unit_bonus->user_id =  $unit_id->user_id;
        $unit_bonus->amount = 6.4;
        $unit_bonus->method = 'Unit Bonus';
        $unit_bonus->status = 'approve';
        $unit_bonus->save();
        return 3;
      }elseif ($unit_id->unit_level == 3) {
        $unit_bonus = new Addmoney;
        $unit_bonus->user_id =  $unit_id->user_id;
        $unit_bonus->amount =  25.6;
        $unit_bonus->method = 'Unit Bonus';
        $unit_bonus->status = 'approve';
        $unit_bonus->save();
        return 4;
      }elseif ($unit_id->unit_level == 4) {
        $unit_bonus = new Addmoney;
        $unit_bonus->user_id =  $unit_id->user_id;
        $unit_bonus->amount = 409.6;
        $unit_bonus->method = 'Unit Bonus';
        $unit_bonus->status = 'approve';
        $unit_bonus->save();
        return 5;

      }else {
        return 0;
      }

  }




}
