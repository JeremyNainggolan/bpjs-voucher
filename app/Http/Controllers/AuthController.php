<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function index() {
        return view('user.index');
    }

    public function login()
    {
        $data['page_title'] = 'Login';
        return view('auth.login', compact('data'));
    }

    public function register() {
        $data['page_title'] = 'Register';
        return view('auth.register', compact('data'));
    }

    function registerPost(Request $request){
        $request->validate([
            'nik' => 'required|string|max:16|unique:users',
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'password' => 'required|string|min:6|confirmed',
        ]);
        print_r($request->all());

        $data['nik'] = $request->nik;
        $data['name'] = $request->name;
        $data['date_of_birth'] = $request->date_of_birth;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if(!$user){
            return redirect(route('register'))->with("error","Registeration failed, Try Again!");
        }
        return redirect(route('login'))->with("succes","Registeration succesfull");

        function logout(){
            Session::flush();
            Auth::logout();
            return redirect(route('login'));
        }

    }

    // public function registerpost(Request $request) {
    //     // Validate the request data
    //     $validated = $request->validate([
    //         'nik' => 'required|string|max:16|unique:users',
    //         'name' => 'required|string|max:255',
    //         'date_of_birth' => 'required|date',
    //         'password' => 'required|string|min:6|confirmed',
    //     ]);
    //     $user = User::create([
    //         'nik' => $validated['nik'],
    //         'name' => $validated['name'],
    //         'date_of_birth' => $validated['date_of_birth'],
    //         'password' => Hash::make($validated['password']),
    //     ]);

    //     return redirect()->route('login')
    //                    ->with('success', 'Registration successful. You can now log in.');
    
    //     try {
    //         // Create user
                           
    //     } catch (\Exception $e) {
    //         return redirect()->back()
    //                        ->withInput()
    //                        ->with('error', 'Registration failed. Please try again.');
    //     }
    // }
    

    public function login_post(Request $request)
    {
        $credentials = $request->validate([
            'nik' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        } else {
            return back()->withErrors([
                'nik' => 'The provided credentials do not match our records.',
            ]);
        }

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
