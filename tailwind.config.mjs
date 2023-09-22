import preset from './vendor/filament/support/tailwind.config.preset'

// noinspection JSUnusedGlobalSymbols
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
  ],
}
