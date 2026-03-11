<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::published()
            ->ordered()
            ->paginate(12);

        $quoteOfTheDay = Quote::published()
            ->inRandomOrder()
            ->first();

        return view('quotes.index', compact('quotes', 'quoteOfTheDay'));
    }

    public function show(Quote $quote)
    {
        abort_if(!$quote->is_published, 404);

        // Get related quotes (same category or author, or random)
        $relatedQuotes = Quote::published()
            ->where('id', '!=', $quote->id)
            ->where(function($query) use ($quote) {
                if ($quote->category) {
                    $query->where('category', $quote->category);
                }
                if ($quote->author) {
                    $query->orWhere('author', $quote->author);
                }
            })
            ->inRandomOrder()
            ->limit(4)
            ->get();

        // If no related quotes found, get random ones
        if ($relatedQuotes->count() < 4) {
            $relatedQuotes = Quote::published()
                ->where('id', '!=', $quote->id)
                ->inRandomOrder()
                ->limit(4)
                ->get();
        }

        return view('quotes.show', compact('quote', 'relatedQuotes'));
    }
}
