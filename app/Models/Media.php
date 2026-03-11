<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = [
        'type',
        'title',
        'description',
        'file_path',
        'youtube_url',
        'category',
        'is_published',
        'display_order',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'display_order' => 'integer',
    ];

    /**
     * Scope to get only published media.
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope to get media by type.
     */
    public function scopeOfType($query, string $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Scope to get media by category.
     */
    public function scopeInCategory($query, string $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Scope to order media by display order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order')->orderBy('created_at', 'desc');
    }

    /**
     * Get the media URL (for images) or YouTube embed URL.
     */
    public function getMediaUrlAttribute(): ?string
    {
        if ($this->type === 'youtube' && $this->youtube_url) {
            // Extract YouTube video ID and return embed URL
            preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $this->youtube_url, $matches);
            $videoId = $matches[1] ?? null;
            return $videoId ? "https://www.youtube.com/embed/{$videoId}" : null;
        }

        return $this->file_path ? asset('storage/' . $this->file_path) : null;
    }
}
