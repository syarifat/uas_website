<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator; // Tambahkan namespace Validator
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Limits;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {

        // Definisikan rate limiter untuk login
        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5);  // Batas 5 permintaan login per menit
        });
        // View untuk Login
        Fortify::loginView(function () {
            return view('auth.login');
        });

        // View untuk Register
        Fortify::registerView(function () {
            return view('auth.register');
        });

        // Gunakan action untuk registrasi
        Fortify::createUsersUsing(\App\Actions\Fortify\CreateNewUser::class);

        // Custom login dengan username
        Fortify::authenticateUsing(function ($request) {
            $user = User::where('username', $request->username)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                return $user;
            }
        });
    }
}
