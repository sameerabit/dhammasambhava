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
            'email' => 'required|email|max:255',
            'whatsapp' => 'required|string|max:20',
            'booking_date' => 'required|date|after:today',
            'booking_time' => 'required|date_format:H:i',
            'notes' => 'nullable|string|max:1000',
        ]);

        // Check capacity
        if (!$session->hasAvailableCapacity($validated['booking_date'], $validated['booking_time'])) {
            return back()->withErrors([
                'booking_date' => 'This session is full for the selected date and time. Please choose another slot.',
            ])->withInput();
        }

        // Create booking
        $booking = $session->bookings()->create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'whatsapp' => $validated['whatsapp'],
            'booking_date' => $validated['booking_date'],
            'booking_time' => $validated['booking_time'],
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
