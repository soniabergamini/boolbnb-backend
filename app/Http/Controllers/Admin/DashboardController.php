<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::now();
        $apartments = Apartment::whereHas('sponsorships', function ($query) use ($today) {
            $query->where('start_date', '<=', $today)->where('end_date', '>=', $today);
        })->get();

        $messages = Message::whereIn('apartment_id', Auth::user()->apartments->pluck('id'))
            ->with('apartment')
            ->orderBy('created_at', 'desc')
            // ->take(3)
            ->get();

        return view('admin.dashboard', compact('apartments', 'messages'));
    }
}
