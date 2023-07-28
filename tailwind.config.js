/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontFamily: {
            poppins: ["Poppins", "sans-serif"],
        },
        extend: {
            colors: {
                primary: "#ED1C24",
                lightPrimary: "#F07A80",
                veryLightGray: "#F3FBFF",
                lightBlack: "#1B1D26",
                veryLightBlack: "#263238",
            },
        },
    },
    plugins: [],
};
