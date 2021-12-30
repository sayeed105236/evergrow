<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Carbon\Carbon;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */

     public function checkPosition(Request $request){
         $userName = User::where('id',$request['sponsor'])->pluck('user_name')->first();

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

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();
        $placement_id = $input['placement_id'];
        $position_id = $input['position'];
        return $data= User::create([
            'name' => $input['name'],
            'user_name' => $input['user_name'],
              'number' => $input['number'],
                'gender' => $input['gender'],
                  'country' => $input['country'],
                    'sponsor' => $input['sponsor'],

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
        $this->binary_count($placement_id,$position_id);


        }
        public function binary_count($placement_id,$pos)
        {
           if ($pos == 1){
                $pos = 'left_count';
           }else{
               $pos = 'right_count';
           }

            while($placement_id != '' && $pos != ''){

                DB::statement("UPDATE users SET $pos = `$pos`+1 WHERE user_name = '$placement_id'");

                $this->is_pair_generate($placement_id);
                $pos= $this->find_position_id($placement_id);
                $placement_id= $this->find_placement_id($placement_id);

            }

        }
        public function find_position_id($placement_id){

                $user_id = User::where('user_name',$placement_id)->first();
                $pos= $user_id->position;
                if ($pos == 1){
                    $pos = 'left_count';
                }elseif($pos == 2){
                    $pos = 'right_count';
                }

                return $pos;

        }
        public function find_placement_id($placement_id){

                $user_id = User::where('user_name',$placement_id)->first();
                return $user_id->placement_id;
        }

        public function is_pair_generate($placement_id)
        {

            $user = User::where('user_name',$placement_id)->first();

            if ($user->left_count == $user->right_count){
                $data = PairCount::where('user_id',$user->id)->where('date',Carbon::today())->get()->toArray();
                $date= date('Y-m-d');
                if(count($data) > 0){
                   DB::statement("UPDATE pair_counts SET no_of_pair = `no_of_pair`+1 WHERE date = '$date' and user_id = '$user->id'");
                //    DB::statement("UPDATE pair_counts SET no_of_pair = '$user->right_count' WHERE date = '$date' and user_id = '$user->id'");
                }else{
                    $insert= new PairCount();
                    $insert->user_id = $user->id;
                    $insert->date = Carbon::today();
                    $insert->no_of_pair = 1;
                    $insert->save();
                }
            }

        }
        //level distribution
      //  $this->levelBonus($placement_id);
        //pair bonus

    }
