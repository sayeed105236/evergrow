<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AddMoney;
use Auth;
use Carbon\Carbon;

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
    public function Activate($id)
    {
      $data['user']=User::all();
      $data['deposit']=AddMoney::where('user_id',Auth::id())->first();

      $data['sum_deposit']=AddMoney::where('user_id',Auth::id())->where('status','approve')->sum('amount');

      return view('user.activation_package',compact('data'));
    }
    public function ActivatePackage(Request $request)
    {
      //dd($request);

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




      $sponsor_bonus = new AddMoney();
      $sponsor_bonus->user_id = $request['sponsor'];
      $sponsor_bonus->amount = '6';
      $sponsor_bonus->received_from= Auth::id();
      $sponsor_bonus->method = 'Sponsor Bonus';
      $sponsor_bonus->status = 'approve';
      $sponsor_bonus->created_at = Carbon::now();
      $sponsor_bonus->save();

      return back()->with('package_activated','Congratulations!! Your Pacakge is Now Activated');
    }

}
