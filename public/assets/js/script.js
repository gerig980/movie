var splide = new Splide('.splide', {
  type: 'loop',
  perPage: 4,

  breakpoints: {
      1024: {
          perPage: 3,

      },
      767: {
          perPage: 2,

      },
      640: {
          perPage: 2,

      },
  },
  gap:'2em',
  autoplay: true,
  pagination: false,
});

splide.mount();


