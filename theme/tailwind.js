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
    fontFamily: {
      'sans': ['Open Sans', 'system-ui', '-apple-system', 'BlinkMacSystemFont', "Segoe UI", 'Roboto', "Helvetica Neue", 'Arial', "Noto Sans", 'sans-serif', "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"],
      'special': ['Rajdhani', 'sans-serif'],
    },
    colors: {
      'white': '#fff',
      'black': '#000',
      'gray': '#dfdfdf',
      'gray-2': '#c9c9c9',
      'gray-light': '#EBEBEB',
      'gray-lighter': '#F5F5F5',
      'gray-dark':'#D6D6D6',
      'primary': '#01B9C3',
      'dark-blue': '#110D25',
      'dark-blue-2': '#171131',
      'dark-font': '#130E29',
      'dark-purple': '#0F0B1F'
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
        'tablet-wide': '4.625rem',
        'desktop': '4.625rem',
        'desktop-wide': '4.625rem',
        'full-hd': '4.625rem',
      },
    },
    extend: {
      scale: {
        'flip': '-1',
      },
      fontSize: {
        'sm': '12px',
        'sm-2': '16px',
        'base': ['20px', '30px'],
        'md': '25px',
        'lg': ['40px', '40px'],
        'xl': ['60px', '60px'],
        'baner': ['80px', '80px']
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
        'minus-px': '-1px',
        '-1/2': '-50%',
        '-40%': '-40%',
        '0': '0',
        '1/2': '50%',
        'full': '100%',
        '1px': '1px',
        '50px': '50px',
        '100px': '100px',
        '420px': '420px',
        'screen': '100vh',
      },
      minHeight: {
        '200px': '200px',
        '300px': '300px',
        '430px': '430px',
        '500px': '500px',
        '550px': '550px',
        '700px': '700px',
        '900px': '900px',
      },
      maxHeight: {
        'none': 'none',
        '140px': '140px',
        '300px': '300px',
        '430px': '430px',
        '550px': '550px',
        '600px': '600px',
        '700px': '700px',
        '0': '0',
        '100%': '100%',
      },
      backgroundColor: {
        'transparent': 'transparent',
      },
      linearGradientColors: { // defaults to {}
        'transparent-primary-offset': ['transparent', 'transparent 50%', '#01B9C3'],
        'transparent-dark-blue-2-offset': ['transparent', '#171131'],
        'transparent-dark-blue-offset': ['transparent', 'transparent 50%', '#110D25'],
        'dark-blue': ['rgb(23,17,49)', 'rgba(23,17,49,1) 0%', 'rgba(17,13,37,1) 100%'],
        'primary-transparent-offset': ['rgba(1,185,195, 0.6)', 'rgba(1,185,195, 0.4) 60%', 'rgba(1,185,195, 0.1) 80%']
      },
      borderColor: {
        'transparent': 'transparent',
      },
      flex: {
        '0': '0 0 auto',
        '1/2': '0 0 50%',
      },
      maxWidth: {
        '1/4': '25%',
        '1/2': '50%',
        '3/4': '75%',
        '479px': '479px',
        '340px': '340px',
        '885px': '885px',
        '900px': '900px',
      },
      spacing: {
        '1/2': '50%',
        '35%': '35%',
        '60%': '60%',
        '72': '18rem',
        '80': '20rem',
        'container': '4.6875rem',
      },
      transitionProperty: {
        'max-h': 'max-height',
      },
      rotate: {
        '-61': '-61deg'
      },
      opacity: {
        'point': '0.1'
      },
      padding: {
        'smaller-container': '11rem',
        'post-container': '19.702rem',
        'header': '70.06px',
        'header-desktop': '82px',
      },
      listStyleType: {
        'bars': 'none'
      }
    },
  },
  variants: {
    textColor: ['responsive', 'hover', 'focus', 'active', 'group-hover'],
    translate: ['responsive', 'hover', 'focus', 'group-hover'],
    visibility: ['responsive', 'hover', 'focus', 'group-hover'],
    maxHeight: ['responsive', 'group-hover'],
    inset: ['responsive', 'group-hover'],
    opacity: ['responsive', 'hover', 'focus', 'active', 'group-hover'],
    justifyContent: ['responsive', 'hover', 'focus', 'group-hover'],
  },
  corePlugins: {
    container: false
  },
  plugins: [
    require('tailwindcss-gradients'),
    require('tailwindcss-blend-mode')(),
    function ({ addComponents }) {
      addComponents({
        '.container': {
          width: '100%',
          marginLeft: 'auto',
          marginRight: 'auto',
          paddingLeft: '1rem',
          paddingRight: '1rem',

          '@screen phone': {
            maxWidth: '100%',
            paddingLeft: '1rem',
            paddingRight: '1rem',
          },
          '@screen phone-wide': {
            maxWidth: '100%',
            paddingLeft: '1rem',
            paddingRight: '1rem',
          },
          '@screen phablet': {
            maxWidth: '100%',
            paddingLeft: '1rem',
            paddingRight: '1rem',
          },
          '@screen tablet-small': {
            maxWidth: '640px',
            paddingLeft: '1rem',
            paddingRight: '1rem',
          },
          '@screen tablet': {
            maxWidth: '768px',
            paddingLeft: '1rem',
            paddingRight: '1rem',
          },
          '@screen tablet-wide': {
            maxWidth: '1024px',
            paddingLeft: '4.625rem',
            paddingRight: '4.625rem',
          },
          '@screen desktop': {
            maxWidth: '1248px',
            paddingLeft: '4.625rem',
            paddingRight: '4.625rem',
          },
          '@screen desktop-wide': {
            maxWidth: '1772px',
            paddingLeft: '4.625rem',
            paddingRight: '4.625rem',
          },
          '@screen full-hd': {
            maxWidth: '1920px',
            paddingLeft: '4.625rem',
            paddingRight: '4.625rem',
          },
        }
      })
    }
  ],
}