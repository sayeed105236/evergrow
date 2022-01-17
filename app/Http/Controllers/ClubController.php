<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AddMoney;

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


    $bonus = $request->bonus;
    $users=User::where('membership_status','1')->get();
    $user_count=User::where('membership_status','1')->count();
    $bonus_amount=($request->bonus)/$user_count;
    //$method=$request->method;
    //$txn_id=$request->txn_id;
    foreach ($users as $key => $user) {
      $club_bonus = new AddMoney();

      $club_bonus-> user_id = $user->id;
      $club_bonus-> amount =$bonus_amount;
      $club_bonus-> type ='Credit';
      //$club_bonus-> amount =$amount;
      //$club_bonus->method=$method;
      $club_bonus->method='Club Bonus';
      $club_bonus->status ='approve';
      //$club_bonus->txn_id=$txn_id;
      $club_bonus->save();
    }





    return back()->with('club_added','Club Bonus Has been successfully credited among the Users!!');
  }
}
