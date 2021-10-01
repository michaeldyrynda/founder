module.exports = {
  mode: 'jit',
  purge: ['./app/**/*.php', './resources/**/*.{js,vue,css,blade.php}'],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
}
