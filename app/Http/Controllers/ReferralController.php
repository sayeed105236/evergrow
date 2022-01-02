<?php


namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\AddMoney;



use Carbon\Carbon;
use Facade\FlareClient\Http\Response;
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
      //$this->middleware('auth');
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

    public function checkPosition(Request $request){

        $userName = User::where('user_name','like',$request['sponsor'])->pluck('user_name')->first();

        $check_position = User::where('placement_id',$userName)->where('position',$request['position'])->orderBy('id','desc')->first();

        if(is_null($check_position)){
            $first = User::where('user_name',$userName)->orderBy('id','desc')->first();
            return  $first->user_name;
        }else{
            $all = $check_position->childrenRecursive;
        }


        // loop through category ids and find all child categories until there are no more

        if(count($all)>0)
        {
            foreach($all as $subcat){
                if(count($subcat->childrenRecursive) > 0){
                    //dd($subcat->childrenRecursive());
                    foreach ($subcat->childrenRecursive as $item){
                        return $this->check($item);
                    }
                }else{
                    return $subcat->user_name;
                }
            }
            //dd($all);
        }
        else
        {
            return $check_position->user_name;
        }

    }
    public function check($subcat){
        if(count($subcat->childrenRecursive) > 0){
            foreach ($subcat->childrenRecursive as $item){
                return  $this->check($item);
                //return $item->user_name;
            }
        }else{
            return $subcat->user_name;
        }

    }

    public function getSponsor(Request $request)
    {

        $userName = User::where('user_name','like',$request->search)->select('id','user_name')->first();
        if ($userName){
            return response()->json(['success'=>'<span style="color: green;">User found!!</span>','data'=>$userName],200);
        }else{
            return response()->json(['success'=>'<span style="color: red;">User not found!!</span>'],200);
        }

    }

}
