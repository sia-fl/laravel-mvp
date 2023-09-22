// noinspection JSUnresolvedReference

import {defineConfig} from 'vite';
import {resolve} from 'node:path';
import laravel, {refreshPaths} from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

function path(directory) {
  return resolve(process.cwd(), '.', directory);
}

export default defineConfig({
  resolve: {
    alias: [{find: '@/', replacement: path('resources/js/')}]
  },
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: [
        ...refreshPaths,
        'app/Filament/**',
        'app/Forms/Components/**',
        'app/Livewire/**',
        'app/Infolists/Components/**',
        'app/Providers/Filament/**',
        'app/Tables/Columns/**'
      ]
    }),
    react()
  ]
});
