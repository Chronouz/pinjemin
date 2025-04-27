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
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                inter: ["Inter", "sans-serif"], // Tambahkan font Inter
            },
            colors: {
                sky: "#a0dcfc",
                "dark-bg": "#1f2a2e", // Warna latar belakang utama
                "yellow-primary": "#e5ce57", // Warna kuning utama
                "yellow-hover": "#fef7e0", // Warna kuning hover
                "dark-text": "#1f2a2e", // Warna teks gelap
                "light-text": "#fef7e0", // Warna teks terang
                "gradient-start": "#fef7e0", // Gradasi awal
                "gradient-middle": "#e5ce57", // Gradasi tengah
                "gradient-end": "#fef7e0", // Gradasi akhir
            },
            spacing: {
                "15p": "15%", // Untuk top-[15%]
                "40p": "40%", // Untuk right-40
            },
            borderRadius: {
                "3xl": "1.5rem", // Untuk rounded-3xl
            },
            borderWidth: {
                4: "4px", // Untuk border-4
            },
            gradientColorStops: {
                "yellow-red-pink": ["#fef7e0", "#e5ce57", "#fef7e0"], // Gradasi warna
            },
        },
    },

    plugins: [forms],
};
