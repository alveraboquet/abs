<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Str;

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
            'invite_code' => ['required', 'string', 'min:6', 'exists:users,invite_code'],
            'password' => $this->passwordRules(),
            'security_pin' => ['required', 'string', 'min:6'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phonePrefix' => ['required'],

            // 'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();
        do {
            $code = Str::random(6);
            $exists = User::where('invite_code', $code)->exists();
        } while ($exists);

        $referrer = User::firstWhere('invite_code', $input['invite_code']);
        $referrer->total_direct += 1;
        $upline = $referrer;
        while ($upline) {
            $upline->total_group += 1;
            $upline->save();
            $upline = $upline->parent;
        }
        $hierarchyList = $referrer->hierarchyList ? $referrer->hierarchyList . $referrer->id . '-' : '-' . $referrer->id . '-';

        return User::create([
            'username' => $input['username'],
            'full_name' => $input['full_name'],
            'email' => $input['email'],
            'phone' => $input['phonePrefix'] . $input['phone'],
            'password' => Hash::make($input['password']),
            'security_pin' => Hash::make($input['security_pin']),
            'country' => $input['country'],
            'province' => $input['province'],
            'referral' => $referrer->id,
            'hierarchyList' => $hierarchyList,
            'invite_code' => $code,
        ]);
    }
}
