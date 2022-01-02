<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddMoney;
use Illuminate\Support\Facades\Auth;


class AddMoneyController extends Controller
{
    public function Manage()
  {

  }
  public function Store(Request $request)
  {
    //dd($request);
      $request->validate([
      'amount' => 'required',
      'method' => 'required',

  ]);
    $user_id = $request->user_id;
    $amount = $request->amount;
    //$method=$request->method;
    $txn_id=$request->txn_id;
    $deposit = new AddMoney();
    $deposit-> user_id = $user_id;
    $deposit-> amount =$amount;
    //$deposit->method=$method;
    $deposit->method='Deposit';
    $deposit->txn_id=$txn_id;
    $deposit->save();

    return back()->with('Money_added','Your request is Accepted. Wait for Confirmation!!');
  }
  public function moneyTransfer(Request $request)
  {
      //dd($request);
      $request->validate([

          'user_id' => 'required',
          'amount' => 'required',

      ]);


      $sum_deposit=AddMoney::where('user_id',Auth::id())->where('status','approve')->sum('amount');
      $calculated_amount= $request->amount;
      //dd($sum_deposit < $calculated_amount,$sum_deposit,$calculated_amount);

      if ($sum_deposit < $calculated_amount) {

        return back()->with('error', 'Insufficient Balance');

      };
      $deduct = new AddMoney;
      $deduct->user_id = Auth::id();
      $deduct->receiver_id=$request->user_id;
      $deduct->amount = -($request->amount);
      $deduct->method ='Transfer';
      $deduct->type ='Debit';
      $deduct->status ='approve';

    

      $deduct->save();

      $deposit = new AddMoney;
      $deposit->user_id = $request->user_id;
    //  $deposit->receiver_id=$request->user_id;

      $deposit->amount =$request->amount;
      $deposit->method ='Transfer';
      $deposit->type ='Credit';
      $deposit->status ='approve';
      $deposit->save();
      return back()->with('Money_Transfered','Money Transfer Successfully!!');
  }



}
