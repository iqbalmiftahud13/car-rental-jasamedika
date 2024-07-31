<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $rentals = Rental::with('car')->where('user_id', $user->id)->get(); // Get rentals for the logged-in user
        return view('pages.bookings.dashboard', compact('rentals'));
    }
}
