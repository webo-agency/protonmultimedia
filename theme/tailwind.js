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
    colors: {
      'white': '#fff',
      'black': '#000',
      'gray': '#dfdfdf',
      'gray-2': '#c9c9c9',
      'primary': '#01B9C3',
      'dark-blue': '#110D25',
      'dark-blue-2': '#171131',
      'dark-font': '#130E29',
    },
    screens: {
      'phone': '320px',
      'phone-wide': '480px',
      'phablet': '560px',
      'tablet-small': '640px',
      'tablet': '768px',
      'tablet-wide': '1024px',
      'desktop': '1248px',
      'desktop-wide': '1440px',
      'full-hd': '1920px'
    },
    container: {
      center: true,
      padding: {
        default: '1rem',
        'desktop-wide': '7rem',
        'full-hd': '7rem',
      }
    },
    extend: {
      scale: {
        'flip': '-1',
      },
      fontFamily: {
        'sans': ['Open Sans', 'sans-serif'],
        'special': ['Rajdhani', 'sans-serif'],
      },
      fontSize: {
        'sm': '12px',
        'sm-2': '16px',
        'base': ['20px', '30px'],
        'md': '25px',
        'lg': ['40px', '40px'],
        'xl': ['60px', '62px'],
        'xxl': '80px',
        '8xl': ['80px', '80px']
      },
      fontWeight: {
        'weight-extra-light': 200,
        'weight-light': 300,
        'weight-regular': 400,
        'weight-medium': 500,
        'weight-bold': 600,
        'weight-semi-bold': 700,
        'weight-extra-bold': 800,
      },
      lineHeight: {
        'line-height-sm': '12px',
        'line-height-normal': '21px',
        'line-height-md': '26px',
        'line-height-lg': '41px',
        'line-height-xl': '62px',
        'line-height-xxl': '80px',
      },
      borderRadius: {
        default: '5px',
      },
      margin: {
        '14': '3.75rem',
        '17': '4.375rem'
      },
      inset: {
       '0': 0,
       '1/2': '50%',
       '60px': '60px',
      },
      minHeight: {
        '700px': '700px',
      },
      backgroundColor: {
        'transparent': 'transparent',
      },
      linearGradientColors: { // defaults to {}
        'transparent-primary-offset': ['transparent', 'transparent 50%', '#01B9C3'],
      },
      borderColor: {
        'transparent': 'transparent',
      },
      flex: {
        '1/2': '0 0 50%',
      },
      maxWidth: {
        '1/4': '25%',
        '1/2': '50%',
        '3/4': '75%',
      },
      spacing: {
        '1/2': '50%',
      }
    },
  },
  variants: {
    visibility: ['responsive', 'hover', 'focus', 'group-hover'],
    height: ['responsive', 'group-hover'],
    opacity: ['responsive', 'hover', 'focus', 'active', 'group-hover']
  },
  plugins: [
    require('tailwindcss-gradients'),
  ],
}