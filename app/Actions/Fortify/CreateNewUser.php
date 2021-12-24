<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

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

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'user_name' => $input['user_name'],
              'number' => $input['number'],
                'gender' => $input['gender'],
                  'country' => $input['country'],
                    'sponsor' => $input['sponsor'],
                      'position' => $input['position'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
