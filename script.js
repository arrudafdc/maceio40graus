$(function(){
  $(".destaques").slick({
    // autoplay: true,
    dots: true,
    prevArrow: $(".prev-arrow"),
    nextArrow: $(".next-arrow"),
    responsive: [
      {
        breakpoint: 800,
        settings: {
          arrows: false,
        }
      }
    ],
  });
});
