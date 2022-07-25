/*
|-------------------------------------------------------------------------------
| Tailwind – The Utility-First CSS Framework
|-------------------------------------------------------------------------------
|
| Documentation at https://tailwindcss.com
|
*/

const colors = require('tailwindcss/colors')
const defaultTheme = require('tailwindcss/defaultTheme')
const customColors = {
  primary: {
    DEFAULT: '#f6841f',
    "50": "#ffb651",
    "100": "#ffac47",
    "200": "#ffa23d",
    "300": "#ff9833",
    "400": "#ff8e29",
    "500": "#f6841f",
    "600": "#ec7a15",
    "700": "#e2700b",
    "800": "#d86601",
    "900": "#ce5c00"
  },
  secondary: {
    DEFAULT: '#16c780',
    "50": "#48f9b2",
    "100": "#3eefa8",
    "200": "#34e59e",
    "300": "#2adb94",
    "400": "#20d18a",
    "500": "#16c780",
    "600": "#0cbd76",
    "700": "#02b36c",
    "800": "#00a962",
    "900": "#009f58"
  },
  accent: {
    DEFAULT: '#3c6b57',
    "50": "#6e9d89",
    "100": "#64937f",
    "200": "#5a8975",
    "300": "#507f6b",
    "400": "#467561",
    "500": "#3c6b57",
    "600": "#32614d",
    "700": "#285743",
    "800": "#1e4d39",
    "900": "#14432f"
  },
}

/**
 * Global Styles Plugin
 *
 * This plugin modifies Tailwind’s base styles using values from the theme.
 * https://tailwindcss.com/docs/adding-base-styles#using-a-plugin
 */
const globalStyles = ({ addBase, config }) => {
  addBase({
    p: {
      marginBottom: config('theme.margin.3'),
      lineHeight: config('theme.lineHeight.normal'),
    },
    'h1, h2, h3, h4, h5': {
      marginBottom: config('theme.margin.2'),
      lineHeight: config('theme.lineHeight.tight'),
    },
    h1: { fontSize: config('theme.fontSize.5xl') },
    h2: { fontSize: config('theme.fontSize.4xl') },
    h3: { fontSize: config('theme.fontSize.3xl') },
    h5: { fontSize: config('theme.fontSize.xl') },
    'ol, ul': { paddingLeft: config('theme.padding.4') },
    ol: { listStyleType: 'decimal' },
    ul: { listStyleType: 'none' },
  });
}

/**
 * Configuration
 */
module.exports = {
  theme: {
    extend: {
      colors: {
        black: colors.black,
        white: colors.white,
        gray: colors.gray,
        emerald: colors.emerald,
        indigo: colors.indigo,
        yellow: colors.yellow,
        ...customColors,
      },
    },
    fontFamily: {
      sans: ['Inter var', ...defaultTheme.fontFamily.sans],
    },
    shadows: {
      outline: '0 0 0 3px rgba(82,93,220,0.3)',
    },
    container: {
      center: true,
      padding: '1rem',
    },
  },
  variants: {
    extend: {
      opacity: ['disabled'],
    }
  },
  plugins: [
    globalStyles,
    require('@tailwindcss/forms'),
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/typography'),
  ],
}
