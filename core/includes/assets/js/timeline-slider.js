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
  });

  $(".timeline-year").on("click", function () {
    var slideIndex = $(this).data("slide");
    timelineSlider[0].slideTo(slideIndex + 1); // Navigate to the clicked slide
    // Remove "active" class from current active li
    $(".timeline-year.active").removeClass("active");

    // Set "active" class on the li with the corresponding data-slide value
    $(".timeline-year[data-slide='" + (slideIndex + 1) + "']").addClass(
      "active"
    );

    console.log("Current Index = " + (slideIndex + 1));
    var totalBars = 9;
    var currentIndex = slideIndex + 1;
    // Calculate the range for 1/9 of the bars
    var rangePercentage = 1 / totalBars;
    var startIndex = Math.floor(
      (currentIndex - 1) * rangePercentage * totalBars
    );
    var endIndex = Math.floor(currentIndex * rangePercentage * totalBars);

    console.log("totalBars = " + totalBars);
    console.log("startIndex = " + startIndex);
    console.log("EnDIndex = " + endIndex);
    $(".timeline-bar")
      .slice(startIndex, endIndex)
      .css("background-color", "black");
  });
});
