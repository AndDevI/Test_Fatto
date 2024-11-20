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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            keyframes: {
                highlight: {
                    '0%': { backgroundColor: '#d1fae5' }, 
                    '100%': { backgroundColor: 'transparent' },
                },
            },
            animation: {
                highlight: 'highlight 2s ease-in-out forwards',
            },
        },
    },
    plugins: [],
};
