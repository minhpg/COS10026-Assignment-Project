module.exports = {
  content: ["./**/*.{php,html,inc}"],
  theme: {
    extend: {},
  },
  plugins: [require('daisyui'), require('@tailwindcss/typography')],
}