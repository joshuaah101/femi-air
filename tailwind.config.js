module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
    extend: {
      backgroundImage : theme => ({
        'landing-1' : "url('/storage/img/landing/landing-1.jpg')",
        'landing-2' : "url('/storage/img/landing/landing-2.jpg')"
      })
    },
    screens : {
        'xs' : '320px',
        'sm' : '481px',
        'md' : '1024px',
        'lg' : '1200px',
        'xl' : '1201px',
    }
  },
  variants: {},
  plugins: [
    require('@tailwindcss/ui'),
  ]
}
