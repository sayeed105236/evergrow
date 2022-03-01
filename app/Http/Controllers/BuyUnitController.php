<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddMoney;
use App\Models\User;
use App\Models\Unit;
use Carbon\Carbon;
use Auth;

class BuyUnitController extends Controller
{
  public function __construct()
  {

      //session()->put('checkout', true);
      $this->middleware('auth');
  }


  public function index($id)
  {
    $data['user']=User::all();
    $data['deposit']=AddMoney::where('user_id',Auth::id())->first();

    $data['sum_deposit']=AddMoney::where('user_id',Auth::id())->where('status','approve')->sum('amount');
      return view('user.buy_unit',compact('data'));
  }
  public function buy_unit(Request $request)
  {

    $unit_get= Unit::orderBy('id','ASC')->get()->toArray();
    for ($i=0; $i <count($unit_get) ; $i++) {

      $unit_update= Unit::find($unit_get[$i]['id']);
      $unit_update->unit_count= count($unit_get)-$i;
      if ($unit_update->unit_count==4) {
        $unit_update->unit_level= 1;
        $unit_bonus = new Addmoney;
        $unit_bonus->user_id =  $unit_get[$i]['user_id'];
        $unit_bonus->amount = 0.4;
        $unit_bonus->method = 'Unit Bonus';
        $unit_bonus->status = 'approve';
        $unit_bonus->save();
      }elseif ($unit_update->unit_count==16) {
          $unit_update->unit_level= 2;
          $unit_bonus = new Addmoney;
          $unit_bonus->user_id =  $unit_get[$i]['user_id'];
          $unit_bonus->amount = 1.6;
          $unit_bonus->method = 'Unit Bonus';
          $unit_bonus->status = 'approve';
          $unit_bonus->save();
      }elseif ($unit_update->unit_count==64) {
        $unit_update->unit_level= 3;
        $unit_bonus = new Addmoney;
        $unit_bonus->user_id =  $unit_get[$i]['user_id'];
        $unit_bonus->amount = 6.4;
        $unit_bonus->method = 'Unit Bonus';
        $unit_bonus->status = 'approve';
        $unit_bonus->save();
      }elseif ($unit_update->unit_count==64) {
        $unit_update->unit_level= 4;
        $unit_bonus = new Addmoney;
        $unit_bonus->user_id =  $unit_get[$i]['user_id'];
        $unit_bonus->amount = 25.6;
        $unit_bonus->method = 'Unit Bonus';
        $unit_bonus->status = 'approve';
        $unit_bonus->save();
      }elseif ($unit_update->unit_count==64) {
        $unit_update->unit_level= 5;
        $unit_bonus = new Addmoney;
        $unit_bonus->user_id =  $unit_get[$i]['user_id'];
        $unit_bonus->amount = 409.6;
        $unit_bonus->method = 'Unit Bonus';
        $unit_bonus->status = 'approve';
        $unit_bonus->save();
      }

      $unit_update->save();

    }
    // dd($unit_get);
    $unit = new Unit;
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $unitId = substr(str_shuffle($chars), 0, 10);
    $unit->unit_code= $unitId;
    $unit->user_id= Auth::id();
    $unit->date= Carbon::today();
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
    return back()->with('unit_buy','Congratulations!! Your have successfully buy an Unit for 1 Usd!!');
  }



}
