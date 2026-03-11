@extends('layouts.app')

@section('title', 'Wisdom Quotes - Dhamma Sambhava')

@section('content')
<!-- Hero Header -->
<section class="bg-isha-cream py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold text-isha-brown-dark mb-4 text-center">
            Wisdom & Inspiration
        </h1>
        <p class="text-xl text-isha-brown text-center max-w-2xl mx-auto">
            Timeless teachings to guide your journey toward enlightenment and inner peace
        </p>
    </div>
</section>

<!-- Quotes Grid -->
<section class="py-12">
    <div class="container mx-auto px-4">
        @if($quotes->count() > 0)
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 gap-8">
                @foreach($quotes as $quote)
                <div class="bg-white rounded-lg shadow-sm p-8 border-l-4 border-isha-orange hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="mb-6">
                        <svg class="w-10 h-10 text-amber-300 mb-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                        </svg>
                        <blockquote class="text-xl md:text-2xl text-isha-brown leading-relaxed font-serif italic">
                            "{{ $quote->text }}"
                        </blockquote>
                    </div>

                    <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                        <div>
                            <p class="text-lg font-bold text-isha-brown-dark">— {{ $quote->author }}</p>
                            @if($quote->source)
                            <p class="text-sm text-gray-600 mt-1">{{ $quote->source }}</p>
                            @endif
                        </div>
                        <a href="{{ route('quotes.show', $quote) }}"
                           class="text-isha-orange hover:text-isha-brown-dark font-semibold transition flex items-center">
                            View
                            <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>

                    @if($quote->category)
                    <div class="mt-4">
                        <span class="inline-block px-3 py-1 bg-isha-cream-dark text-isha-brown-dark rounded-full text-xs font-semibold uppercase">
                            {{ $quote->category }}
                        </span>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($quotes->hasPages())
            <div class="mt-12">
                {{ $quotes->links() }}
            </div>
            @endif
        </div>
        @else
        <div class="text-center py-12">
            <p class="text-gray-600 text-lg">No quotes available at the moment. Please check back soon.</p>
        </div>
        @endif
    </div>
</section>

<!-- Quote of the Day Banner -->
@if($quoteOfTheDay && !$quotes->contains($quoteOfTheDay))
<section class="py-16 bg-gradient-to-r from-amber-600 to-orange-600 text-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <p class="text-sm uppercase tracking-widest mb-4 opacity-90">Quote of the Day</p>
            <blockquote class="text-2xl md:text-4xl italic mb-6 leading-relaxed font-serif">
                "{{ $quoteOfTheDay->text }}"
            </blockquote>
            <p class="text-xl font-semibold">— {{ $quoteOfTheDay->author }}</p>
            <a href="{{ route('quotes.show', $quoteOfTheDay) }}"
               class="inline-block mt-6 px-6 py-3 bg-white text-isha-orange rounded-lg hover:bg-gray-100 transition font-semibold">
                Explore This Quote
            </a>
        </div>
    </div>
</section>
@endif

<!-- Call to Action -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-isha-brown-dark mb-4">
            Let Wisdom Guide Your Practice
        </h2>
        <p class="text-lg text-isha-brown mb-8 max-w-2xl mx-auto">
            Deepen your understanding through our meditation and dhamma sessions
        </p>
        <a href="{{ route('sessions.index') }}"
           class="inline-block px-8 py-4 bg-isha-orange text-white rounded-lg hover:bg-isha-navy transition text-lg font-semibold shadow-sm">
            Explore Our Sessions
        </a>
    </div>
</section>
@endsection
