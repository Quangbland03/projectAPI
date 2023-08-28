<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AdminLoginController extends Controller
{
    //
    public function index(){
        return view ('admin.login');
    }

    public function loginPost(Request $request)
    {
        if(Auth::attempt(['email'=> $request->email, 'password'=> $request ->password]))
        {
            if(Auth::check()){
                $user = Auth::user();
                    //return view ("admin.dashboard", ['user' => Auth::user()]);
                    return redirect('admin/dashboard');
                }else{
                    return back();
                }
            }
    }


    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('admin/login');
    }
}

