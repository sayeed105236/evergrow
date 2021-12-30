<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

use App\Models\AddMoney;

class FrontendController extends Controller
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
      //dd($data);
      return view('user.home',compact('data'));
    }
    public function sponsor_bonus($id)
    {
      $incomeData = AddMoney::where('user_id',Auth::id())->where('method','Sponsor Bonus')->get();
      return view('user.sponsor_bonus',compact('incomeData'));
    }
    public function transferReport()
    {
        $transferData = AddMoney::where('user_id',Auth::id())->where('method','Transfer')->get();
        return view('user.transfer_history',compact(['transferData']));
    }
    public function MyTeam(User $query,$id)
    {

        $user = User::where('id', $id)->first();
        //$allChildren = User::pluck('name','id')->all();
        return view('user.my_team',compact(['user']));
    }





}
