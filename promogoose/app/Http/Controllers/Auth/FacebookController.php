<?php


namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Socialite;
use Exception;
use Auth;

class FacebookController extends Controller
{

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $fbUser = Socialite::driver('facebook')->user();
        dd($fbUser);
        // $user->token;

        $user = User::updateOrCreate([
            'email' => $fbUser->getEmail(),
            'name' => $fbUser->getName(),
            'provider_id' => $fbUser->getId(),
            'type' => 'client',

        ]);

        Auth::login($user, true);

        return redirect($this->redirectTo);

        // $user->token;
    }
}