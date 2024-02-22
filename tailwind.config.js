/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    'templates/**/*.html.twig',
    'assets/js/**/*.js',
    //'assets/js/**/*.jsx', // Si vous utilisez des fichiers React JSX
    ],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/container-queries'),
  ],
};

