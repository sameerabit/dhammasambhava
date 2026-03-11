<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $media = [
            [
                'type' => 'youtube',
                'title' => 'Introduction to Mindfulness Meditation',
                'description' => 'Learn the basics of mindfulness meditation practice. Perfect for beginners starting their meditation journey.',
                'youtube_url' => 'https://www.youtube.com/watch?v=6p_yaNFSYao',
                'category' => 'teaching',
                'is_published' => true,
                'display_order' => 1,
            ],
            [
                'type' => 'youtube',
                'title' => 'The Four Noble Truths Explained',
                'description' => 'A comprehensive explanation of the core teachings of Buddhism - the Four Noble Truths.',
                'youtube_url' => 'https://www.youtube.com/watch?v=HRVxpp4receipts',
                'category' => 'teaching',
                'is_published' => true,
                'display_order' => 2,
            ],
            [
                'type' => 'youtube',
                'title' => 'Loving-Kindness Meditation Practice',
                'description' => 'Guided metta (loving-kindness) meditation to cultivate compassion for yourself and others.',
                'youtube_url' => 'https://www.youtube.com/watch?v=sz7cpV7ERsM',
                'category' => 'teaching',
                'is_published' => true,
                'display_order' => 3,
            ],
            [
                'type' => 'youtube',
                'title' => 'Yoga for Complete Beginners',
                'description' => 'Gentle introduction to yoga practice with basic poses and breathing exercises.',
                'youtube_url' => 'https://www.youtube.com/watch?v=v7AYKMP6rOE',
                'category' => 'teaching',
                'is_published' => true,
                'display_order' => 4,
            ],
            [
                'type' => 'youtube',
                'title' => 'Understanding the Noble Eightfold Path',
                'description' => 'Practical guidance on following the Buddhist path to liberation and enlightenment.',
                'youtube_url' => 'https://www.youtube.com/watch?v=7yRe1qZVs1E',
                'category' => 'teaching',
                'is_published' => true,
                'display_order' => 5,
            ],
        ];

        foreach ($media as $item) {
            \App\Models\Media::create($item);
        }

        echo "Created " . count($media) . " media items\n";
    }
}
