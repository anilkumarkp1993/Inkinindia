

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




      // --------new----------

//       $(document).ready(function() {
//             // Open Popup
//             $("#open-popup").click(function() {
//                 $("#popup").fadeIn();
//             });

//             // Close Popup
//             $("#close-popup").click(function() {
//                 $("#popup").fadeOut();
//             });

//             // Show Register Form
//             $("#show-register").click(function() {
//                 $("#login-form").hide();
//                 $("#register-form").fadeIn();
//             });

//             // Show Login Form
//             $("#show-login").click(function() {
//                 $("#register-form").hide();
//                 $("#login-form").fadeIn();
//             });
//         });




//        document.addEventListener("DOMContentLoaded", function() {
//     const popupOverlay = document.getElementById("popup-overlay");
//     const openPopupBtn = document.querySelector(".user-icon"); // Your button
//     const closePopupBtn = document.querySelector(".close-btn");
//     const headerSection = document.querySelector("header"); // Select header

//     // Open popup and hide header
//     openPopupBtn.addEventListener("click", function(event) {
//         event.preventDefault();
//         popupOverlay.style.display = "flex";
//         headerSection.style.display = "none"; // Hide the header
//     });

//     // Close popup and show header
//     closePopupBtn.addEventListener("click", function() {
//         popupOverlay.style.display = "none";
//         headerSection.style.display = "flex"; // Show the header back
//     });
// });



//     // NavBar Search Input Box
//     const searchIcon = document.getElementById('search-icon');
//     const searchInput = document.getElementById('search-input');
//     const navIcons = document.querySelector('.nav-icons');
//     const mobileMenuButton = document.getElementById('mobile-menu-button');
//     const navbarContainer = document.querySelector('.navbar-container');

//     searchIcon.addEventListener('click', (e) => {
//         e.preventDefault();
//         searchInput.classList.toggle('w-64');
//         searchInput.classList.toggle('opacity-100');
//         searchInput.focus();

//         if (window.innerWidth < 768) {
//             if (searchInput.classList.contains('w-64')) {
//                 navbarContainer.classList.add('search-active');
//                 navIcons.style.display = 'flex'; // Keep container for layout
//             } else {
//                 navbarContainer.classList.remove('search-active');
//                 navIcons.style.display = 'flex';
//             }
//         }
//     });

//     document.addEventListener('click', (event) => {
//         if (!searchIcon.contains(event.target) && !searchInput.contains(event.target)) {
//             searchInput.classList.remove('w-64', 'opacity-100');
//             if (window.innerWidth < 768) {
//                 navbarContainer.classList.remove('search-active');
//                 navIcons.style.display = 'flex'; // Restore all icons
//             }
//         }
//     });

//     // NavBar Mobile Menu
//     const mobileMenu = document.getElementById('mobile-menu');
//     mobileMenuButton.addEventListener('click', () => {
//         mobileMenu.classList.toggle('hidden');
//     });

//     // Header Slider
//     var headerSwiper = new Swiper(".header-swiper", {
//         loop: true,
//         autoplay: {
//             delay: 2500,
//             disableOnInteraction: false,
//         },
//         speed: 1000,
//         slidesPerView: 1,
//         spaceBetween: 20,
//         centeredSlides: false,
//         slidesPerGroup: 1,
//         pagination: {
//             el: ".swiper-pagination",
//             clickable: true,
//         },
//         navigation: {
//             nextEl: ".swiper-button-next",
//             prevEl: ".swiper-button-prev",
//         }
//     });

//     // Celebration Slider
//     var celebrationSwiper = new Swiper(".celebration-swiper", {
//         loop: true,
//         autoplay: {
//             delay: 2500,
//             disableOnInteraction: false,
//         },
//         speed: 1000,
//         slidesPerView: 1,
//         spaceBetween: 20,
//         centeredSlides: false,
//         slidesPerGroup: 1,
//         pagination: {
//             el: ".swiper-pagination",
//             clickable: true,
//         },
//         navigation: {
//             nextEl: ".swiper-button-next",
//             prevEl: ".swiper-button-prev",
//         },
//         breakpoints: {
//             768: { 
//                 slidesPerView: 2 
//             },
//             1024: { 
//                 slidesPerView: 4 
//             }
//         }
//     });

//     // Set current year in footer
//     document.getElementById('displayYear').textContent = new Date().getFullYear();



//     document.addEventListener("DOMContentLoaded", function () {
//     const popup = document.getElementById("popup");
//     const closePopup = document.getElementById("close-popup");
//     const showRegister = document.getElementById("show-register");
//     const showLogin = document.getElementById("show-login");
//     const loginForm = document.getElementById("login-form");
//     const registerForm = document.getElementById("register-form");

//     // Show Register Form
//     showRegister.addEventListener("click", function () {
//         loginForm.style.display = "none";
//         registerForm.style.display = "block";
//     });

//     // Show Login Form
//     showLogin.addEventListener("click", function () {
//         registerForm.style.display = "none";
//         loginForm.style.display = "block";
//     });

//     // Close Popup
//     closePopup.addEventListener("click", function () {
//         popup.style.display = "none";
//     });

//     // AJAX Register
//     document.getElementById("register-btn").addEventListener("click", function () {
//         const firstName = document.querySelector("#register-form input[placeholder='Enter your first name']").value;
//         const lastName = document.querySelector("#register-form input[placeholder='Enter your last name']").value;
//         const email = document.querySelector("#register-form input[placeholder='Enter your email']").value;
//         const password = document.querySelector("#register-form input[placeholder='Enter your password']").value;

//         if (!firstName || !lastName || !email || !password) {
//             alert("All fields are required!");
//             return;
//         }

//         const formData = new FormData();
//         formData.append("action", "register");
//         formData.append("first_name", firstName);
//         formData.append("last_name", lastName);
//         formData.append("email", email);
//         formData.append("password", password);

//         fetch("auth.php", { method: "POST", body: formData })
//             .then(response => response.text())
//             .then(data => {
//                 if (data === "success") {
//                     alert("Registration successful! You can now log in.");
//                     registerForm.style.display = "none";
//                     loginForm.style.display = "block";
//                 } else {
//                     alert(data);
//                 }
//             });
//     });

//     document.getElementById("login-btn").addEventListener("click", function () {
//     const email = document.querySelector("#login-form input[placeholder='Enter your email']").value.trim();
//     const password = document.querySelector("#login-form input[placeholder='Enter your password']").value.trim();

//     if (!email || !password) {
//         alert("Both fields are required!");
//         return;
//     }

//     const formData = new FormData();
//     formData.append("action", "login");
//     formData.append("email", email);
//     formData.append("password", password);

//     fetch("auth.php", { 
//         method: "POST",
//         body: formData
//     })
//     .then(response => response.json())
//     .then(data => {
//         if (data.status === "success") {
//             alert("Login successful!");
            
//             // Redirect based on user role
//             if (data.role == 0) {
//                 window.location.href = "dashboard.php";
//             } else if (data.role == 2) {
//                 window.location.href = "index.php";
//             }
//         } else {
//             alert(data.message); // Show error message
//         }
//     })
//     .catch(error => console.error("Error:", error));
// });

// });

