/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: ["./src/**/*.{html,js,php}"], 
  theme: {
    extend: {
      fontFamily: {
        'imul': ['Mulish', 'sans-serif'],
        'legend': ['Lexend', 'sans-serif']
      },
      width: {
        '2/2': '52%',
      },
      scale: {
        '80': '.8',
        '95': '.95'
      }
    },
  },
  plugins: [require("daisyui")],
  daisyui: {themes: ["light","dark"]}
}
