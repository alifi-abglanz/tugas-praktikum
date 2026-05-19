<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    protected array $providers = ['google', 'github'];

    public function redirect(string $provider): RedirectResponse
    {
        if (! in_array($provider, $this->providers)) {
            abort(404);
        }

        return Socialite::driver($provider)->redirect();
    }

    public function callback(string $provider): RedirectResponse
    {
        if (! in_array($provider, $this->providers)) {
            abort(404);
        }

        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Exception $exception) {
            Log::error('Socialite callback error', [
                'provider' => $provider,
                'message' => $exception->getMessage(),
            ]);

            return redirect()->route('login')->with('error', 'Login ' . ucfirst($provider) . ' gagal. Silakan coba lagi.');
        }

        $email = $socialUser->getEmail();
        if (! $email) {
            return redirect()->route('login')->with('error', 'Tidak dapat mengambil email dari ' . ucfirst($provider) . '.');
        }

        $user = User::firstOrCreate(
            ['email' => $email],
            [
                'name' => $socialUser->getName() ?? $socialUser->getNickname() ?? $email,
                'password' => bcrypt(Str::random(32)),
            ]
        );

        Auth::login($user, true);

        return redirect()->intended(route('home', absolute: false));
    }
}
