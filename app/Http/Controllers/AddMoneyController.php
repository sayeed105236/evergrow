<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AddMoney;
use App\Models\Withdraw;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Settings;

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
        $txn_id = $request->txn_id;
        $deposit = new AddMoney();
        $deposit->user_id = $user_id;
        $deposit->amount = $amount;
        //$deposit->method=$method;
        $deposit->method = 'Deposit';
        $deposit->txn_id = $txn_id;
        $deposit->save();

        return back()->with('Money_added', 'Your request is Accepted. Wait for Confirmation!!');
    }

    public function moneyTransfer(Request $request)
    {




          $request->validate([

              'user_id' => 'required',
              'amount' => 'required',

          ]);

          $req_user_id = User::where('user_name', $request->user_id)->pluck('id')->first();


          $sum_deposit = AddMoney::where('user_id', Auth::id())->where('status', 'approve')->sum('amount');
          $calculated_amount = $request->amount;
          //dd($sum_deposit < $calculated_amount,$sum_deposit,$calculated_amount);

          if ($sum_deposit < $calculated_amount) {

              return back()->with('error', 'Insufficient Balance');

          };
          if ($req_user_id != null) {
            $deduct = new AddMoney;
            $deduct->user_id = Auth::id();
            $deduct->receiver_id = $req_user_id;
            $deduct->amount = -($request->amount);
            $deduct->method = 'Transfer';
            $deduct->type = 'Debit';
            $deduct->status = 'approve';
            $deduct->save();

            $deposit = new AddMoney;
            $deposit->user_id = $req_user_id;
            $deposit->received_from= Auth::id();
            $deposit->amount = $request->amount;
            $deposit->method = 'Transfer';
            $deposit->type = 'Credit';
            $deposit->status = 'approve';
            $deposit->save();

            return back()->with('Money_Transfered', 'Money Transfer Successfully!!');
          }

        else
        {
            return back()->with('Money_not_Transfered', 'Please Enter the Correct Username!!');
        }
    }

    public function walletWithdraw(Request $request)
    {
        $request->validate([

            'user_id' => 'required',
            'amount' => 'required',

        ]);

        $settings=Settings::first();
        //dd($settings->withdraw_charge);
        $sum_deposit = AddMoney::where('user_id', Auth::id())->sum('amount');
        $calculated_amount = $request->amount;
        //dd($sum_deposit < $calculated_amount,$sum_deposit,$calculated_amount);

        if ($sum_deposit < $calculated_amount) {
            return back()->with('error', 'Insufficient Balance');
            //  throw new \Exception("Insufficient Balance", 200);
        };

        $user_id = $request->user_id;
        $amount = ($request->amount);
        $payment_method_id = $request->payment_method_id;

        $withdraw = new Withdraw();
        $withdraw->user_id = $user_id;
        $withdraw->amount = $amount;

        $withdraw->payment_method_id = $payment_method_id;


        $withdraw->save();

        $deduct = new AddMoney;
        $deduct->user_id = Auth::id();
        $deduct->amount = -(($request->amount) + (($request->amount) * ($settings->withdraw_charge) / 100));
        $deduct->method = 'Withdraw';

        $deduct->status = 'approve';
        $deduct->save();

        return back()->with('withdraw_added', 'Your request is Accepted. Wait for Confirmation!!');
    }
    public function AdjustBalance()
    {
      $adjusts= AddMoney::where('method','Adjustment')->get();
      return view('admin.balance_adjust',compact('adjusts'));
    }
    public function getUser(Request $request)
    {

        $userName = User::where('user_name','like',$request->search)->first();
        //dd($userName);

        if ($userName){
          //dd($userName['user_name']);
            return response()->json(['success'=>'<span style="color: green;">User found!!</span>','data'=>$userName['user_name']],200);
        }else{
         // dd('userName');
            return response()->json(['success'=>'<span style="color: red;">User not found!!</span>'],200);
        }

    }
    public function AdjustBalanceStore(Request $request)
    {
      $user_adjust_id = User::where('user_name', $request->user_id)->pluck('id')->first();
      $adjust = new AddMoney;
      $adjust->user_id = $user_adjust_id;
      $adjust->received_from= Auth::id();
      $adjust->amount = $request->amount;
      $adjust->method = 'Adjustment';
      $adjust->type = 'Credit';
      $adjust->status = 'approve';
      $adjust->created_at = Carbon::now();
      $adjust->save();

      return back()->with('Money_Adjust', 'Money Adjust Successfully!!');
    }



}
