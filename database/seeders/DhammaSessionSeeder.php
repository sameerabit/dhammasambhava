<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DhammaSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sessions = [
            [
                'title' => 'Morning Meditation & Mindfulness',
                'type' => 'dhamma',
                'description' => 'Start your day with peace and clarity through guided meditation and mindfulness practices. Suitable for beginners and experienced practitioners.',
                'duration' => 60,
                'price' => 0.00,
                'max_capacity' => 30,
                'location' => 'Main Meditation Hall',
                'is_active' => true,
            ],
            [
                'title' => 'Hatha Yoga for Beginners',
                'type' => 'yoga',
                'description' => 'Learn the fundamentals of Hatha Yoga with gentle asanas, pranayama, and relaxation techniques. Perfect for those new to yoga practice.',
                'duration' => 90,
                'price' => 15.00,
                'max_capacity' => 20,
                'location' => 'Yoga Studio',
                'is_active' => true,
            ],
            [
                'title' => 'Evening Dhamma Talk & Discussion',
                'type' => 'dhamma',
                'description' => 'Weekly dhamma discourse followed by Q&A session. Explore Buddhist teachings and their practical application in daily life.',
                'duration' => 120,
                'price' => 0.00,
                'max_capacity' => null, // Unlimited
                'location' => 'Main Hall',
                'is_active' => true,
            ],
            [
                'title' => 'Vinyasa Flow Yoga',
                'type' => 'yoga',
                'description' => 'Dynamic yoga practice linking breath with movement. Build strength, flexibility, and mental focus through flowing sequences.',
                'duration' => 75,
                'price' => 20.00,
                'max_capacity' => 15,
                'location' => 'Yoga Studio',
                'is_active' => true,
            ],
            [
                'title' => 'Walking Meditation in Nature',
                'type' => 'dhamma',
                'description' => 'Practice mindful walking in our peaceful gardens. Cultivate present-moment awareness while connecting with nature.',
                'duration' => 45,
                'price' => 0.00,
                'max_capacity' => 25,
                'location' => 'Temple Gardens',
                'is_active' => true,
            ],
            [
                'title' => 'Yoga & Meditation Retreat Day',
                'type' => 'both',
                'description' => 'Full day immersive experience combining yoga asana practice, meditation sessions, dhamma teachings, and vegetarian meals. A transformative journey of self-discovery.',
                'duration' => 480, // 8 hours
                'price' => 75.00,
                'max_capacity' => 20,
                'location' => 'Retreat Center',
                'is_active' => true,
            ],
            [
                'title' => 'Restorative Yoga & Deep Relaxation',
                'type' => 'yoga',
                'description' => 'Gentle, therapeutic yoga practice using props to support the body in restful poses. Perfect for stress relief and healing.',
                'duration' => 60,
                'price' => 18.00,
                'max_capacity' => 12,
                'location' => 'Quiet Room',
                'is_active' => true,
            ],
            [
                'title' => 'Loving-Kindness Meditation (Metta)',
                'type' => 'dhamma',
                'description' => 'Cultivate compassion and loving-kindness towards yourself and all beings. Learn traditional metta meditation practices.',
                'duration' => 45,
                'price' => 0.00,
                'max_capacity' => null,
                'location' => 'Main Meditation Hall',
                'is_active' => true,
            ],
        ];

        foreach ($sessions as $session) {
            \App\Models\DhammaSession::create($session);
        }

        echo "Created " . count($sessions) . " dhamma sessions\n";
    }
}
