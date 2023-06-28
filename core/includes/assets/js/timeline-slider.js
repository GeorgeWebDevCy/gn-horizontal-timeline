document.addEventListener("DOMContentLoaded", function () {
  // Initialize Swiper
  var swiper = new Swiper(".swiper-container", {
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    on: {
      slideChange: function () {
        var activeIndex = swiper[0].activeIndex;
        setActiveTimelineItem(activeIndex);
      },
    },
  });

  // Handle timeline item click
  var timelineItems = document.querySelectorAll(".timeline-item");
  timelineItems.forEach(function (item) {
    item.addEventListener("click", function () {
      var slideIndex = parseInt(this.getAttribute("data-slide"));
      swiper[0].slideTo(slideIndex);
      setActiveTimelineItem(slideIndex);
    });
  });

  // Set active timeline item
  function setActiveTimelineItem(index) {
    timelineItems.forEach(function (item) {
      item.classList.remove("active");
    });
    // Add active class to current and previous slides
    for (var i = 0; i <= index; i++) {
      timelineItems[i].classList.add("active");
    }
  }
});
