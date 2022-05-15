<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use DB;
use App\Models\Building;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        DB::table('resource_users')->insert([
            ['user_id' => $user->id, 'resource_id' => 1, 'amount' => 10000],
            ['user_id' => $user->id, 'resource_id' => 2, 'amount' => 10000],
            ['user_id' => $user->id, 'resource_id' => 3, 'amount' => 1],
            ['user_id' => $user->id, 'resource_id' => 4, 'amount' => 1],
            ['user_id' => $user->id, 'resource_id' => 5, 'amount' => 1],
        ]);

        $buildings = Building::all();
        foreach ($buildings as $building) {
            # code...
            DB::table('building_users')->insert([
                ['user_id' => $user->id, 'level' => 0, "lat" => $building->lat, "lng" => $building->lng],
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
