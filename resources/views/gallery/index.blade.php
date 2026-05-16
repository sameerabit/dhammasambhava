@extends('layouts.app')

@section('title', __('site.gallery_title') . ' - Dhammasambhava')

@section('content')
<!-- Hero Header -->
<section class="bg-isha-cream py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold text-isha-brown-dark mb-4 text-center">
            {{ __('site.gallery_title') }}
        </h1>
        <p class="text-xl text-gray-700 text-center max-w-2xl mx-auto">
            {{ __('site.gallery_subtitle') }}
        </p>
    </div>
</section>

<!-- Gallery Grid -->
<section class="py-12">
    <div class="container mx-auto px-4">
        @if($mediaItems->count() > 0)
        <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($mediaItems as $media)
            <div class="group relative overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 cursor-pointer"
                 onclick="openLightbox('{{ asset('storage/' . $media->file_path) }}', '{{ addslashes($media->title ?? '') }}', '{{ addslashes($media->description ?? '') }}')">
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

                <!-- Hover Overlay -->
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                        </svg>
                    </div>
                </div>

                @if($media->title)
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <p class="text-white text-sm font-semibold truncate">{{ $media->title }}</p>
                </div>
                @endif
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
            <p class="text-gray-600 text-lg mb-4">{{ __('site.no_photos') }}</p>
            <p class="text-gray-500">{{ __('site.no_photos_sub') }}</p>
        </div>
        @endif
    </div>
</section>

<!-- Lightbox -->
<div id="lightbox" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/90 p-4" onclick="closeLightbox(event)">
    <button class="absolute top-4 right-4 text-white hover:text-gray-300 transition" onclick="closeLightbox()">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>
    <div class="max-w-5xl max-h-full flex flex-col items-center" onclick="event.stopPropagation()">
        <img id="lightbox-img" src="" alt="" class="max-w-full max-h-[80vh] object-contain rounded-lg shadow-2xl">
        <div id="lightbox-caption" class="mt-4 text-center text-white hidden">
            <p id="lightbox-title" class="text-lg font-semibold"></p>
            <p id="lightbox-desc" class="text-sm text-gray-300 mt-1"></p>
        </div>
    </div>
</div>

<!-- Call to Action -->
<section class="py-16 bg-isha-brown-dark text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">{{ __('site.experience_yourself') }}</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">
            {{ __('site.experience_subtitle') }}
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('sessions.index') }}"
               class="inline-block px-8 py-4 bg-white text-isha-orange rounded-lg hover:bg-gray-100 transition text-lg font-semibold shadow-lg">
                {{ __('site.browse_sessions') }}
            </a>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
function openLightbox(src, title, desc) {
    document.getElementById('lightbox-img').src = src;
    document.getElementById('lightbox-img').alt = title;

    const caption = document.getElementById('lightbox-caption');
    const titleEl = document.getElementById('lightbox-title');
    const descEl = document.getElementById('lightbox-desc');

    if (title || desc) {
        caption.classList.remove('hidden');
        titleEl.textContent = title;
        descEl.textContent = desc;
        descEl.classList.toggle('hidden', !desc);
    } else {
        caption.classList.add('hidden');
    }

    const lb = document.getElementById('lightbox');
    lb.classList.remove('hidden');
    lb.classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closeLightbox(event) {
    if (event && event.target !== document.getElementById('lightbox')) return;
    const lb = document.getElementById('lightbox');
    lb.classList.add('hidden');
    lb.classList.remove('flex');
    document.body.style.overflow = '';
    document.getElementById('lightbox-img').src = '';
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const lb = document.getElementById('lightbox');
        if (!lb.classList.contains('hidden')) {
            lb.classList.add('hidden');
            lb.classList.remove('flex');
            document.body.style.overflow = '';
            document.getElementById('lightbox-img').src = '';
        }
    }
});
</script>
@endpush
