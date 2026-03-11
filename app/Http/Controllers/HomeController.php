<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\DhammaSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        // Get quote of the day (cached for 24 hours)
        $quoteOfTheDay = Cache::remember('quote_of_the_day_' . now()->toDateString(), 86400, function () {
            return Quote::getQuoteOfTheDay();
        });

        // Get upcoming featured sessions (active, ordered by creation)
        $featuredSessions = DhammaSession::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('home', compact('quoteOfTheDay', 'featuredSessions'));
    }
}
