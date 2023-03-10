$(function(){
  $(".destaques").slick({
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