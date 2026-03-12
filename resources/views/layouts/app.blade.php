<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Dhammasambhava - A sanctuary for Dhamma teachings and Yoga practice. Join us for meditation, yoga sessions, and spiritual growth.')">
    <title>@yield('title', 'Dhammasambhava - Dhamma & Yoga Center')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Merriweather:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Merriweather', serif;
            background: #f5f1e9;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Inter', sans-serif;
        }

        .whatsapp-float {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: #25D366;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
            z-index: 50;
            transition: all 0.3s ease;
        }

        .whatsapp-float:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }
    </style>

    @stack('styles')
</head>
<body class="min-h-screen text-gray-800">
    <!-- Navigation -->
    <nav class="bg-white border-b border-isha-cream-dark shadow-sm sticky top-0 z-40">
        <div class="container mx-auto px-4 py-5">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    <div class="text-3xl">☸️</div>
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-isha-brown-dark">Dhammasambhava</h1>
                        <p class="text-xs text-isha-brown hidden md:block font-sans">Path to Peace & Wisdom</p>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="text-isha-brown hover:text-isha-orange font-medium font-sans transition-colors">Home</a>
                    <a href="{{ route('quotes.index') }}" class="text-isha-brown hover:text-isha-orange font-medium font-sans transition-colors">Quotes</a>
                    <a href="{{ route('sessions.index') }}" class="text-isha-brown hover:text-isha-orange font-medium font-sans transition-colors">Sessions</a>
                    <a href="{{ route('gallery.teachings') }}" class="text-isha-brown hover:text-isha-orange font-medium font-sans transition-colors">Teachings</a>
                    <a href="{{ route('gallery.index') }}" class="text-isha-brown hover:text-isha-orange font-medium font-sans transition-colors">Gallery</a>
                    <a href="{{ route('about') }}" class="text-isha-brown hover:text-isha-orange font-medium font-sans transition-colors">About</a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden text-isha-brown">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="hidden md:hidden mt-4 space-y-2 pb-4">
                <a href="{{ route('home') }}" class="block py-2 text-isha-brown hover:text-isha-orange font-sans">Home</a>
                <a href="{{ route('quotes.index') }}" class="block py-2 text-isha-brown hover:text-isha-orange font-sans">Quotes</a>
                <a href="{{ route('sessions.index') }}" class="block py-2 text-isha-brown hover:text-isha-orange font-sans">Sessions</a>
                <a href="{{ route('gallery.teachings') }}" class="block py-2 text-isha-brown hover:text-isha-orange font-sans">Teachings</a>
                <a href="{{ route('gallery.index') }}" class="block py-2 text-isha-brown hover:text-isha-orange font-sans">Gallery</a>
                <a href="{{ route('about') }}" class="block py-2 text-isha-brown hover:text-isha-orange font-sans">About</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-isha-brown-dark text-isha-cream mt-20">
        <div class="container mx-auto px-4 py-16">
            <div class="grid md:grid-cols-3 gap-12">
                <div>
                    <h3 class="text-xl font-bold text-isha-cream-light mb-4 font-sans">Dhammasambhava</h3>
                    <p class="text-sm leading-relaxed">A sanctuary for spiritual growth through Dhamma teachings and Yoga practice.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-isha-cream-light mb-4 font-sans">Quick Links</h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="{{ route('sessions.index') }}" class="hover:text-isha-orange transition-colors">Book a Session</a></li>
                        <li><a href="{{ route('quotes.index') }}" class="hover:text-isha-orange transition-colors">Daily Quotes</a></li>
                        <li><a href="{{ route('gallery.teachings') }}" class="hover:text-isha-orange transition-colors">Video Teachings</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-isha-orange transition-colors">About Us</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-isha-cream-light mb-4 font-sans">Connect</h3>
                    <p class="text-sm mb-4 leading-relaxed">Join us on our journey to peace and enlightenment.</p>
                    <a href="https://wa.me/94777345344" class="inline-block px-6 py-3 bg-isha-orange text-white rounded hover:bg-isha-navy transition-colors text-sm font-sans font-medium">
                        Contact via WhatsApp
                    </a>
                </div>
            </div>
            <div class="border-t border-isha-brown mt-12 pt-8 text-center text-sm">
                <p>&copy; {{ date('Y') }} Dhammasambhava. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/94777345344?text=Hello%2C%20I%27m%20interested%20in%20learning%20more%20about%20your%20sessions"
       target="_blank"
       class="whatsapp-float"
       title="Contact us on WhatsApp">
        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
    </a>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>

    @stack('scripts')
</body>
</html>
