<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;

class SettingsController extends Controller
{

    public function Manage()
    {
      return view('admin.manage_settings');
    }
    public function StoreSettings(Request $request)
    {


    //dd($request->all());
    $min_deposit = $request->min_deposit;
    $min_transfer = $request->min_transfer;
    $min_withdraw=$request->min_withdraw;
    $sponsor_bonus= $request->sponsor_bonus;
    $pair_bonus= $request->pair_bonus;


    $unit_bonus= $request->unit_bonus;
    $setting = new Settings();
    $setting->min_deposit =$min_deposit;
    $setting->min_transfer=$min_transfer;
    $setting->min_withdraw =$min_withdraw;
    $setting->sponsor_bonus =$sponsor_bonus;
    $setting->pair_bonus =$pair_bonus;
    $setting->withdraw_charge=$request->withdraw_charge;


    $setting->unit_bonus=$unit_bonus;

    $setting->save();

    return back()->with('settings_added','Settings added successfully');
  }
    public function UpdateSettings(Request $request)
    {
      //dd($request);

      $min_deposit = $request->min_deposit;
      $min_transfer = $request->min_transfer;
      $min_withdraw=$request->min_withdraw;
      $sponsor_bonus= $request->sponsor_bonus;
      $pair_bonus= $request->pair_bonus;

      $unit_bonus= $request->unit_bonus;

      $setting = Settings::find($request->id);
      $setting->min_deposit =$min_deposit;
      $setting->min_transfer=$min_transfer;
      $setting->min_withdraw =$min_withdraw;
      $setting->sponsor_bonus =$sponsor_bonus;
      $setting->withdraw_charge=$request->withdraw_charge;

      $setting->pair_bonus=$pair_bonus;

      $setting->unit_bonus=$unit_bonus;

      $setting->save();

        return back()->with('settings_added','System settings has been updated successfully!');
    }
}
