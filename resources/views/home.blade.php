@extends('layouts.app')

@section('title', 'Dhamma Sambhava - Path to Peace & Wisdom')

@section('content')
<!-- Hero Section with Quote of the Day -->
<section class="relative palm-leaf-bg py-20 md:py-32">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-amber-900 mb-6">
                Welcome to Dhamma Sambhava
            </h1>
            <p class="text-xl md:text-2xl text-gray-700 mb-12 font-light">
                A Sanctuary for Spiritual Growth & Inner Peace
            </p>

            @if($quoteOfTheDay)
            <!-- Quote of the Day -->
            <div class="bg-white/80 backdrop-blur-sm rounded-lg border-4 border-amber-600 p-8 md:p-12 shadow-2xl manuscript-border">
                <p class="text-sm uppercase tracking-widest text-amber-700 mb-4">Quote of the Day</p>
                <blockquote class="text-2xl md:text-3xl italic text-gray-800 mb-6 leading-relaxed font-serif">
                    "{{ $quoteOfTheDay->text }}"
                </blockquote>
                <p class="text-lg text-amber-900 font-semibold">— {{ $quoteOfTheDay->author }}</p>
            </div>
            @endif

            <div class="mt-12 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('sessions.index') }}" class="px-8 py-4 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition text-lg font-semibold shadow-lg">
                    Browse Sessions
                </a>
                <a href="{{ route('quotes.index') }}" class="px-8 py-4 bg-green-700 text-white rounded-lg hover:bg-green-800 transition text-lg font-semibold shadow-lg">
                    More Quotes
                </a>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-16 bg-white/50">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-amber-900 mb-6">Our Offerings</h2>
            <p class="text-lg text-gray-700 leading-relaxed mb-12">
                Experience the transformative power of ancient wisdom combined with modern practice.
                Join us for meditation, yoga, and spiritual teachings.
            </p>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gradient-to-br from-amber-50 to-orange-50 p-6 rounded-lg shadow-md">
                    <div class="text-4xl mb-4">🧘</div>
                    <h3 class="text-xl font-bold text-amber-900 mb-2">Dhamma Teachings</h3>
                    <p class="text-gray-700">Explore Buddhist philosophy and meditation practices for inner peace.</p>
                </div>
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-6 rounded-lg shadow-md">
                    <div class="text-4xl mb-4">🕉️</div>
                    <h3 class="text-xl font-bold text-green-900 mb-2">Yoga Classes</h3>
                    <p class="text-gray-700">Unite body, mind, and spirit through traditional yoga asanas.</p>
                </div>
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-6 rounded-lg shadow-md">
                    <div class="text-4xl mb-4">☮️</div>
                    <h3 class="text-xl font-bold text-blue-900 mb-2">Guided Meditation</h3>
                    <p class="text-gray-700">Learn mindfulness and meditation techniques for daily life.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Sessions -->
@if($featuredSessions->count() > 0)
<section class="py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-amber-900 mb-12 text-center">Featured Sessions</h2>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach($featuredSessions as $session)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden border-t-4 border-amber-600 hover:shadow-xl transition">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <span class="px-3 py-1 bg-amber-100 text-amber-800 rounded-full text-sm font-semibold capitalize">
                            {{ $session->type }}
                        </span>
                        @if($session->price == 0)
                        <span class="text-green-600 font-bold">Free</span>
                        @else
                        <span class="text-amber-900 font-bold">${{ number_format($session->price, 2) }}</span>
                        @endif
                    </div>

                    <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $session->title }}</h3>
                    <p class="text-gray-600 mb-4 line-clamp-3">{{ $session->description }}</p>

                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                        {{ $session->duration }} minutes
                    </div>

                    <a href="{{ route('sessions.show', $session) }}" class="block w-full text-center px-4 py-2 bg-amber-600 text-white rounded hover:bg-amber-700 transition">
                        View Details & Book
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('sessions.index') }}" class="inline-block px-8 py-3 bg-gray-800 text-white rounded-lg hover:bg-gray-900 transition">
                View All Sessions →
            </a>
        </div>
    </div>
</section>
@endif

<!-- Call to Action -->
<section class="py-20 bg-gradient-to-r from-amber-600 to-orange-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Begin Your Journey Today</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">
            Join our community and discover the path to inner peace, wisdom, and spiritual awakening.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('sessions.index') }}" class="px-8 py-4 bg-white text-amber-600 rounded-lg hover:bg-gray-100 transition text-lg font-semibold">
                Book Your First Session
            </a>
            <a href="https://wa.me/1234567890" class="px-8 py-4 bg-green-600 text-white rounded-lg hover:bg-green-700 transition text-lg font-semibold">
                Contact Us on WhatsApp
            </a>
        </div>
    </div>
</section>
@endsection
