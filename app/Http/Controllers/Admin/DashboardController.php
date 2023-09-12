<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::now();

        $sponsApartments = Apartment::whereHas('sponsorships', function ($query) use ($today) {
            $query->where('start_date', '<=', $today)->where('end_date', '>=', $today);
        })->where('user_id', Auth::id())->get();

        $messages = Message::whereIn('apartment_id', Auth::user()->apartments->pluck('id'))
            ->with('apartment')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('sponsApartments', 'messages'));
    }
}
