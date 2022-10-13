/** @type {import('tailwindcss').Config} */
module.exports = {
    theme: {
        screens: {
            sm: "640px",
            md: "768px",
            lg: "1024px",
            xl: "1280px",
        },
        extend: {
            fontFamily: {
                body: ["Inter", "sans-serif"],
            },
            screens: {
                "2-xl": "1350px",
            },
        },
    },
    darkMode: ["class", '[data-mode="dark"]'],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    plugins: [require("flowbite/plugin")],
};
