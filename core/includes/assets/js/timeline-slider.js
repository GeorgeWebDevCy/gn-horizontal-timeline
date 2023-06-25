jQuery(document).ready(function ($) {
  var timelineSlider = new Swiper(".swiper-container", {
    loop: true,
    autoplay: timelineSliderSettings.autoplay, // Use the autoplay setting passed from PHP
    autoplayDelay: timelineSliderSettings.autoplayDelay, // Use the autoplay delay setting passed from PHP
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
  $(".timeline-year").on("click", function () {
    var slideIndex = $(this).data("slide");
    timelineSlider.slideTo(slideIndex); // Navigate to the clicked slide
  });
});
