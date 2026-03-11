@extends('layouts.app')

@section('title', 'Contact Us - Dhamma Sambhava')

@section('content')
<!-- Hero Header -->
<section class="bg-isha-cream py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold text-isha-brown-dark mb-4 text-center">
            Get In Touch
        </h1>
        <p class="text-xl text-isha-brown text-center max-w-2xl mx-auto">
            We're here to answer your questions and support your journey
        </p>
    </div>
</section>

<!-- Contact Options -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            <div class="grid md:grid-cols-2 gap-8 mb-12">
                <!-- WhatsApp Contact -->
                <div class="bg-white rounded-lg shadow-sm p-8 border-t-4 border-green-600">
                    <div class="text-center mb-6">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-green-100 rounded-full mb-4">
                            <svg class="w-10 h-10 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-isha-brown-dark mb-2">WhatsApp</h2>
                        <p class="text-gray-600 mb-6">Get instant responses to your questions</p>
                    </div>

                    <a href="https://wa.me/1234567890?text=Hello%2C%20I%27m%20interested%20in%20learning%20more%20about%20your%20sessions"
                       target="_blank"
                       class="block w-full text-center px-6 py-4 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-bold text-lg shadow-sm">
                        Message Us on WhatsApp
                    </a>

                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <h3 class="font-semibold text-isha-brown-dark mb-3">Best for:</h3>
                        <ul class="space-y-2 text-gray-600 text-sm">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 mr-2 text-green-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Quick questions about sessions
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 mr-2 text-green-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Booking assistance and changes
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 mr-2 text-green-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Urgent inquiries
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Book a Session -->
                <div class="bg-white rounded-lg shadow-sm p-8 border-t-4 border-isha-orange">
                    <div class="text-center mb-6">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-amber-100 rounded-full mb-4">
                            <svg class="w-10 h-10 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-isha-brown-dark mb-2">Book a Session</h2>
                        <p class="text-gray-600 mb-6">Reserve your spot in upcoming classes</p>
                    </div>

                    <a href="{{ route('sessions.index') }}"
                       class="block w-full text-center px-6 py-4 bg-isha-orange text-white rounded-lg hover:bg-isha-navy transition font-bold text-lg shadow-sm">
                        Browse Sessions
                    </a>

                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <h3 class="font-semibold text-isha-brown-dark mb-3">Available Sessions:</h3>
                        <ul class="space-y-2 text-gray-600 text-sm">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 mr-2 text-blue-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Dhamma talks & meditation
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 mr-2 text-green-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Yoga classes for all levels
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 mr-2 text-purple-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Combined spiritual practice
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="bg-isha-cream rounded-lg p-8 border-l-4 border-isha-orange">
                <h2 class="text-2xl font-bold text-isha-brown-dark mb-6">Frequently Asked Questions</h2>

                <div class="space-y-6">
                    <div>
                        <h3 class="text-lg font-bold text-isha-brown-dark mb-2">Do I need prior experience to attend?</h3>
                        <p class="text-isha-brown">
                            Not at all! We welcome complete beginners. Our teachers are skilled at offering instruction
                            appropriate for all levels, from those just starting their journey to experienced practitioners.
                        </p>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold text-isha-brown-dark mb-2">What should I bring to a session?</h3>
                        <p class="text-isha-brown mb-2">
                            For meditation sessions, just bring yourself and an open mind. For yoga classes:
                        </p>
                        <ul class="list-disc list-inside text-isha-brown ml-4 space-y-1">
                            <li>Comfortable, loose-fitting clothing</li>
                            <li>Yoga mat (we can provide one if needed)</li>
                            <li>Water bottle</li>
                            <li>Small towel (optional)</li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold text-isha-brown-dark mb-2">Are sessions offered online?</h3>
                        <p class="text-isha-brown">
                            Currently, most of our sessions are in-person to foster community and direct teacher-student
                            connection. However, we do have video teachings available on our website. Contact us to
                            inquire about any online offerings.
                        </p>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold text-isha-brown-dark mb-2">What are your payment options?</h3>
                        <p class="text-isha-brown">
                            Many of our sessions are offered on a dana (donation) basis or have a nominal fee to cover
                            costs. We never want finances to be a barrier to practice. Please contact us if you have
                            concerns about pricing.
                        </p>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold text-isha-brown-dark mb-2">Can I visit before booking a session?</h3>
                        <p class="text-isha-brown">
                            Absolutely! We encourage you to reach out via WhatsApp to arrange a visit. We're happy to
                            show you around and answer any questions you might have.
                        </p>
                    </div>

                    <div>
                        <h3 class="text-lg font-bold text-isha-brown-dark mb-2">What if I need to cancel my booking?</h3>
                        <p class="text-isha-brown">
                            We understand that life happens. Please contact us via WhatsApp as soon as possible if you
                            need to cancel or reschedule. We appreciate at least 24 hours notice when possible so we
                            can offer your spot to others on the waitlist.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Additional Resources -->
            <div class="grid md:grid-cols-3 gap-6 mt-12">
                <a href="{{ route('quotes.index') }}"
                   class="bg-white rounded-lg p-6 shadow-sm hover:shadow-sm transition text-center">
                    <div class="text-4xl mb-3">📖</div>
                    <h3 class="font-bold text-isha-brown-dark mb-2">Browse Quotes</h3>
                    <p class="text-gray-600 text-sm">Explore wisdom teachings</p>
                </a>

                <a href="{{ route('gallery.teachings') }}"
                   class="bg-white rounded-lg p-6 shadow-sm hover:shadow-sm transition text-center">
                    <div class="text-4xl mb-3">🎥</div>
                    <h3 class="font-bold text-isha-brown-dark mb-2">Video Teachings</h3>
                    <p class="text-gray-600 text-sm">Watch recorded sessions</p>
                </a>

                <a href="{{ route('about') }}"
                   class="bg-white rounded-lg p-6 shadow-sm hover:shadow-sm transition text-center">
                    <div class="text-4xl mb-3">ℹ️</div>
                    <h3 class="font-bold text-isha-brown-dark mb-2">About Us</h3>
                    <p class="text-gray-600 text-sm">Learn our story</p>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Quote Banner -->
<section class="py-16 bg-isha-brown-dark text-white">
    <div class="container mx-auto px-4 text-center">
        <blockquote class="text-2xl md:text-3xl italic mb-6 leading-relaxed font-serif max-w-3xl mx-auto">
            "Have compassion for all beings, rich and poor alike; each has their suffering. Some suffer too much, others too little."
        </blockquote>
        <p class="text-xl font-semibold">— Buddha</p>
    </div>
</section>
@endsection
