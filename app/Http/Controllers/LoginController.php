<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(request $request):RedirectResponse
    {
       $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);
       if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            activity()->causedBy(Auth::user())->log(auth()->user()->username.'Melakukan Login');
            return redirect()->intended('/admin/user')->with('success', 'Login Success');   
        } else{
            return back()->with('loginError', 'Login Failed');
    }}

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
