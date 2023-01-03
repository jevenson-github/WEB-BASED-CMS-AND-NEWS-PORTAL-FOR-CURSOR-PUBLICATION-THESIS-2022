/** @type {import('tailwindcss').Config} */

const colors = require('tailwindcss/colors')

module.exports = {
  content: ['auth/*.php',
    'scripts/*.js',
    'ui/*.php',
    'staffs/*.php',
    'contents/*.php',
    '*.php',
    '*.html',],
  theme: {
    screens: {
      sm: "640px",
      md: "768px",
      lg: "1024px",
      xl: "1280px",
      "2xl": "1536px",
    },

    extend: {
      colors: {
        sky: colors.sky,
        teal: colors.teal,
        cyan: colors.cyan,
        rose: colors.rose,
      },
    },

    
    spacing: {
      px: "1px",
      0: "0",
      0.5: "0.125rem",
      1: "0.25rem",
      1.5: "0.375rem",
      2: "0.5rem",
      2.5: "0.625rem",
      3: "0.75rem",
      3.5: "0.875rem",
      4: "1rem",
      5: "1.25rem",
      6: "1.5rem",
      7: "1.75rem",
      8: "2rem",
      9: "2.25rem",
      10: "2.5rem",
      11: "2.75rem",
      12: "3rem",
      14: "3.5rem",
      16: "4rem",
      20: "5rem",
      24: "6rem",
      28: "7rem",
      32: "8rem",
      36: "9rem",
      40: "10rem",
      44: "11rem",
      48: "12rem",
      52: "13rem",
      56: "14rem",
      60: "15rem",
      64: "16rem",
      72: "18rem",
      80: "20rem",
      96: "24rem",
    },
    
    color: {
      'cursorOrange': {
        DEFAULT: '#f39c12',
        100: '#fdf7e1',
        200: '#fbeab4',
        300: '#f9dd83',
        400: '#f7d153',
        500: '#f5c630',
        600: '#f4bc1b',
        700: '#f3af15',
        800: '#f28d0f',
        900: '#f16f0b',
      },
      'cursorGray': {
        DEFAULT: '#272626',
        100: '#fcfbfb',
        200: '#f7f6f6',
        300: '#f2f1f1',
        400: '#e7e5e5',
        500: '#c4c3c3',
        600: '#a6a5a5',
        700: '#7c7b7b',
        800: '#686767',
        900: '#494848',
      },
      
    },
    extend: {
      fontFamily: {
        sans: ['Inter var'],
      },
    },
  },
  plugins: [
    require("@tailwindcss/typography"),
    require("@tailwindcss/forms"),
    require("@tailwindcss/line-clamp"),
    require("@tailwindcss/aspect-ratio"),
    require('flowbite/plugin')
  ],
};
