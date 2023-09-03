<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
      //dollar account
        $usdaccount = Account::create([
            'user_id' => $user->id,
            'number' => random_int(10000, 99999).'-'.config('app.currencies.USD.code'),
            'currency' => config('app.currencies.USD.code'),
            'balance'=> 0
        ]);

         //EURo account
        $usdaccount = Account::create([
            'user_id' => $user->id,
            'number' => random_int(10000, 99999).'-'.config('app.currencies.EUR.code'),
            'currency' => config('app.currencies.EUR.code'),
            'balance'=> 0
        ]);

         //Dinar account
        $usdaccount = Account::create([
            'user_id' => $user->id,
            'number' => random_int(10000, 99999).'-'.config('app.currencies.JOD.code'),
            'currency' => config('app.currencies.JOD.code'),
            'balance'=> 0
        ]);


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
