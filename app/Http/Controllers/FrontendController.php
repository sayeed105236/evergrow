<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

use App\Models\AddMoney;
use App\Models\Withdraw;
use App\Models\Unit;

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
    public function pair_bonus($id)
    {
      $incomeData = AddMoney::where('user_id',Auth::id())->where('method','Pair Bonus')->get();
      return view('user.pair_bonus',compact('incomeData'));
    }
    public function profit_bonus($id)
    {
      $incomeData = AddMoney::where('user_id',Auth::id())->where('method','Profit Bonus')->get();
      return view('user.profit_bonus',compact('incomeData'));
    }
    public function rank_bonus($id)
    {
      $incomeData = AddMoney::where('user_id',Auth::id())->where('method','Rank Bonus')->get();
      return view('user.rank_bonus',compact('incomeData'));
    }
    public function club_bonus($id)
    {
      $incomeData = AddMoney::where('user_id',Auth::id())->where('method','Club Bonus')->get();
      return view('user.club_bonus',compact('incomeData'));
    }
    public function unit_bonus($id)
    {
      $incomeData = AddMoney::where('user_id',Auth::id())->where('method','Unit Bonus')->get();
      return view('user.unit_bonus',compact('incomeData'));
    }
    public function transferReport()
    {
        $transferData = AddMoney::where('user_id',Auth::id())->where('method','Transfer')->get();
        return view('user.transfer_history',compact(['transferData']));
    }
    public function UnitBuyReport($id)
    {
        $transferData = Unit::where('user_id',Auth::id())->get();
        return view('user.unit_buy_history',compact(['transferData']));
    }
    public function withdrawReport()
    {
        $transferData = Withdraw::where('user_id',Auth::id())->get();
        return view('user.withdraw_history',compact(['transferData']));
    }
    public function MyTeam(User $query,$id)
    {

        $user = User::where('id', $id)->first();
        //$allChildren = User::pluck('name','id')->all();
        return view('user.my_team',compact(['user']));
    }
    public function Profile($id)
    {

        $user = User::where('id', $id)->first();
        //$allChildren = User::pluck('name','id')->all();
        return view('user.user_profile',compact(['user']));
    }
    public function UserRank($id)
    {


        $users = User::where('id',Auth::id())->get();
      //  dd($users);
        //$allChildren = User::pluck('name','id')->all();
        return view('user.user_rank',compact('users'));
    }





}
