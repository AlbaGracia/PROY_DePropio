import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Open Sans", "ui-sans-serif", "system-ui", "sans-serif"],
            },
            colors: {
                cream: "#f1eae2",
                "deep-purple": "#221144",
                "bright-purple": "#6633bb",
                "royal-purple": "#442288",
                "soft-pink": "#eadfd2",
                "lime-yellow": "#d5d717",
            },
        },
    },

    plugins: [forms],
};
