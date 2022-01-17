<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ClubController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index()
  {
    $users=User::where('membership_status','1')->get();
    return view('admin.club_members',compact('users'));
  }
  public function ClubBonus(Request $request)
  {
      dd($request);


    $bonus = $request->bonus;
    $users=User::where('membership_status','1')->get();
    //$method=$request->method;
    //$txn_id=$request->txn_id;
    $club_bonus = new AddMoney();
    $club_bonus-> user_id = $user_id;
    $club_bonus-> amount =$amount;
    $club_bonus-> type ='Credit';
    //$club_bonus-> amount =$amount;
    //$club_bonus->method=$method;
    $club_bonus->method='Club Bonus';
    //$club_bonus->txn_id=$txn_id;
    $club_bonus->save();

    return back()->with('club_added','Club Bonus Has benn successfully deposited among the Users!!');
  }
}
