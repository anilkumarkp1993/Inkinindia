

// slider
var swiper = new Swiper(".mySwiper", {
    loop: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

ScrollReveal().reveal(".container", {
    origin: "bottom",
    distance: "20px",
    opacity: 0,
  });

  


  //categories hover
      // Get the button element
      const giftButton = document.getElementById('giftButton');
      const giftBox = document.querySelector('.gift-box');
      
      // Add click event listener
      giftButton.addEventListener('click', function() {
          // Add pulse animation class
          giftButton.classList.add('pulse-animation');
          
          // Add a temporary shine effect to the entire box
          giftBox.style.boxShadow = '0 0 25px rgba(253, 224, 71, 0.7)';
          
          // Show clicked time
          const now = new Date();
          const timeString = now.toLocaleTimeString();
          
          // Create or update time display
          let timeDisplay = document.querySelector('.time-display');
          if (!timeDisplay) {
              timeDisplay = document.createElement('p');
              timeDisplay.className = 'time-display mt-2 text-gray-600 text-sm';
              giftBox.appendChild(timeDisplay);
          }
          timeDisplay.textContent = `Clicked at: ${timeString}`;
          
          // Remove animation and reset box shadow after 1.5 seconds
          setTimeout(function() {
              giftButton.classList.remove('pulse-animation');
              giftBox.style.boxShadow = '';
          }, 1500);
      });

