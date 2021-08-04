<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class User extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
    public function delete($id)
    {
        // Auth::id() == $id ||
        if ( Auth::user()->permission) {
            DB::table('users')->delete($id);
        }
        return back();
    }
}


