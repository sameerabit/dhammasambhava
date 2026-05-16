@extends('layouts.app')

@section('title', 'Dhammasambhava - ' . __('site.tagline'))

@section('content')
<!-- Hero Section with Background Image -->
<section class="relative bg-gray-900 py-32 md:py-48 overflow-hidden">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="{{ asset('images/46501515_1960277164065269_1149918729761456128_n.jpg') }}"
             alt="Meditation and Peace"
             class="w-full h-full object-cover opacity-40">
        <div class="absolute inset-0 bg-gradient-to-b from-isha-brown-dark/60 to-isha-brown-dark/80"></div>
    </div>

    <!-- Content -->
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center text-white">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                {{ __('site.hero_title') }}
            </h1>
            <p class="text-xl md:text-2xl mb-12 font-light text-isha-cream-light">
                {{ __('site.hero_subtitle') }}
            </p>

            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="{{ route('sessions.index') }}" class="px-8 py-4 bg-isha-orange text-white rounded-lg hover:bg-isha-navy transition text-lg font-semibold shadow-lg">
                    {{ __('site.browse_sessions') }}
                </a>
                <a href="{{ route('quotes.index') }}" class="px-8 py-4 bg-white text-isha-brown-dark rounded-lg hover:bg-isha-cream transition text-lg font-semibold shadow-lg">
                    {{ __('site.explore_wisdom') }}
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Quote of the Day Section -->
@if($quoteOfTheDay)
<section class="py-20 bg-isha-cream">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-lg p-10 md:p-16 shadow-sm">
                <p class="text-sm uppercase tracking-widest text-isha-orange mb-6 text-center">{{ __('site.quote_of_the_day') }}</p>
                <blockquote class="text-2xl md:text-3xl italic text-isha-brown-dark mb-8 leading-relaxed font-serif text-center">
                    "{{ $quoteOfTheDay->text }}"
                </blockquote>
                <p class="text-lg text-isha-brown-dark font-semibold text-center">— {{ $quoteOfTheDay->author }}</p>
                <div class="mt-8 text-center">
                    <a href="{{ route('quotes.show', $quoteOfTheDay) }}" class="inline-block px-6 py-3 bg-isha-orange text-white rounded-lg hover:bg-isha-navy transition font-semibold">
                        {{ __('site.read_more') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- About Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-isha-brown-dark mb-8">{{ __('site.our_offerings') }}</h2>
            <p class="text-lg text-isha-brown leading-relaxed mb-16">
                {{ __('site.offerings_subtitle') }}
            </p>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-isha-cream p-8 rounded-lg shadow-sm">
                    <div class="text-4xl mb-4">🧘</div>
                    <h3 class="text-xl font-bold text-isha-brown-dark mb-3">{{ __('site.offering_1_title') }}</h3>
                    <p class="text-isha-brown">{{ __('site.offering_1_desc') }}</p>
                </div>
                <div class="bg-isha-cream p-8 rounded-lg shadow-sm">
                    <div class="text-4xl mb-4">🕉️</div>
                    <h3 class="text-xl font-bold text-isha-brown-dark mb-3">{{ __('site.offering_2_title') }}</h3>
                    <p class="text-isha-brown">{{ __('site.offering_2_desc') }}</p>
                </div>
                <div class="bg-isha-cream p-8 rounded-lg shadow-sm">
                    <div class="text-4xl mb-4">☮️</div>
                    <h3 class="text-xl font-bold text-isha-brown-dark mb-3">{{ __('site.offering_3_title') }}</h3>
                    <p class="text-isha-brown">{{ __('site.offering_3_desc') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Sessions -->
@if($featuredSessions->count() > 0)
<section class="py-20 bg-isha-cream">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-isha-brown-dark mb-16 text-center">{{ __('site.featured_sessions') }}</h2>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach($featuredSessions as $session)
            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition">
                @if($session->image_path)
                <img src="{{ asset('storage/' . $session->image_path) }}" alt="{{ $session->title }}" class="w-full h-48 object-cover">
                @endif
                <div class="p-8">
                    <div class="flex items-center justify-between mb-6">
                        <span class="px-3 py-1 bg-isha-cream-dark text-isha-brown-dark rounded-full text-sm font-semibold capitalize">
                            {{ $session->type }}
                        </span>
                        @if($session->price == 0)
                        <span class="text-green-600 font-bold">{{ __('site.free') }}</span>
                        @else
                        <span class="text-isha-brown-dark font-bold">Rs. {{ number_format($session->price, 2) }}</span>
                        @endif
                    </div>

                    <h3 class="text-xl font-bold text-isha-brown-dark mb-3">{{ $session->title }}</h3>
                    <p class="text-isha-brown mb-6 line-clamp-3">{{ $session->description }}</p>

                    <div class="flex items-center text-sm text-isha-brown mb-6">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                        {{ $session->duration_label }}
                    </div>

                    <a href="{{ route('sessions.show', $session) }}" class="block w-full text-center px-4 py-3 bg-isha-orange text-white rounded hover:bg-isha-navy transition">
                        {{ __('site.view_details_book') }}
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-16">
            <a href="{{ route('sessions.index') }}" class="inline-block px-8 py-4 bg-isha-brown-dark text-white rounded-lg hover:bg-isha-navy transition">
                {{ __('site.view_all_sessions') }}
            </a>
        </div>
    </div>
</section>
@endif

<!-- Wisdom Gallery -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-isha-brown-dark mb-4 text-center">{{ __('site.words_of_wisdom') }}</h2>
        <p class="text-center text-isha-brown mb-12 max-w-2xl mx-auto">
            {{ __('site.wisdom_subtitle') }}
        </p>

        @if($wisdomQuotes->count() > 0)
        <div class="grid md:grid-cols-3 gap-6 max-w-6xl mx-auto">
            @foreach($wisdomQuotes as $quote)
            <a href="{{ route('quotes.show', $quote) }}" class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-all duration-300">
                <img src="{{ asset('storage/' . $quote->image_path) }}"
                     alt="{{ $quote->author }}"
                     class="w-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-isha-brown-dark/80 via-isha-brown-dark/40 to-transparent opacity-60 group-hover:opacity-40 transition-opacity"></div>
                <div class="absolute bottom-0 left-0 right-0 p-4">
                    <p class="text-white text-sm font-semibold line-clamp-2 italic">"{{ Str::limit($quote->text, 80) }}"</p>
                    <p class="text-isha-cream-light text-xs mt-1">— {{ $quote->author }}</p>
                </div>
            </a>
            @endforeach
        </div>
        @endif

        <div class="text-center mt-12">
            <a href="{{ route('quotes.index') }}" class="inline-block px-8 py-4 bg-isha-orange text-white rounded-lg hover:bg-isha-navy transition text-lg font-semibold">
                {{ __('site.view_all_quotes') }}
            </a>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-24 bg-isha-brown-dark text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">{{ __('site.cta_title') }}</h2>
        <p class="text-xl mb-10 max-w-2xl mx-auto text-isha-cream">
            {{ __('site.cta_subtitle') }}
        </p>
        <div class="flex flex-col sm:flex-row gap-6 justify-center">
            <a href="{{ route('sessions.index') }}" class="px-8 py-4 bg-white text-isha-brown-dark rounded-lg hover:bg-isha-cream transition text-lg font-semibold">
                {{ __('site.book_first_session') }}
            </a>
            <x-whatsapp-button class="text-lg px-8 py-4" />
        </div>
    </div>
</section>
@endsection
