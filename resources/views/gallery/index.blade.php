@extends('layouts.app')

@section('title', 'Photo Gallery - Dhamma Sambhava')

@section('content')
<!-- Hero Header -->
<section class="bg-isha-cream py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold text-isha-brown-dark mb-4 text-center">
            Photo Gallery
        </h1>
        <p class="text-xl text-gray-700 text-center max-w-2xl mx-auto">
            Moments of peace, practice, and community at Dhamma Sambhava
        </p>
    </div>
</section>

<!-- Gallery Navigation -->
<section class="bg-white border-b shadow-sm sticky top-16 z-30">
    <div class="container mx-auto px-4 py-4">
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('gallery.index') }}"
               class="px-6 py-2 rounded-full bg-isha-orange text-white transition">
                Photos
            </a>
            <a href="{{ route('gallery.teachings') }}"
               class="px-6 py-2 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300 transition">
                Video Teachings
            </a>
        </div>
    </div>
</section>

<!-- Gallery Grid -->
<section class="py-12">
    <div class="container mx-auto px-4">
        @if($mediaItems->count() > 0)
        <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($mediaItems as $media)
            <div class="group relative overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300">
                <!-- Image -->
                <div class="aspect-square bg-gray-200">
                    @if($media->file_path)
                    <img src="{{ asset('storage/' . $media->file_path) }}"
                         alt="{{ $media->title }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-amber-100 to-orange-100">
                        <svg class="w-16 h-16 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    @endif
                </div>

                <!-- Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                    <h3 class="text-white font-bold text-lg mb-1">{{ $media->title }}</h3>
                    @if($media->description)
                    <p class="text-white/90 text-sm line-clamp-2">{{ $media->description }}</p>
                    @endif
                    @if($media->category)
                    <span class="inline-block mt-2 px-2 py-1 bg-isha-orange text-white rounded text-xs font-semibold self-start">
                        {{ ucfirst($media->category) }}
                    </span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($mediaItems->hasPages())
        <div class="mt-12">
            {{ $mediaItems->links() }}
        </div>
        @endif
        @else
        <div class="text-center py-16">
            <svg class="w-24 h-24 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <p class="text-gray-600 text-lg mb-4">No photos available yet</p>
            <p class="text-gray-500">Check back soon for updates from our sessions and events</p>
        </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-isha-brown-dark text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Experience It Yourself</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">
            Join our community and create your own moments of peace and transformation
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('sessions.index') }}"
               class="inline-block px-8 py-4 bg-white text-isha-orange rounded-lg hover:bg-gray-100 transition text-lg font-semibold shadow-lg">
                Browse Sessions
            </a>
            <a href="{{ route('gallery.teachings') }}"
               class="inline-block px-8 py-4 bg-green-600 text-white rounded-lg hover:bg-green-700 transition text-lg font-semibold shadow-lg">
                Watch Video Teachings
            </a>
        </div>
    </div>
</section>
@endsection
