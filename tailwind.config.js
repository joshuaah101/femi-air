module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
    extend: {
      backgroundImage : theme => ({
        'landing-1' : "url('/storage/img/landing/landing-1.jpg')",
        'landing-2' : "url('/storage/img/landing/landing-2.jpg')",
        'plane1-bg' : "url('/storage/img/landing/plane1.jpg')",
        'plane2-bg' : "url('/storage/img/landing/plane2.jpg')",
        'plane3-bg' : "url('/storage/img/landing/plane3.jpg')",
        'lagos-bg' : "url('/storage/img/states/lagos.jpg')",
        'anambra-bg' : "url('/storage/img/states/anambra.jpg')",
        'jos-bg' : "url('/storage/img/states/jos.jpg')",
        'abuja-bg' : "url('/storage/img/states/abuja.jpg')",
        'dubai-bg' : "url('/storage/img/states/dubai.jpg')",
        'kogi-bg' : "url('/storage/img/states/kogi.jpg')",
        'texas-bg' : "url('/storage/img/states/texas.jpg')",
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
