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
    public function index2()
    {
      return view('home');
    }



}
