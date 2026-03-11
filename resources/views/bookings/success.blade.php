@extends('layouts.app')

@section('title', 'Booking Confirmed - Dhammasambhava')

@section('content')
<!-- Success Hero -->
<section class="bg-isha-cream py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <div class="mb-6">
                <svg class="w-20 h-20 mx-auto text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h1 class="text-3xl md:text-5xl font-bold text-green-900 mb-4">
                Booking Confirmed!
            </h1>
            <p class="text-xl text-isha-brown">
                Your journey to inner peace begins soon
            </p>
        </div>
    </div>
</section>

<!-- Booking Details -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <!-- Confirmation Message -->
            <div class="bg-white rounded-lg shadow-xl p-8 mb-8">
                <div class="bg-green-50 border-l-4 border-green-600 p-6 rounded mb-8">
                    <p class="text-green-800 mb-2">
                        <strong>Thank you, {{ $booking->visitor_name }}!</strong>
                    </p>
                    <p class="text-green-700">
                        We've received your booking request and sent a confirmation email to
                        <strong>{{ $booking->visitor_email }}</strong>.
                        Please check your inbox (and spam folder) for details.
                    </p>
                </div>

                <!-- Session Information -->
                <h2 class="text-2xl font-bold text-isha-brown-dark mb-6">Your Booking Details</h2>

                <div class="space-y-6">
                    <!-- Session -->
                    <div class="border-b border-gray-200 pb-4">
                        <h3 class="text-sm font-semibold text-isha-brown uppercase mb-2">Session</h3>
                        <div class="flex items-center justify-between">
                            <p class="text-lg font-bold text-isha-brown-dark">{{ $booking->session->title }}</p>
                            <span class="px-3 py-1 rounded-full text-sm font-semibold capitalize
                                {{ $booking->session->type === 'dhamma' ? 'bg-blue-100 text-blue-800' : ($booking->session->type === 'yoga' ? 'bg-green-100 text-green-800' : 'bg-purple-100 text-purple-800') }}">
                                {{ $booking->session->type }}
                            </span>
                        </div>
                    </div>

                    <!-- Date & Time -->
                    <div class="grid md:grid-cols-2 gap-6 border-b border-gray-200 pb-4">
                        <div>
                            <h3 class="text-sm font-semibold text-isha-brown uppercase mb-2">Date</h3>
                            <p class="text-lg text-isha-brown-dark">
                                <svg class="w-5 h-5 inline mr-2 text-isha-orange" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                </svg>
                                {{ \Carbon\Carbon::parse($booking->booking_date)->format('l, F j, Y') }}
                            </p>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-isha-brown uppercase mb-2">Time</h3>
                            <p class="text-lg text-isha-brown-dark">
                                <svg class="w-5 h-5 inline mr-2 text-isha-orange" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                {{ \Carbon\Carbon::parse($booking->booking_time)->format('g:i A') }}
                            </p>
                        </div>
                    </div>

                    <!-- Location & Duration -->
                    <div class="grid md:grid-cols-2 gap-6 border-b border-gray-200 pb-4">
                        <div>
                            <h3 class="text-sm font-semibold text-isha-brown uppercase mb-2">Location</h3>
                            <p class="text-lg text-isha-brown-dark">
                                <svg class="w-5 h-5 inline mr-2 text-isha-orange" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                </svg>
                                {{ $booking->session->location }}
                            </p>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-isha-brown uppercase mb-2">Duration</h3>
                            <p class="text-lg text-isha-brown-dark">{{ $booking->session->duration }} minutes</p>
                        </div>
                    </div>

                    <!-- Booking Reference -->
                    <div class="border-b border-gray-200 pb-4">
                        <h3 class="text-sm font-semibold text-isha-brown uppercase mb-2">Booking Reference</h3>
                        <p class="text-lg font-mono text-isha-brown-dark">#{{ str_pad($booking->id, 6, '0', STR_PAD_LEFT) }}</p>
                    </div>

                    <!-- Status -->
                    <div>
                        <h3 class="text-sm font-semibold text-isha-brown uppercase mb-2">Status</h3>
                        <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold
                            {{ $booking->status === 'confirmed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </div>

                    @if($booking->special_requests)
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h3 class="text-sm font-semibold text-isha-brown uppercase mb-2">Your Special Requests</h3>
                        <p class="text-isha-brown">{{ $booking->special_requests }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- What's Next -->
            <div class="bg-isha-cream rounded-lg p-8 mb-8 border-l-4 border-isha-orange">
                <h2 class="text-2xl font-bold text-isha-brown-dark mb-4">What Happens Next?</h2>
                <ul class="space-y-3 text-isha-brown">
                    <li class="flex items-start">
                        <svg class="w-6 h-6 mr-3 text-green-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span><strong>Confirmation Email:</strong> Check your email for booking details and preparation instructions.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 mr-3 text-green-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span><strong>Prepare for Your Session:</strong> Arrive 10 minutes early. Bring comfortable clothing, a water bottle, and an open heart.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-6 h-6 mr-3 text-green-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span><strong>Questions?</strong> Contact us anytime via WhatsApp or email if you need to reschedule or have questions.</span>
                    </li>
                    @if($booking->session->type === 'yoga' || $booking->session->type === 'both')
                    <li class="flex items-start">
                        <svg class="w-6 h-6 mr-3 text-green-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span><strong>Yoga Mat:</strong> We can provide a yoga mat if needed - just let us know in advance.</span>
                    </li>
                    @endif
                </ul>
            </div>

            <!-- Action Buttons -->
            <div class="grid md:grid-cols-3 gap-4 mb-8">
                <a href="{{ route('sessions.index') }}"
                   class="block text-center px-6 py-4 bg-isha-orange text-white rounded-lg hover:bg-isha-navy transition font-semibold">
                    Browse More Sessions
                </a>
                <a href="{{ route('home') }}"
                   class="block text-center px-6 py-4 bg-gray-200 text-isha-brown rounded-lg hover:bg-gray-300 transition font-semibold">
                    Return to Homepage
                </a>
                <a href="https://wa.me/{{ $booking->whatsapp_number ?: '1234567890' }}?text=Booking confirmation for {{ urlencode($booking->session->title) }}"
                   target="_blank"
                   class="block text-center px-6 py-4 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-semibold">
                    Contact via WhatsApp
                </a>
            </div>

            <!-- Inspirational Quote -->
            <div class="bg-white rounded-lg shadow-lg p-8 border-t-4 border-amber-600">
                <blockquote class="text-center">
                    <p class="text-xl italic text-isha-brown mb-4">
                        "The journey of a thousand miles begins with a single step."
                    </p>
                    <footer class="text-isha-brown-dark font-semibold">— Lao Tzu</footer>
                </blockquote>
            </div>
        </div>
    </div>
</section>
@endsection
