<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Quotes
Route::get('/quotes', [QuoteController::class, 'index'])->name('quotes.index');
Route::get('/quotes/{quote}', [QuoteController::class, 'show'])->name('quotes.show');

// Sessions
Route::get('/sessions', [SessionController::class, 'index'])->name('sessions.index');
Route::get('/sessions/{session}', [SessionController::class, 'show'])->name('sessions.show');

// Bookings
Route::get('/sessions/{session}/book', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/sessions/{session}/book', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/{booking}/success', [BookingController::class, 'success'])->name('bookings.success');

// Gallery & Teachings
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/teachings', [GalleryController::class, 'teachings'])->name('gallery.teachings');

// Static pages
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');

// SEO
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
