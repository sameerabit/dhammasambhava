<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\DhammaSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class BookingController extends Controller
{
    public function create(DhammaSession $session)
    {
        abort_if(!$session->is_active, 404);

        return view('bookings.create', compact('session'));
    }

    public function store(Request $request, DhammaSession $session)
    {
        abort_if(!$session->is_active, 404);

        // Rate limiting: max 3 bookings per IP per day (spam prevention)
        $key = 'booking-attempt:' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 3)) {
            throw ValidationException::withMessages([
                'email' => 'Too many booking attempts. Please try again tomorrow.',
            ]);
        }

        // Validate request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'whatsapp' => 'required|string|max:20',
            'notes' => 'nullable|string|max:1000',
        ]);

        // Create booking
        $booking = $session->bookings()->create([
            'name' => $validated['name'],
            'email' => $validated['email'] ?? null,
            'whatsapp' => $validated['whatsapp'],
            'booking_date' => now()->toDateString(),
            'booking_time' => now()->format('H:i'),
            'notes' => $validated['notes'] ?? null,
            'status' => 'pending',
            'ip_address' => $request->ip(),
        ]);

        // Increment rate limiter
        RateLimiter::hit($key, 86400); // 24 hours

        // TODO: Send email notification (will implement in next task)

        return redirect()->route('bookings.success', $booking)
            ->with('success', 'Your booking has been submitted successfully! We will contact you soon.');
    }

    public function success(Booking $booking)
    {
        return view('bookings.success', compact('booking'));
    }
}
