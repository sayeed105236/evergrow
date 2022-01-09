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
    public function UpdateUser(Request $request)
    {
      //dd($request);
      $address = $request->address;
      $name=$request->name;
      $number=$request->number;
      $national_id=$request->national_id;
      $birth=$request->birth;
      $gender=$request->gender;
      $nominee = $request->nominee;
      $nominee_email = $request->nominee_email;
      $image=$request->file('file');
      $filename=null;
      if ($image) {
          $filename = time() . $image->getClientOriginalName();

          Storage::disk('public')->putFileAs(
              '/User',
              $image,
              $filename
          );
      }


      $user = User::find(Auth::user()->id);
      $user->address = $address;
      $user->name =$name;
      $user->number =$number;
      $user->birth =$birth;
      $user->gender =$gender;
      $user->nominee =$nominee;
      $user->national_id=$national_id;
      $user->nominee_email =$nominee_email;
      $user->image=$filename;

      $user->save();

        return back()->with('profile_updated','Profile has been updated successfully!');
    }
    public function changePassStore(Request $request){
      $request->validate([
          'old_password' => 'required',
          'new_password' => 'required|min:5',
          'password_confirmation' => 'required|min:5',
      ]);
      $db_pass = Auth::user()->password;
      $current_password = $request->old_password;
      $newpass = $request->new_password;
      $confirmpass = $request->password_confirmation;

     if (Hash::check($current_password,$db_pass)) {
      if ($newpass === $confirmpass) {
          User::findOrFail(Auth::id())->update([
            'password' => Hash::make($newpass)
          ]);

          Auth::logout();

        return Redirect()->route('login')->with('password_updated','Password has been updated successfully!');

      }else {

        $notification=array(
            'message'=>'New Password And Confirm Password Not Same',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
      }
   }else {
    $notification=array(
        'message'=>'Old Password Not Match',
        'alert-type'=>'error'
    );
    return Redirect()->back()->with($notification);
   }
  }

}
