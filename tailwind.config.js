import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: ["class", '[data-mode="dark"]'],
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            animation: {
                down: "toDown 0.5s forwards",
            },
            keyframes: {
                toDown: {
                    "0%": {
                        opacity: "0",
                        transform: "translateY(-1.9rem)",
                    },
                    initial: {
                        opacity: "1",
                        transform: "initial",
                    },
                },
            },
        },
    },
    plugins: [forms],
};
