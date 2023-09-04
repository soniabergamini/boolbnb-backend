<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getEmail() {
        return Auth::check() ? response()->json(['email' => Auth::user()->email]) : response()->json(['error' => 'User not authenticated'], 403);
    }
}
