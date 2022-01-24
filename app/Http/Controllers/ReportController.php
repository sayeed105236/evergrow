<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddMoney;

class ReportController extends Controller
{
  public function Manage()
  {
    $pair_bonus= AddMoney::where('method','Pair Bonus')->get();

    return view('admin.reports.pair_bonus_history',compact('pair_bonus'));
  }
}
