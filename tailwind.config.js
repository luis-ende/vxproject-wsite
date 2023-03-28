const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                'vxproject-primary': '#9900ff',
                'vxproject-secondary': '#ff00ff',
                'vxproject-border': '#cc99ff',
            },
            fontFamily: {
                sans: ['Questrial', ...defaultTheme.fontFamily.sans],
                montserrat: ['Montserrat']
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('flowbite/plugin'),
    ],
};
