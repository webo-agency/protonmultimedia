module.exports = {
  purge: {
    enabled: false,
    content: [
      './theme/**/*.html',
      './theme/**/*.php',
      './theme/**/*.vue',
      './theme/**/*.jsx',
    ],
  },
  theme: {
    container: {
      center: true,
    },
    extend: {
      fontSize: {
        '8xl': ['80px', '80px']
      },
      margin: {
        '14': '3.75rem',
      },
      inset: {
       '0': 0,
       '1/2': '50%',
       '60px': '60px',
      }
    },
  },
  variants: {},
  plugins: [],
}