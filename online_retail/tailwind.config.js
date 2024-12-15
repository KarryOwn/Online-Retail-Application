import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'bbg': "url('/images/background.jpg')",
            },
            transitionTimingFunction: {
                'in-out-sine': 'cubic-bezier(0.45, 0.05, 0.55, 0.95)',
            },
            transitionDuration: {
                '700ms': '700ms',
            },
        },
    },

    plugins: [forms],
};
