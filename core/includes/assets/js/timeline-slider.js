var timelineSlider; // Declare timelineSlider as a global variable

jQuery(document).ready(function ($) {
  timelineSlider = new Swiper(".swiper-container", {
    slidesPerView: 1,
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
    oon: {
      slideChange: function () {
        var activeSlide = timelineSlider.activeIndex;
        console.log();
        var yearElements = document.querySelectorAll(
          ".timeline-years .timeline-year"
        );

        // Remove the "active" class from all year elements
        yearElements.forEach(function (yearElement) {
          yearElement.classList.remove("active");
        });

        // Add the "active" class to the current year element
        yearElements[activeSlide].classList.add("active");
      },
    },
  });

  $(".timeline-year").on("click", function () {
    var slideIndex = $(this).data("slide");
    timelineSlider[0].slideTo(slideIndex + 1); // Navigate to the clicked slide
  });
});
