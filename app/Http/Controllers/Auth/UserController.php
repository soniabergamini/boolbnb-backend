<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getAuth() {
        return Auth::check() ? response()->json(['email' => Auth::user()->email, 'name' => Auth::user()->name ?? 'User' ]) : response()->json(['error' => 'User not authenticated'], 403);
    }
}
