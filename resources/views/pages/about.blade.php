@extends('layouts.app')

@section('title', 'About Us - Dhammasambhava')

@section('content')
<!-- Hero Section -->
<section class="bg-isha-cream py-24 md:py-32">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-isha-brown-dark mb-6">
                About Dhammasambhava
            </h1>
            <p class="text-xl md:text-2xl text-isha-brown font-light">
                A sanctuary for spiritual growth, inner peace, and awakening
            </p>
        </div>
    </div>
</section>

<!-- Our Story -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-isha-brown-dark mb-12 text-center">Our Story</h2>

            <div class="grid md:grid-cols-2 gap-12 items-center mb-12">
                <div class="order-2 md:order-1">
                    <div class="prose prose-lg max-w-none text-isha-brown leading-relaxed space-y-6">
                        <p>
                            Dhammasambhava, which means "The Arising of Truth," was founded with a simple yet profound mission:
                            to create a space where individuals can explore the timeless teachings of the Buddha and
                            the transformative practices of yoga in a supportive, nurturing environment.
                        </p>
                        <p>
                            In our fast-paced modern world, the need for inner peace and spiritual understanding has never been
                            greater. We believe that the ancient wisdom traditions offer profound tools for navigating life's
                            challenges with grace, compassion, and wisdom.
                        </p>
                        <p>
                            Our center brings together experienced teachers, dedicated practitioners, and seekers from all
                            walks of life who share a common intention: to awaken to their true nature and live with greater
                            awareness, kindness, and freedom.
                        </p>
                    </div>
                </div>

                <div class="order-1 md:order-2">
                    <div class="rounded-lg overflow-hidden shadow-lg">
                        <img src="{{ asset('images/472043777_1144632437668844_7167016747436132148_n.jpg') }}"
                             alt="Dhammasambhava Community"
                             class="w-full h-auto object-cover">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Mission & Values -->
<section class="py-16 bg-isha-cream">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-isha-brown-dark mb-12 text-center">Our Mission & Values</h2>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg p-8 shadow-lg border-t-4 border-blue-600">
                    <div class="text-5xl mb-4 text-center">🧘</div>
                    <h3 class="text-xl font-bold text-blue-900 mb-4 text-center">Authentic Teaching</h3>
                    <p class="text-isha-brown text-center">
                        We honor the authentic lineages of Buddhist meditation and traditional yoga while making
                        these teachings accessible to modern practitioners.
                    </p>
                </div>

                <div class="bg-white rounded-lg p-8 shadow-lg border-t-4 border-green-600">
                    <div class="text-5xl mb-4 text-center">💚</div>
                    <h3 class="text-xl font-bold text-green-900 mb-4 text-center">Compassionate Community</h3>
                    <p class="text-isha-brown text-center">
                        We foster a warm, inclusive community where everyone feels welcome regardless of their
                        background or level of experience.
                    </p>
                </div>

                <div class="bg-white rounded-lg p-8 shadow-lg border-t-4 border-purple-600">
                    <div class="text-5xl mb-4 text-center">✨</div>
                    <h3 class="text-xl font-bold text-purple-900 mb-4 text-center">Personal Transformation</h3>
                    <p class="text-isha-brown text-center">
                        We support each individual's unique journey of self-discovery, healing, and spiritual awakening
                        through personalized guidance and practice.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What We Offer -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-isha-brown-dark mb-12 text-center">What We Offer</h2>

            <div class="space-y-8">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg p-8 border-l-4 border-blue-600">
                    <h3 class="text-2xl font-bold text-blue-900 mb-4">Dhamma Teachings & Meditation</h3>
                    <p class="text-isha-brown leading-relaxed mb-4">
                        Explore the core teachings of Buddhism through guided meditation sessions, dhamma talks,
                        and discussion groups. Learn mindfulness, loving-kindness, and insight meditation practices
                        that can transform your daily life.
                    </p>
                    <ul class="space-y-2 text-isha-brown">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-2 text-blue-600 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Weekly meditation sessions for all levels
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-2 text-blue-600 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Monthly dhamma talks on Buddhist philosophy
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-2 text-blue-600 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Day-long retreats and intensive practice periods
                        </li>
                    </ul>
                </div>

                <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg p-8 border-l-4 border-green-600">
                    <h3 class="text-2xl font-bold text-green-900 mb-4">Yoga Classes</h3>
                    <p class="text-isha-brown leading-relaxed mb-4">
                        Experience the union of body, mind, and spirit through our traditional yoga classes.
                        Whether you're a beginner or experienced practitioner, our classes offer a path to
                        physical health, mental clarity, and spiritual growth.
                    </p>
                    <ul class="space-y-2 text-isha-brown">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-2 text-green-600 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Hatha yoga for strength and flexibility
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-2 text-green-600 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Restorative yoga for healing and relaxation
                        </li>
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-2 text-green-600 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Pranayama (breathwork) sessions
                        </li>
                    </ul>
                </div>

                <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-lg p-8 border-l-4 border-purple-600">
                    <h3 class="text-2xl font-bold text-purple-900 mb-4">Combined Sessions</h3>
                    <p class="text-isha-brown leading-relaxed">
                        Our unique combined sessions integrate both dhamma teachings and yoga practice, offering
                        a holistic approach to well-being. These sessions explore how physical practice supports
                        meditation and how mindfulness enhances yoga.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Teachers & Facilitators -->
<section class="py-16 bg-isha-cream">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-isha-brown-dark mb-6">Our Teachers</h2>
            <p class="text-lg text-isha-brown leading-relaxed mb-8">
                Our teachers are dedicated practitioners with years of training in their respective traditions.
                They bring a depth of personal practice, formal study, and genuine compassion to their teaching,
                creating an environment that is both serious and welcoming.
            </p>
            <p class="text-gray-600 italic">
                "A good teacher is like a candle – it consumes itself to light the way for others."
            </p>
        </div>
    </div>
</section>

<!-- Visit Us -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-isha-brown-dark mb-8 text-center">Visit Us</h2>

            <div class="bg-isha-cream rounded-lg p-8 border-l-4 border-isha-orange">
                <p class="text-isha-brown leading-relaxed mb-6">
                    We welcome visitors to join us for meditation sessions, yoga classes, and dhamma talks.
                    Whether you're new to these practices or have been on the path for years, you'll find a
                    supportive community here.
                </p>

                <div class="space-y-4">
                    <div class="flex items-start">
                        <svg class="w-6 h-6 mr-3 text-isha-orange flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <h4 class="font-bold text-isha-brown-dark mb-1">Location</h4>
                            <p class="text-isha-brown">Check individual session listings for specific locations</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <svg class="w-6 h-6 mr-3 text-isha-orange flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                        <div>
                            <h4 class="font-bold text-isha-brown-dark mb-1">When</h4>
                            <p class="text-isha-brown">Sessions run throughout the week – view our schedule for specific times</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <svg class="w-6 h-6 mr-3 text-isha-orange flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        <div>
                            <h4 class="font-bold text-isha-brown-dark mb-1">Contact</h4>
                            <p class="text-isha-brown">Reach out via WhatsApp for any questions or to arrange a visit</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-isha-brown-dark text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Begin Your Journey Today</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">
            Take the first step on your path to inner peace, wisdom, and spiritual awakening
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('sessions.index') }}"
               class="inline-block px-8 py-4 bg-white text-isha-orange rounded-lg hover:bg-gray-100 transition text-lg font-semibold shadow-lg">
                Browse Our Sessions
            </a>
            <a href="https://wa.me/94777345344?text=I'd like to learn more about Dhammasambhava"
               target="_blank"
               class="inline-block px-8 py-4 bg-green-600 text-white rounded-lg hover:bg-green-700 transition text-lg font-semibold shadow-lg">
                Contact Us on WhatsApp
            </a>
        </div>
    </div>
</section>
@endsection
