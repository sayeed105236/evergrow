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
    $unit = new Unit;
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $unitId = substr(str_shuffle($chars), 0, 10);
    $unit->unit_code= $unitId;
    $unit->user_id= Auth::id();
    $unit->date= Carbon::today();
    $unit->save();

    $unit_buy= new AddMoney;

    $unit_buy->user_id = Auth::id();
    $unit_buy->amount = -($request->unit_amount);
    $unit_buy->method = 'Activation Charge For Unit';
    $unit_buy->status = 'approve';
    $unit_buy->created_at = Carbon::now();

    $unit_buy->save();
    return back()->with('unit_buy','Congratulations!! Your have successfully buy an Unit for 1 Usd!!');
  }



}
