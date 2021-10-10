<?php

namespace Controllers\Auth\Social;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Fortify;
use Exception;

use App\Models\User;
use Illuminate\Routing\Route;

class GoogleController extends Controller
{
    /**
     * RedirectToGoogle
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * handleGoogleCallback
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        // Try to auth from login
        try {

            // Get user data from google
            $user = Socialite::driver('google')->user();

            // Find user at the database
            $finduser = User::where('google_id', $user->id)->first() ?? User::where('email', $user->email)->first();

            if ($finduser OR !is_null($finduser))
            {
                // Auth login.
                Auth::login($finduser);

                // Redirect user to spesific role route
                return redirect('/'. $finduser->roles->pluck('name')[0]);

            } else
            {
                // Create new user
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => Hash::make('123'),
                    'profile_photo_path' => $user->avatar,
                ]);

                $newUser->email_verified_at = now();
                $newUser->save();

                // Default role
                $newUser->assignRole('student');

                // Attempt login
                Auth::login($newUser);

                // Redirect to student URL
                return redirect()->route('student.home');
            }
        } catch (Exception $e)
        {
            // Return the error
            return redirect()->route('login')->withMessage([
                Fortify::username() => [$e->getMessage()]
            ]);

            //dd($e->getMessage());
        }
    }
}
