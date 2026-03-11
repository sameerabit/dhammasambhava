@extends('layouts.app')

@section('title', substr($quote->text, 0, 60) . '... - Dhamma Sambhava')

@section('content')
<!-- Quote Hero -->
<section class="palm-leaf-bg py-20 md:py-32">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Back Button -->
            <div class="mb-8">
                <a href="{{ route('quotes.index') }}" class="text-amber-700 hover:text-amber-900 flex items-center inline-flex">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to All Quotes
                </a>
            </div>

            <!-- Main Quote Card -->
            <div class="bg-white/90 backdrop-blur-sm rounded-lg border-4 border-amber-600 p-8 md:p-16 shadow-2xl manuscript-border">
                <!-- Quote Icon -->
                <div class="flex justify-center mb-8">
                    <svg class="w-16 h-16 text-amber-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                    </svg>
                </div>

                <!-- Quote Text -->
                <blockquote class="text-2xl md:text-4xl text-gray-800 leading-relaxed font-serif italic text-center mb-8">
                    "{{ $quote->text }}"
                </blockquote>

                <!-- Author -->
                <div class="text-center mb-6">
                    <p class="text-2xl md:text-3xl font-bold text-amber-900">— {{ $quote->author }}</p>
                    @if($quote->source)
                    <p class="text-lg text-gray-600 mt-2 italic">{{ $quote->source }}</p>
                    @endif
                </div>

                <!-- Category Badge -->
                @if($quote->category)
                <div class="flex justify-center">
                    <span class="inline-block px-4 py-2 bg-amber-100 text-amber-800 rounded-full text-sm font-semibold uppercase tracking-wide">
                        {{ $quote->category }}
                    </span>
                </div>
                @endif
            </div>

            <!-- Share & Actions -->
            <div class="mt-8 flex flex-wrap gap-4 justify-center">
                <button onclick="shareQuote()"
                        class="px-6 py-3 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition font-semibold flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                    </svg>
                    Share This Quote
                </button>
                <a href="https://wa.me/?text={{ urlencode('"' . $quote->text . '" — ' . $quote->author . ' | Dhamma Sambhava: ' . route('quotes.show', $quote)) }}"
                   target="_blank"
                   class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-semibold flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    Share via WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Reflection Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <div class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-lg p-8 border-l-4 border-amber-600">
                <h2 class="text-2xl font-bold text-amber-900 mb-4">Reflect on This Wisdom</h2>
                <div class="space-y-4 text-gray-700 leading-relaxed">
                    <p>
                        Take a moment to contemplate the depth of these words. How do they resonate with your current journey?
                        What insights can you draw from this teaching?
                    </p>
                    <p>
                        Consider keeping a journal to record your reflections and track your spiritual growth over time.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Quotes -->
@if($relatedQuotes->count() > 0)
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-amber-900 mb-8 text-center">More Wisdom to Explore</h2>

        <div class="max-w-5xl mx-auto grid md:grid-cols-2 gap-6">
            @foreach($relatedQuotes as $relatedQuote)
            <a href="{{ route('quotes.show', $relatedQuote) }}"
               class="block bg-white rounded-lg shadow-lg p-6 border-l-4 border-amber-600 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                <blockquote class="text-lg text-gray-700 italic mb-4 line-clamp-3">
                    "{{ $relatedQuote->text }}"
                </blockquote>
                <p class="text-amber-900 font-semibold">— {{ $relatedQuote->author }}</p>
            </a>
            @endforeach
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('quotes.index') }}"
               class="inline-block px-6 py-3 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition font-semibold">
                View All Quotes
            </a>
        </div>
    </div>
</section>
@endif

<!-- Call to Action -->
<section class="py-16 bg-gradient-to-r from-green-700 to-emerald-700 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Deepen Your Practice</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">
            Transform wisdom into lived experience through our meditation and dhamma sessions
        </p>
        <a href="{{ route('sessions.index') }}"
           class="inline-block px-8 py-4 bg-white text-green-700 rounded-lg hover:bg-gray-100 transition text-lg font-semibold shadow-lg">
            Explore Our Sessions
        </a>
    </div>
</section>

@push('scripts')
<script>
function shareQuote() {
    const quoteText = @json($quote->text);
    const author = @json($quote->author);
    const url = window.location.href;
    const shareText = `"${quoteText}" — ${author}\n\nVia Dhamma Sambhava: ${url}`;

    if (navigator.share) {
        navigator.share({
            title: 'Wisdom Quote',
            text: shareText,
        }).catch(err => console.log('Error sharing:', err));
    } else {
        // Fallback: Copy to clipboard
        navigator.clipboard.writeText(shareText).then(() => {
            alert('Quote copied to clipboard!');
        }).catch(err => {
            console.error('Failed to copy:', err);
        });
    }
}
</script>
@endpush
@endsection
