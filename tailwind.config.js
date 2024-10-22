/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      backgroundImage: {
        'gradient-three-colors':
          'linear-gradient(to right, #F72585, #5F69D3, #7209B7)',
        'gradient-heading': 'linear-gradient(to right, #7209B7, #3A0CA3)',
      },
      boxShadow: {
        custom: '1px 1px 40px rgba(0,0,0,0.2), 0 -1px 10px rgba(0,0,0,0.1)',
      },
    },
  },
  plugins: [],
}