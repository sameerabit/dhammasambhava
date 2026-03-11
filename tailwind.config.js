import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'system-ui', ...defaultTheme.fontFamily.sans],
                serif: ['Merriweather', 'Georgia', ...defaultTheme.fontFamily.serif],
            },
            colors: {
                'isha': {
                    'brown-dark': '#28231e',
                    'brown': '#464038',
                    'cream-light': '#f5f1e9',
                    'cream': '#dbd4c6',
                    'cream-dark': '#e4ded4',
                    'beige': '#E0D7C8',
                    'orange': '#cf4520',
                    'navy': '#000054',
                },
            },
        },
    },
    plugins: [],
};
