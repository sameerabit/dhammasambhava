@extends('layouts.app')

@section('title', 'Browse Sessions - Dhamma Sambhava')

@section('content')
<!-- Hero Header -->
<section class="bg-gradient-to-r from-amber-100 to-orange-100 py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold text-amber-900 mb-4 text-center">
            Dhamma & Yoga Sessions
        </h1>
        <p class="text-xl text-gray-700 text-center max-w-2xl mx-auto">
            Choose from our variety of meditation, dhamma teachings, and yoga classes
        </p>
    </div>
</section>

<!-- Filter Tabs -->
<section class="bg-white border-b shadow-sm sticky top-16 z-30">
    <div class="container mx-auto px-4 py-4">
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('sessions.index') }}" class="px-6 py-2 rounded-full {{ !request('type') ? 'bg-amber-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }} transition">
                All Sessions
            </a>
            <a href="{{ route('sessions.index', ['type' => 'dhamma']) }}" class="px-6 py-2 rounded-full {{ request('type') === 'dhamma' ? 'bg-amber-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }} transition">
                Dhamma
            </a>
            <a href="{{ route('sessions.index', ['type' => 'yoga']) }}" class="px-6 py-2 rounded-full {{ request('type') === 'yoga' ? 'bg-amber-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }} transition">
                Yoga
            </a>
            <a href="{{ route('sessions.index', ['type' => 'both']) }}" class="px-6 py-2 rounded-full {{ request('type') === 'both' ? 'bg-amber-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }} transition">
                Combined
            </a>
        </div>
    </div>
</section>

<!-- Sessions Grid -->
<section class="py-12">
    <div class="container mx-auto px-4">
        @if($sessions->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($sessions as $session)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden border-t-4 {{ $session->type === 'dhamma' ? 'border-blue-600' : ($session->type === 'yoga' ? 'border-green-600' : 'border-purple-600') }} hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                <div class="p-6">
                    <!-- Type Badge & Price -->
                    <div class="flex items-center justify-between mb-4">
                        <span class="px-3 py-1 rounded-full text-sm font-semibold capitalize
                            {{ $session->type === 'dhamma' ? 'bg-blue-100 text-blue-800' : ($session->type === 'yoga' ? 'bg-green-100 text-green-800' : 'bg-purple-100 text-purple-800') }}">
                            {{ $session->type }}
                        </span>
                        @if($session->price == 0)
                        <span class="text-green-600 font-bold text-lg">Free</span>
                        @else
                        <span class="text-amber-900 font-bold text-lg">${{ number_format($session->price, 2) }}</span>
                        @endif
                    </div>

                    <!-- Title -->
                    <h3 class="text-2xl font-bold text-gray-800 mb-3 line-clamp-2">{{ $session->title }}</h3>

                    <!-- Description -->
                    <p class="text-gray-600 mb-4 line-clamp-3">{{ $session->description }}</p>

                    <!-- Meta Info -->
                    <div class="space-y-2 mb-6 text-sm text-gray-600">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            <span>{{ $session->duration }} minutes</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            <span>{{ $session->location }}</span>
                        </div>
                        @if($session->max_capacity)
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                            </svg>
                            <span>Max {{ $session->max_capacity }} participants</span>
                        </div>
                        @else
                        <div class="flex items-center text-green-600">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                            </svg>
                            <span>Unlimited capacity</span>
                        </div>
                        @endif
                    </div>

                    <!-- Action Button -->
                    <a href="{{ route('sessions.show', $session) }}" class="block w-full text-center px-4 py-3 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition font-semibold">
                        View Details & Book
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-12">
            <p class="text-gray-600 text-lg">No sessions found. Please try a different filter.</p>
        </div>
        @endif
    </div>
</section>
@endsection
