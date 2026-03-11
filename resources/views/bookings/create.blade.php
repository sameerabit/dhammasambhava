@extends('layouts.app')

@section('title', 'Book ' . $session->title . ' - Dhamma Sambhava')

@section('content')
<!-- Booking Header -->
<section class="bg-isha-cream py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <div class="mb-6">
                <a href="{{ route('sessions.show', $session) }}" class="text-isha-brown hover:text-isha-brown-dark flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to Session Details
                </a>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-isha-brown-dark mb-3">
                Book Your Session
            </h1>
            <p class="text-lg text-isha-brown">{{ $session->title }}</p>
        </div>
    </div>
</section>

<!-- Booking Form -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-10">
                <!-- Session Summary -->
                <div class="bg-isha-cream rounded-lg p-8 mb-10">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-isha-brown-dark">Session Details</h2>
                        <span class="px-3 py-1 rounded-full text-sm font-semibold capitalize bg-isha-cream-dark text-isha-brown-dark">
                            {{ $session->type }}
                        </span>
                    </div>
                    <div class="grid md:grid-cols-2 gap-4 text-isha-brown">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-isha-orange" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            <span>{{ $session->duration }} minutes</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-isha-orange" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            <span>{{ $session->location }}</span>
                        </div>
                        <div class="flex items-center">
                            @if($session->price == 0)
                            <span class="text-xl font-bold text-green-600">Free</span>
                            @else
                            <span class="text-xl font-bold text-isha-brown-dark">${{ number_format($session->price, 2) }}</span>
                            @endif
                        </div>
                        @if($session->max_capacity)
                        <div class="flex items-center text-sm text-isha-brown-dark">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                            </svg>
                            <span>Max {{ $session->max_capacity }} participants</span>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Booking Form -->
                <form action="{{ route('bookings.store', $session) }}" method="POST" class="space-y-8">
                    @csrf

                    <!-- Personal Information -->
                    <div class="border-b border-isha-cream pb-8">
                        <h3 class="text-lg font-bold text-isha-brown-dark mb-6">Your Information</h3>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="visitor_name" class="block text-sm font-semibold text-isha-brown-dark mb-2">Full Name *</label>
                                <input type="text"
                                       id="visitor_name"
                                       name="visitor_name"
                                       value="{{ old('visitor_name') }}"
                                       required
                                       class="w-full px-4 py-3 border border-isha-cream-dark rounded-lg focus:ring-2 focus:ring-isha-orange focus:border-isha-orange @error('visitor_name') border-red-500 @enderror">
                                @error('visitor_name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="visitor_email" class="block text-sm font-semibold text-isha-brown-dark mb-2">Email Address *</label>
                                <input type="email"
                                       id="visitor_email"
                                       name="visitor_email"
                                       value="{{ old('visitor_email') }}"
                                       required
                                       class="w-full px-4 py-3 border border-isha-cream-dark rounded-lg focus:ring-2 focus:ring-isha-orange focus:border-isha-orange @error('visitor_email') border-red-500 @enderror">
                                @error('visitor_email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="visitor_phone" class="block text-sm font-semibold text-isha-brown-dark mb-2">Phone Number *</label>
                                <input type="tel"
                                       id="visitor_phone"
                                       name="visitor_phone"
                                       value="{{ old('visitor_phone') }}"
                                       required
                                       placeholder="+1234567890"
                                       class="w-full px-4 py-3 border border-isha-cream-dark rounded-lg focus:ring-2 focus:ring-isha-orange focus:border-isha-orange @error('visitor_phone') border-red-500 @enderror">
                                @error('visitor_phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="whatsapp_number" class="block text-sm font-semibold text-isha-brown-dark mb-2">
                                    WhatsApp Number
                                    <span class="text-xs font-normal text-isha-brown">(optional)</span>
                                </label>
                                <input type="tel"
                                       id="whatsapp_number"
                                       name="whatsapp_number"
                                       value="{{ old('whatsapp_number') }}"
                                       placeholder="+1234567890"
                                       class="w-full px-4 py-3 border border-isha-cream-dark rounded-lg focus:ring-2 focus:ring-isha-orange focus:border-isha-orange @error('whatsapp_number') border-red-500 @enderror">
                                @error('whatsapp_number')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Booking Date & Time -->
                    <div class="border-b border-isha-cream pb-8">
                        <h3 class="text-lg font-bold text-isha-brown-dark mb-6">Select Date & Time</h3>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="booking_date" class="block text-sm font-semibold text-isha-brown-dark mb-2">Preferred Date *</label>
                                <input type="date"
                                       id="booking_date"
                                       name="booking_date"
                                       value="{{ old('booking_date') }}"
                                       min="{{ date('Y-m-d') }}"
                                       required
                                       class="w-full px-4 py-3 border border-isha-cream-dark rounded-lg focus:ring-2 focus:ring-isha-orange focus:border-isha-orange @error('booking_date') border-red-500 @enderror">
                                @error('booking_date')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="booking_time" class="block text-sm font-semibold text-isha-brown-dark mb-2">Preferred Time *</label>
                                <select id="booking_time"
                                        name="booking_time"
                                        required
                                        class="w-full px-4 py-3 border border-isha-cream-dark rounded-lg focus:ring-2 focus:ring-isha-orange focus:border-isha-orange @error('booking_time') border-red-500 @enderror">
                                    <option value="">Select a time</option>
                                    <option value="06:00" {{ old('booking_time') == '06:00' ? 'selected' : '' }}>6:00 AM</option>
                                    <option value="07:00" {{ old('booking_time') == '07:00' ? 'selected' : '' }}>7:00 AM</option>
                                    <option value="08:00" {{ old('booking_time') == '08:00' ? 'selected' : '' }}>8:00 AM</option>
                                    <option value="09:00" {{ old('booking_time') == '09:00' ? 'selected' : '' }}>9:00 AM</option>
                                    <option value="10:00" {{ old('booking_time') == '10:00' ? 'selected' : '' }}>10:00 AM</option>
                                    <option value="16:00" {{ old('booking_time') == '16:00' ? 'selected' : '' }}>4:00 PM</option>
                                    <option value="17:00" {{ old('booking_time') == '17:00' ? 'selected' : '' }}>5:00 PM</option>
                                    <option value="18:00" {{ old('booking_time') == '18:00' ? 'selected' : '' }}>6:00 PM</option>
                                    <option value="19:00" {{ old('booking_time') == '19:00' ? 'selected' : '' }}>7:00 PM</option>
                                </select>
                                @error('booking_time')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Special Requests -->
                    <div>
                        <label for="special_requests" class="block text-sm font-semibold text-isha-brown-dark mb-2">
                            Special Requests or Notes
                            <span class="text-xs font-normal text-isha-brown">(optional)</span>
                        </label>
                        <textarea id="special_requests"
                                  name="special_requests"
                                  rows="4"
                                  class="w-full px-4 py-3 border border-isha-cream-dark rounded-lg focus:ring-2 focus:ring-isha-orange focus:border-isha-orange"
                                  placeholder="Any dietary restrictions, accessibility needs, or questions...">{{ old('special_requests') }}</textarea>
                    </div>

                    <!-- Terms & Conditions -->
                    <div class="bg-isha-cream rounded-lg p-6">
                        <label class="flex items-start cursor-pointer">
                            <input type="checkbox"
                                   name="terms_accepted"
                                   required
                                   class="mt-1 mr-3 h-5 w-5 text-isha-orange border-isha-cream-dark rounded focus:ring-isha-orange">
                            <span class="text-sm text-isha-brown">
                                I understand that this booking is subject to availability and will be confirmed via email.
                                I agree to arrive 10 minutes early and follow the center's guidelines. *
                            </span>
                        </label>
                        @error('terms_accepted')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex gap-4">
                        <button type="submit"
                                class="flex-1 px-8 py-4 bg-isha-orange text-white rounded-lg hover:bg-isha-navy transition font-bold text-lg shadow-sm">
                            Confirm Booking
                        </button>
                        <a href="{{ route('sessions.show', $session) }}"
                           class="px-8 py-4 bg-isha-cream text-isha-brown-dark rounded-lg hover:bg-isha-cream-dark transition font-semibold text-lg">
                            Cancel
                        </a>
                    </div>
                </form>

                <!-- Help Section -->
                <div class="mt-10 pt-8 border-t border-isha-cream">
                    <p class="text-sm text-isha-brown mb-3">Need assistance with your booking?</p>
                    <a href="https://wa.me/1234567890?text=I need help booking {{ urlencode($session->title) }}"
                       target="_blank"
                       class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition text-sm">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        Contact via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
