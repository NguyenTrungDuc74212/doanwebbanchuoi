// Cấu hình slide chính
var swiper = new Swiper('.main-slider', {
  spaceBetween: 30,
  centeredSlides: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  pagination: {
    el: '.main-slider-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.main-slider-button-next',
    prevEl: '.main-slider-button-prev',
  },
});
//Cấu hình home product slide
var swiper = new Swiper('.home-product-slide', {
    slidesPerView: 4,
    spaceBetween: 30,
    autoplay: {
    delay: 5000,
    },
    pagination: {
      el: '.home-product-slide-pagination',
      clickable: true,
    },
    breakpoints: {
      1024: {
        slidesPerView: 4,
        spaceBetween: 40,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
      640: {
        slidesPerView: 1,
        spaceBetween: 20,
      },
      320: {
        slidesPerView: 1,
        spaceBetween: 10,
      }
    }
  });
// Cấu hình slide ý kiến khách hàng
var swiper = new Swiper('.customer-slider', {
  spaceBetween: 30,
  centeredSlides: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
});


// silde thumb detail product
var galleryThumbs = new Swiper('.gallery-thumbs', {
  spaceBetween: 10,
  slidesPerView: 4,
  freeMode: true,
  watchSlidesVisibility: true,
  watchSlidesProgress: true,
});
var galleryTop = new Swiper('.gallery-top', {
  spaceBetween: 10,
  navigation: {
    nextEl: '.gallery-next-top',
    prevEl: '.gallery-prev-top',
  },
  thumbs: {
    swiper: galleryThumbs
  }
});