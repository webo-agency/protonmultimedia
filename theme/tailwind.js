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
      padding: {
        default: '1rem',
      }
    },
    extend: {
      fontSize: {
        'sm': '12px',
        'sm-2': '16px',
        'base': '20px',
        'md': '25px',
        'lg': '40px',
        'xl': '60px',
        '8xl': ['80px', '80px']
      },
      borderRadius: {
        default: '5px',
      },
      margin: {
        '14': '3.75rem',
      },
      inset: {
       '0': 0,
       '1/2': '50%',
       '60px': '60px',
      },
      minHeight: {
        '700px': '700px',
      },
      textColor: {
        'white': '#fff',
        'black': '#000',
        'gray': '#dfdfdf',
        'gray-2': '#c9c9c9',
        'primary': '#01B9C3',
        'dark-blue': '#110D25',
        'dark-blue-2': '#171131',
        'dark-font': '#130E29',
      },
      backgroundColor: {
        'transparent': 'transparent',
        'white': '#fff',
        'black': '#000',
        'gray': '#dfdfdf',
        'gray-2': '#c9c9c9',
        'primary': '#01B9C3',
        'dark-blue': '#110D25',
        'dark-blue-2': '#171131',
        'dark-font': '#130E29',
      },
    },
  },
  variants: {},
  plugins: [],
}