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
            'country' => ['required', 'numeric'],
            'province' => ['nullable', 'numeric'],
            'full_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'alpha_dash', 'max:255'],
            'invite_code' => ['required', 'string', 'min:6'],
            'password' => $this->passwordRules(),
            'security_pin' => ['required', 'string', 'min:6'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phonePrefix' => ['required'],

            // 'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'username' => $input['username'],
            'full_name' => $input['full_name'],
            'email' => $input['email'],
            'phone' => $input['phonePrefix'] . $input['phone'],
            'password' => Hash::make($input['password']),
            'security_pin' => Hash::make($input['security_pin']),
            'country' => $input['country'],
            'province' => $input['province'],
            'referral' => $input['invite_code'],
        ]);
    }
}
