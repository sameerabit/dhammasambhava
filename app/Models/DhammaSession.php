<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DhammaSession extends Model
{
    protected $table = 'dhamma_sessions';

    protected $fillable = [
        'title',
        'type',
        'description',
        'duration',
        'price',
        'max_capacity',
        'location',
        'is_active',
        'image_path',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'price' => 'decimal:2',
        'duration' => 'integer',
        'max_capacity' => 'integer',
    ];

    /**
     * Get the bookings for this session.
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function getDurationLabelAttribute(): string
    {
        if (! $this->duration) {
            return '';
        }

        $hours = intdiv($this->duration, 60);
        $minutes = $this->duration % 60;

        if ($hours && $minutes) {
            return "{$hours} hr {$minutes} min";
        }
        if ($hours) {
            return $hours . ' ' . ($hours === 1 ? 'hour' : 'hours');
        }
        return "{$minutes} minutes";
    }

    public function hasAvailableCapacity(string $date, string $time): bool
    {
        if ($this->max_capacity === null) {
            return true; // Unlimited capacity
        }

        $confirmedBookings = $this->bookings()
            ->where('booking_date', $date)
            ->where('booking_time', $time)
            ->whereIn('status', ['pending', 'confirmed'])
            ->count();

        return $confirmedBookings < $this->max_capacity;
    }
}
