<?php


namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\AddMoney;



use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Contracts\RegisterResponse;
use Illuminate\Support\Facades\Storage;

class ReferralController extends Controller
{
  

  public function __construct(StatefulGuard $guard)
  {

      //session()->put('checkout', true);
      $this->middleware('auth');
      $this->guard = $guard;
  }
    public function index($id)
    {
      //  $users = User::where('package_id')->get()->toArray();
      //  dd($user['packages']);
        //dd($id,Auth::id());
      //  $g_set = GeneralSettings::first();
       //$data=$g_set['royality_bonus'];
       //$data=$g_set->pair_percentage;
       //dd($data);
      $users=User::where('sponsor',Auth::id())->get();


      return view('user.referrals',compact('users'));
    }

}
