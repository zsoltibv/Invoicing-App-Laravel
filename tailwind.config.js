/** @type {import('tailwindcss').Config} */
module.exports = {
    theme: {
        screens: {
            sm: "640px",
            md: "768px",
            lg: "1024px",
            xl: "1350px",
        },
        extend: {
            fontFamily: {
                body: ["Inter", "sans-serif"],
            },
        },
    },
    darkMode: ["class", '[data-mode="dark"]'],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    plugins: [
      require('flowbite/plugin')
    ],
};
