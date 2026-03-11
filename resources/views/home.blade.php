@extends('layouts.app')

@section('title', 'Dhammasambhava - Path to Peace & Wisdom')

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
                Welcome to Dhammasambhava
            </h1>
            <p class="text-xl md:text-2xl mb-12 font-light text-isha-cream-light">
                A Sanctuary for Spiritual Growth & Inner Peace
            </p>

            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="{{ route('sessions.index') }}" class="px-8 py-4 bg-isha-orange text-white rounded-lg hover:bg-isha-navy transition text-lg font-semibold shadow-lg">
                    Browse Sessions
                </a>
                <a href="{{ route('quotes.index') }}" class="px-8 py-4 bg-white text-isha-brown-dark rounded-lg hover:bg-isha-cream transition text-lg font-semibold shadow-lg">
                    Explore Wisdom
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
                <p class="text-sm uppercase tracking-widest text-isha-orange mb-6 text-center">Quote of the Day</p>
                <blockquote class="text-2xl md:text-3xl italic text-isha-brown-dark mb-8 leading-relaxed font-serif text-center">
                    "{{ $quoteOfTheDay->text }}"
                </blockquote>
                <p class="text-lg text-isha-brown-dark font-semibold text-center">— {{ $quoteOfTheDay->author }}</p>
                <div class="mt-8 text-center">
                    <a href="{{ route('quotes.show', $quoteOfTheDay) }}" class="inline-block px-6 py-3 bg-isha-orange text-white rounded-lg hover:bg-isha-navy transition font-semibold">
                        Read More
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

<!-- Wisdom Gallery -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-isha-brown-dark mb-4 text-center">Words of Wisdom</h2>
        <p class="text-center text-isha-brown mb-12 max-w-2xl mx-auto">
            Timeless teachings to inspire and guide your spiritual journey
        </p>

        <div class="grid md:grid-cols-3 gap-6 max-w-6xl mx-auto">
            @php
            $quoteImages = [
                'quotes/504379733_1313500207448732_1488199036778016310_n.jpg',
                'quotes/517143990_1311787730953313_3213854276871139559_n.jpg',
                'quotes/520724727_1324482903017129_5864715493622473452_n.jpg',
                'quotes/526317849_1330636219068464_5423863308206625618_n.jpg',
                'quotes/529710680_1344001687731917_5262041184879371982_n.jpg',
                'quotes/529760974_1338729494925803_536497021397670558_n.jpg',
            ];
            @endphp

            @foreach(array_slice($quoteImages, 0, 6) as $image)
            <a href="{{ route('quotes.index') }}" class="group relative aspect-square overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-all duration-300">
                <img src="{{ asset('images/' . $image) }}"
                     alt="Wisdom Quote"
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-isha-brown-dark/80 via-isha-brown-dark/40 to-transparent opacity-60 group-hover:opacity-40 transition-opacity"></div>
            </a>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('quotes.index') }}" class="inline-block px-8 py-4 bg-isha-orange text-white rounded-lg hover:bg-isha-navy transition text-lg font-semibold">
                View All Quotes →
            </a>
        </div>
    </div>
</section>

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
