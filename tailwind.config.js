import preset from './vendor/filament/support/tailwind.config.preset'

/** @type {import('tailwindcss').Config} */
export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './vendor/filament/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.tsx",
        "./resources/**/*.jsx",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            backgroundSize: {
                "size-ex": "200% 400%"
            },
            backgroundPosition: {
                "pos-0": "0% 0%",
                "pos-100": "100% 100%"
            },
            borderRadius: {
                ".44": "0.44rem",
                ".53": "0.53rem"
            },
            colors: {
                primary: {
                    50: "#eff6ff",
                    100: "#dbeafe",
                    200: "#bfdbfe",
                    300: "#93c5fd",
                    400: "#60a5fa",
                    500: "#3b82f6",
                    600: "#2563eb",
                    700: "#1d4ed8",
                    800: "#1e40af",
                    900: "#1e3a8a"
                }
            }
        },
        fontFamily: {
            sans: ["Fira Sans", "Noto Sans SC", "monospace"]
        }
    },
    plugins: [require("flowbite/plugin")]
}
