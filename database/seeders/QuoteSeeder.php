<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quotes = [
            [
                'text' => 'The mind is everything. What you think, you become.',
                'author' => 'Buddha',
                'is_published' => true,
                'display_order' => 1,
            ],
            [
                'text' => 'Do not dwell in the past, do not dream of the future, concentrate the mind on the present moment.',
                'author' => 'Buddha',
                'is_published' => true,
                'display_order' => 2,
            ],
            [
                'text' => 'Peace comes from within. Do not seek it without.',
                'author' => 'Buddha',
                'is_published' => true,
                'display_order' => 3,
            ],
            [
                'text' => 'You yourself, as much as anybody in the entire universe, deserve your love and affection.',
                'author' => 'Buddha',
                'is_published' => true,
                'display_order' => 4,
            ],
            [
                'text' => 'Three things cannot be long hidden: the sun, the moon, and the truth.',
                'author' => 'Buddha',
                'is_published' => true,
                'display_order' => 5,
            ],
            [
                'text' => 'In the end, only three things matter: how much you loved, how gently you lived, and how gracefully you let go of things not meant for you.',
                'author' => 'Buddha',
                'is_published' => true,
                'display_order' => 6,
            ],
            [
                'text' => 'Hatred does not cease by hatred, but only by love; this is the eternal rule.',
                'author' => 'Buddha',
                'is_published' => true,
                'display_order' => 7,
            ],
            [
                'text' => 'The root of suffering is attachment.',
                'author' => 'Buddha',
                'is_published' => true,
                'display_order' => 8,
            ],
            [
                'text' => 'Better than a thousand hollow words, is one word that brings peace.',
                'author' => 'Buddha',
                'is_published' => true,
                'display_order' => 9,
            ],
            [
                'text' => 'Health is the greatest gift, contentment the greatest wealth, faithfulness the best relationship.',
                'author' => 'Buddha',
                'is_published' => true,
                'display_order' => 10,
            ],
        ];

        foreach ($quotes as $quote) {
            \App\Models\Quote::create($quote);
        }

        echo "Created " . count($quotes) . " quotes\n";
    }
}
