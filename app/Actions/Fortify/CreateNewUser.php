<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\PairCount;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */


    public function create(array $input)
    {

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'user_name'=> ['required','unique:users'],
            'number'=> ['required'],
            'gender'=> ['required'],
            'country'=> ['required'],
            'sponsor'=>['required'],
            'position'=> ['required'],

            //'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();
        $placement_id = $input['placement_id'];
        $position_id = $input['position'];
        $sponsor =  User::where('user_name','like',$input['sponsor'])->select('id','user_name')->first();
        $data= User::create([
            'name' => $input['name'],
            'user_name' => $input['user_name'],
              'number' => $input['number'],
                'gender' => $input['gender'],
                  'country' => $input['country'],
                    'sponsor' => $sponsor->id,

                      'placement_id' =>$placement_id,
                      'position' => $position_id,

            'email' => $input['email'],
            'password' => Hash::make($input['password']),

        ]);


        if ($position_id == 1){
            User::where('user_name', $placement_id)
                ->update(['left_side' => $data->user_name]);
        }else{
            User::where('user_name', $placement_id)
                ->update(['right_side' => $data->user_name]);
        }
        //level distribution
      //  $this->levelBonus($placement_id);
        //pair bonus


//return true;
        //dd($data);
        $email = $input['email'];
        Mail::to($email)->send(new WelcomeMail($data));
        return $data;
        }






        //level distribution
      //  $this->levelBonus($placement_id);
        //pair bonus

    }
