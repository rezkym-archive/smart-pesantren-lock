<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

use function PHPSTORM_META\map;

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
        // Custom Message
        $customMessage = 
        [
            'name.required' => 'Nama tidak boleh kosong.',
            'name.max'      => 'Panjang nama maksimal :max.',
            'email.required' => 'Email tidak boleh kosong.',
            'email.email'   => 'Email tidak benar.',
            'email.max'     => 'Panjang email maksimal :max.',
            'email.unique'  => 'Email sudah digunakan.',
            'password.required'  => 'Kata sandi tidak boleh kosong.',
            'terms.required' => 'Syarat dan ketentuan harus disetujui.',
        ];

        // Validation
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ], $customMessage)->validate();

        // Create user
        $UserCreate = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        // Default role
        $UserCreate->assignRole('student');
        
        // Insert the user information to database
        return $UserCreate;
    }
}
