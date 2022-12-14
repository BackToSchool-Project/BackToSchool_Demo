/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./assets/**/*.{vue,js,ts,jsx,tsx}",
      "./templates/**/*.{html,twig}"
  ],
  theme: {
      extend: {},
  },
  plugins: [
      require("tailgrids/plugin"),
      require("daisyui"),
      require("@tailwindcss/forms")({
          strategy: 'base', // only generate global styles
      }),
  ]
}
