@extends('layouts.app')

@section('title', 'Dhamma Sambhava - Path to Peace & Wisdom')

@section('content')
<!-- Hero Section with Quote of the Day -->
<section class="relative bg-isha-cream py-24 md:py-40">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-isha-brown-dark mb-6">
                Welcome to Dhamma Sambhava
            </h1>
            <p class="text-xl md:text-2xl text-isha-brown mb-16 font-light">
                A Sanctuary for Spiritual Growth & Inner Peace
            </p>

            @if($quoteOfTheDay)
            <!-- Quote of the Day -->
            <div class="bg-white rounded-lg p-10 md:p-16 shadow-sm">
                <p class="text-sm uppercase tracking-widest text-isha-orange mb-6">Quote of the Day</p>
                <blockquote class="text-2xl md:text-3xl italic text-isha-brown-dark mb-8 leading-relaxed font-serif">
                    "{{ $quoteOfTheDay->text }}"
                </blockquote>
                <p class="text-lg text-isha-brown-dark font-semibold">— {{ $quoteOfTheDay->author }}</p>
            </div>
            @endif

            <div class="mt-16 flex flex-col sm:flex-row gap-6 justify-center">
                <a href="{{ route('sessions.index') }}" class="px-8 py-4 bg-isha-orange text-white rounded-lg hover:bg-isha-navy transition text-lg font-semibold shadow-sm">
                    Browse Sessions
                </a>
                <a href="{{ route('quotes.index') }}" class="px-8 py-4 bg-isha-brown text-white rounded-lg hover:bg-isha-brown-dark transition text-lg font-semibold shadow-sm">
                    More Quotes
                </a>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-isha-brown-dark mb-8">Our Offerings</h2>
            <p class="text-lg text-isha-brown leading-relaxed mb-16">
                Experience the transformative power of ancient wisdom combined with modern practice.
                Join us for meditation, yoga, and spiritual teachings.
            </p>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-isha-cream p-8 rounded-lg shadow-sm">
                    <div class="text-4xl mb-4">🧘</div>
                    <h3 class="text-xl font-bold text-isha-brown-dark mb-3">Dhamma Teachings</h3>
                    <p class="text-isha-brown">Explore Buddhist philosophy and meditation practices for inner peace.</p>
                </div>
                <div class="bg-isha-cream p-8 rounded-lg shadow-sm">
                    <div class="text-4xl mb-4">🕉️</div>
                    <h3 class="text-xl font-bold text-isha-brown-dark mb-3">Yoga Classes</h3>
                    <p class="text-isha-brown">Unite body, mind, and spirit through traditional yoga asanas.</p>
                </div>
                <div class="bg-isha-cream p-8 rounded-lg shadow-sm">
                    <div class="text-4xl mb-4">☮️</div>
                    <h3 class="text-xl font-bold text-isha-brown-dark mb-3">Guided Meditation</h3>
                    <p class="text-isha-brown">Learn mindfulness and meditation techniques for daily life.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Sessions -->
@if($featuredSessions->count() > 0)
<section class="py-20 bg-isha-cream">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-isha-brown-dark mb-16 text-center">Featured Sessions</h2>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach($featuredSessions as $session)
            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition">
                <div class="p-8">
                    <div class="flex items-center justify-between mb-6">
                        <span class="px-3 py-1 bg-isha-cream-dark text-isha-brown-dark rounded-full text-sm font-semibold capitalize">
                            {{ $session->type }}
                        </span>
                        @if($session->price == 0)
                        <span class="text-green-600 font-bold">Free</span>
                        @else
                        <span class="text-isha-brown-dark font-bold">${{ number_format($session->price, 2) }}</span>
                        @endif
                    </div>

                    <h3 class="text-xl font-bold text-isha-brown-dark mb-3">{{ $session->title }}</h3>
                    <p class="text-isha-brown mb-6 line-clamp-3">{{ $session->description }}</p>

                    <div class="flex items-center text-sm text-isha-brown mb-6">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                        {{ $session->duration }} minutes
                    </div>

                    <a href="{{ route('sessions.show', $session) }}" class="block w-full text-center px-4 py-3 bg-isha-orange text-white rounded hover:bg-isha-navy transition">
                        View Details & Book
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-16">
            <a href="{{ route('sessions.index') }}" class="inline-block px-8 py-4 bg-isha-brown-dark text-white rounded-lg hover:bg-isha-navy transition">
                View All Sessions →
            </a>
        </div>
    </div>
</section>
@endif

<!-- Call to Action -->
<section class="py-24 bg-isha-brown-dark text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Begin Your Journey Today</h2>
        <p class="text-xl mb-10 max-w-2xl mx-auto text-isha-cream">
            Join our community and discover the path to inner peace, wisdom, and spiritual awakening.
        </p>
        <div class="flex flex-col sm:flex-row gap-6 justify-center">
            <a href="{{ route('sessions.index') }}" class="px-8 py-4 bg-white text-isha-brown-dark rounded-lg hover:bg-isha-cream transition text-lg font-semibold">
                Book Your First Session
            </a>
            <a href="https://wa.me/1234567890" class="px-8 py-4 bg-green-600 text-white rounded-lg hover:bg-green-700 transition text-lg font-semibold">
                Contact Us on WhatsApp
            </a>
        </div>
    </div>
</section>
@endsection
