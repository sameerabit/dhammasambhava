@extends('layouts.app')

@section('title', 'Video Teachings - Dhamma Sambhava')

@section('content')
<!-- Hero Header -->
<section class="bg-isha-cream py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold text-isha-brown-dark mb-4 text-center">
            Video Teachings
        </h1>
        <p class="text-xl text-gray-700 text-center max-w-2xl mx-auto">
            Learn from recorded dhamma talks, meditation guides, and yoga sessions
        </p>
    </div>
</section>

<!-- Gallery Navigation -->
<section class="bg-white border-b shadow-sm sticky top-16 z-30">
    <div class="container mx-auto px-4 py-4">
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('gallery.index') }}"
               class="px-6 py-2 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300 transition">
                Photos
            </a>
            <a href="{{ route('gallery.teachings') }}"
               class="px-6 py-2 rounded-full bg-isha-orange text-white transition">
                Video Teachings
            </a>
        </div>
    </div>
</section>

<!-- Videos Grid -->
<section class="py-12">
    <div class="container mx-auto px-4">
        @if($mediaItems->count() > 0)
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($mediaItems as $media)
                <div class="bg-white rounded-lg shadow-sm overflow-hidden border-t-4 border-isha-orange hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <!-- Video Thumbnail -->
                    <div class="relative aspect-video bg-gray-900">
                        @if($media->youtube_url)
                            @php
                                // Extract YouTube video ID from URL
                                preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/', $media->youtube_url, $matches);
                                $videoId = $matches[1] ?? null;
                            @endphp

                            @if($videoId)
                            <div class="group cursor-pointer" onclick="playVideo{{ $media->id }}()">
                                <!-- Thumbnail -->
                                <img src="https://img.youtube.com/vi/{{ $videoId }}/maxresdefault.jpg"
                                     alt="{{ $media->title }}"
                                     class="w-full h-full object-cover"
                                     id="thumbnail{{ $media->id }}">

                                <!-- Play Button Overlay -->
                                <div class="absolute inset-0 flex items-center justify-center bg-black/30 group-hover:bg-black/50 transition-all">
                                    <div class="w-20 h-20 bg-red-600 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                        <svg class="w-10 h-10 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z"/>
                                        </svg>
                                    </div>
                                </div>

                                <!-- Duration Badge -->
                                @if($media->duration)
                                <div class="absolute bottom-2 right-2 px-2 py-1 bg-black/80 text-white text-xs font-semibold rounded">
                                    {{ $media->duration }} min
                                </div>
                                @endif
                            </div>

                            <!-- Hidden iframe (will be shown when clicked) -->
                            <iframe id="iframe{{ $media->id }}"
                                    class="hidden absolute inset-0 w-full h-full"
                                    src=""
                                    data-src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                            </iframe>

                            <script>
                            function playVideo{{ $media->id }}() {
                                const iframe = document.getElementById('iframe{{ $media->id }}');
                                const thumbnail = document.getElementById('thumbnail{{ $media->id }}');
                                iframe.src = iframe.dataset.src;
                                iframe.classList.remove('hidden');
                                thumbnail.parentElement.classList.add('hidden');
                            }
                            </script>
                            @endif
                        @else
                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-amber-100 to-orange-100">
                            <svg class="w-16 h-16 text-amber-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M10 20l4-4h6v-12h-20v12h6l4 4zm-8-6v-10h18v10h-5l-4 4-4-4h-5z"/>
                            </svg>
                        </div>
                        @endif
                    </div>

                    <!-- Video Info -->
                    <div class="p-6">
                        <!-- Category Badge -->
                        @if($media->category)
                        <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold uppercase mb-3
                            {{ $media->category === 'dhamma' ? 'bg-blue-100 text-blue-800' : ($media->category === 'yoga' ? 'bg-green-100 text-green-800' : 'bg-isha-cream-dark text-amber-800') }}">
                            {{ ucfirst($media->category) }}
                        </span>
                        @endif

                        <!-- Title -->
                        <h3 class="text-xl font-bold text-isha-brown-dark mb-3 line-clamp-2">
                            {{ $media->title }}
                        </h3>

                        <!-- Description -->
                        @if($media->description)
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            {{ $media->description }}
                        </p>
                        @endif

                        <!-- Meta Info -->
                        <div class="flex items-center justify-between text-sm text-gray-500 pt-4 border-t border-gray-200">
                            @if($media->duration)
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1 text-isha-orange" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                {{ $media->duration }} min
                            </div>
                            @endif

                            @if($media->youtube_url)
                            <a href="{{ $media->youtube_url }}"
                               target="_blank"
                               class="text-isha-orange hover:text-amber-800 font-semibold flex items-center">
                                Watch on YouTube
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                            </a>
                            @endif
                        </div>
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
        </div>
        @else
        <div class="text-center py-16">
            <svg class="w-24 h-24 mx-auto text-gray-400 mb-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M10 20l4-4h6v-12h-20v12h6l4 4zm-8-6v-10h18v10h-5l-4 4-4-4h-5z"/>
            </svg>
            <p class="text-gray-600 text-lg mb-4">No video teachings available yet</p>
            <p class="text-gray-500">Check back soon for dhamma talks and meditation guides</p>
        </div>
        @endif
    </div>
</section>

<!-- Category Filter Info -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-2xl font-bold text-isha-brown-dark mb-6 text-center">Teaching Categories</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white rounded-lg p-6 text-center shadow-md">
                    <div class="text-4xl mb-3">🧘</div>
                    <h3 class="text-lg font-bold text-blue-900 mb-2">Dhamma Talks</h3>
                    <p class="text-gray-600 text-sm">Buddhist philosophy, meditation instruction, and spiritual guidance</p>
                </div>
                <div class="bg-white rounded-lg p-6 text-center shadow-md">
                    <div class="text-4xl mb-3">🕉️</div>
                    <h3 class="text-lg font-bold text-green-900 mb-2">Yoga Sessions</h3>
                    <p class="text-gray-600 text-sm">Asana practice, breathwork, and movement meditation</p>
                </div>
                <div class="bg-white rounded-lg p-6 text-center shadow-md">
                    <div class="text-4xl mb-3">☮️</div>
                    <h3 class="text-lg font-bold text-purple-900 mb-2">Meditation Guides</h3>
                    <p class="text-gray-600 text-sm">Guided meditations for beginners and experienced practitioners</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-isha-brown-dark text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Join Us In Person</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">
            Experience the transformative power of live sessions with our community
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('sessions.index') }}"
               class="inline-block px-8 py-4 bg-white text-green-700 rounded-lg hover:bg-gray-100 transition text-lg font-semibold shadow-sm">
                Book a Live Session
            </a>
            <a href="https://wa.me/1234567890?text=I'm interested in learning more about your teachings"
               target="_blank"
               class="inline-block px-8 py-4 bg-green-600 text-white rounded-lg hover:bg-green-800 transition text-lg font-semibold shadow-sm border-2 border-white">
                Contact Us on WhatsApp
            </a>
        </div>
    </div>
</section>
@endsection
