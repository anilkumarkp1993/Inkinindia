<?php
session_start();
$first_name = isset($_SESSION['first_name']) ? $_SESSION['first_name'] : "Guest";
?>
   <?php
   //$header_path = $_SERVER['DOCUMENT_ROOT'] . "/Inkinindia/layout/header_menu.php";
    //include $header_path; ?>

    <!-- Offer Banner -->
    <div class="bg-yellow-300 mx-auto my-6 rounded-full p-4 text-center w-3/4 h-20 shadow-lg relative z-10 flex items-center justify-center offer-banner off-ban">
        <h3 class="text-xl font-bold text-gray-900 animate-pulse">
            🎉 10% OFF on all purchases! Limited Time Offer 🎉
        </h3>
    </div>

    <!-- Header Section -->
    <header class="flex flex-col items-center text-center bg-yellow-200 w-2/3 mx-auto rounded-lg p-6 shadow-lg -mt-10 relative z-20">
        <div class="w-full max-w-7xl grid grid-cols-1 md:grid-cols-2 items-center gap-6">
            <div class="space-y-6 text-center md:text-left w-full px-4">
                <h1 class="text-3xl font-extrabold leading-tight text-gray-900 header-text">
                    Make the <br>
                    Perfect Gift <br> For Your <br> Favorite Person
                </h1>
            </div>
            <div class="relative w-full header-swiper-container">
                <div class="swiper header-swiper w-full h-full">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide flex justify-center items-center">
                            <img src="./Images/wallet.png" class="rounded-lg shadow-lg" alt="Gift Image 1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Categories Section (Trending Giftz) -->
    <div class="container mx-auto px-10 py-10">
        <div class="max-w-5xl mx-auto text-center p-5">
            <h2 class="text-4xl md:text-5xl font-bold tracking-tight">Trending Giftz</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            <div class="trending-gift-card">
                <div class="image-container">
                    <img src="https://img.freepik.com/free-photo/high-angle-hands-opening-present_23-2149426609.jpg?t=st=1741669681~exp=1741673281~hmac=d43c6bfb8c4dcc183cfa76fb7db715c75bc5d9e2385c303c2206dfe6914912ba&w=740"
                        alt="Personalized">
                </div>
                <button id="giftButton">Personalized</button>
            </div>
            <div class="trending-gift-card">
                <div class="image-container">
                    <img src="https://orbiz.in/cdn/shop/files/13_1afd9107-9097-4983-ae8c-d17a97f2e1d4.jpg?v=1734674993&width=720"
                        alt="Corporate">
                </div>
                <button>Corporate</button>
            </div>
            <div class="trending-gift-card">
                <div class="image-container">
                    <img src="https://img.freepik.com/free-photo/front-view-holiday-gifts-empty-picture-frame-flowers-dark-red-abstract-background_140725-144981.jpg?t=st=1741669804~exp=1741673404~hmac=38546d5edb078a91cba0a36e4c7f5331f5587eee5d8acc461086a639afe58c1f&w=1380"
                        alt="Mementos">
                </div>
                <button>Mementos</button>
            </div>
            <div class="trending-gift-card">
                <div class="image-container">
                    <img src="https://img.freepik.com/free-photo/mirror-gold-ribbons_1252-422.jpg?t=st=1741669841~exp=1741673441~hmac=8462f4a9caa7ee68028ed4dcfa6ae8bb6555becb6e1f8971861ca582997b732c&w=1380"
                        alt="Home Decor">
                </div>
                <button>Home Decor</button>
            </div>
        </div>
    </div>

    <!-- Celebration Giftz -->
    <div class="container mx-auto py-10">
        <div class="max-w-5xl mx-auto text-center p-5">
            <h2 class="text-center text-4xl md:text-5xl font-bold tracking-tight mb-6">Celebration Giftz</h2>
        </div>
        <div class="swiper celebration-swiper px-4">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="card">
                        <img src="Images/BirthDay.jpg" alt="Birthday">
                        <p>Birthday</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card">
                        <img src="./Images/Weddi.jpg" alt="Wedding">
                        <p>Wedding</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card">
                        <img src="./Images/Anniversary.jpg" alt="Anniversary">
                        <p>Anniversary</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card">
                        <img src="./Images/Valentine.avif" alt="Valentine's Day">
                        <p>Valentine's Day</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card">
                        <img src="./Images/house.jpg" alt="House Warming">
                        <p>House Warming</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card">
                        <img src="./Images/fathers.jpg" alt="Father's Day">
                        <p>Father's Day</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card">
                        <img src="./Images/mothers.jpg" alt="Mother's Day">
                        <p>Mother's Day</p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="card">
                        <img src="./Images/teachers.jpg" alt="Teacher's Day">
                        <p>Teacher's Day</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us -->
    <div class="flex flex-wrap justify-around gap-6 mt-12 p-8">
        <div class="flex items-center gap-2 text-gray-700">
            <div class="text-center">
                <div class="text-black font-bold text-2xl">🚚</div>
                <p class="font-semibold text-2xl">Free Shipping</p>
                <p class="text-xl">You will love at great low prices.</p>
            </div>
        </div>
        <div class="flex items-center gap-2 text-gray-700">
            <div class="text-center">
                <div class="text-red-500 font-bold text-2xl">⏳</div>
                <p class="font-semibold text-2xl">Fast Dispatch</p>
                <p class="text-xl">Dispatched in 2-3 Days</p>
            </div>
        </div>
        <div class="flex items-center gap-2 text-gray-700">
            <div class="text-center">
                <div class="text-green-500 font-bold text-2xl">💳</div>
                <p class="font-semibold text-2xl">Flexible Payment</p>
                <p class="text-xl">Credit/Debit Cards, UPI, COD</p>
            </div>
        </div>
    </div>

   
 <?php
   $footer_path = $_SERVER['DOCUMENT_ROOT'] . "/Inkinindia/layout/footer_menu.php";
    include $footer_path; ?>
   


     <!-- Popup -->
    <div class="popup-overlay" id="popup">
        <div class="popup-content">
            <span class="close-btn" id="close-popup">&times;</span>
            
            <!-- Sign In Form -->
            <div id="login-form">
                <h2>Sign In</h2>
                <p>Please enter your details below to sign in.</p>
                <div class="form-group">
                    <label>Your Email*</label>
                    <input type="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label>Password*</label>
                    <input type="password" placeholder="Enter your password">
                </div>
                <div class="form-group">
                    <a href="#">Forgot your password?</a>
                </div>
                <button id="login-btn">Login</button>
                <button id="show-register">Create Account</button>
            </div>

            <!-- Register Form -->
            <div id="register-form" class="hidden">
                <h2>Create Account</h2>
                <p>Please register below to create an account.</p>
                <div class="form-group">
                    <label>First Name*</label>
                    <input type="text" placeholder="Enter your first name">
                </div>
                <div class="form-group">
                    <label>Last Name*</label>
                    <input type="text" placeholder="Enter your last name">
                </div>
                <div class="form-group">
                    <label>Your Email*</label>
                    <input type="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label>Password*</label>
                    <input type="password" placeholder="Enter your password">
                </div>
                <p style="font-size: 14px; color: gray;">
                    Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.
                </p>
                <button id="register-btn">Create Account</button>
                <button id="show-login">Login</button>
            </div>

        </div>
    </div>


    

</body>
<!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->
<script src="../Index.js"></script>
<script>
     $(document).ready(function() {
            // Open Popup
            $("#open-popup").click(function() {
                $("#popup").fadeIn();
            });

            // Close Popup
            $("#close-popup").click(function() {
                $("#popup").fadeOut();
            });

            // Show Register Form
            $("#show-register").click(function() {
                $("#login-form").hide();
                $("#register-form").fadeIn();
            });

            // Show Login Form
            $("#show-login").click(function() {
                $("#register-form").hide();
                $("#login-form").fadeIn();
            });
        });




       document.addEventListener("DOMContentLoaded", function() {
    const popupOverlay = document.getElementById("popup-overlay");
    const openPopupBtn = document.querySelector(".user-icon"); // Your button
    const closePopupBtn = document.querySelector(".close-btn");
    const headerSection = document.querySelector("header"); // Select header

    // Open popup and hide header
    openPopupBtn.addEventListener("click", function(event) {
        event.preventDefault();
        popupOverlay.style.display = "flex";
        headerSection.style.display = "none"; // Hide the header
    });

    // Close popup and show header
    closePopupBtn.addEventListener("click", function() {
        popupOverlay.style.display = "none";
        headerSection.style.display = "flex"; // Show the header back
    });
});



    // NavBar Search Input Box
    const searchIcon = document.getElementById('search-icon');
    const searchInput = document.getElementById('search-input');
    const navIcons = document.querySelector('.nav-icons');
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const navbarContainer = document.querySelector('.navbar-container');

    searchIcon.addEventListener('click', (e) => {
        e.preventDefault();
        searchInput.classList.toggle('w-64');
        searchInput.classList.toggle('opacity-100');
        searchInput.focus();

        if (window.innerWidth < 768) {
            if (searchInput.classList.contains('w-64')) {
                navbarContainer.classList.add('search-active');
                navIcons.style.display = 'flex'; // Keep container for layout
            } else {
                navbarContainer.classList.remove('search-active');
                navIcons.style.display = 'flex';
            }
        }
    });

    document.addEventListener('click', (event) => {
        if (!searchIcon.contains(event.target) && !searchInput.contains(event.target)) {
            searchInput.classList.remove('w-64', 'opacity-100');
            if (window.innerWidth < 768) {
                navbarContainer.classList.remove('search-active');
                navIcons.style.display = 'flex'; // Restore all icons
            }
        }
    });

    // NavBar Mobile Menu
    const mobileMenu = document.getElementById('mobile-menu');
    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Header Slider
    var headerSwiper = new Swiper(".header-swiper", {
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        speed: 1000,
        slidesPerView: 1,
        spaceBetween: 20,
        centeredSlides: false,
        slidesPerGroup: 1,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        }
    });

    // Celebration Slider
    var celebrationSwiper = new Swiper(".celebration-swiper", {
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        speed: 1000,
        slidesPerView: 1,
        spaceBetween: 20,
        centeredSlides: false,
        slidesPerGroup: 1,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            768: { 
                slidesPerView: 2 
            },
            1024: { 
                slidesPerView: 4 
            }
        }
    });

    // Set current year in footer
    document.getElementById('displayYear').textContent = new Date().getFullYear();



    document.addEventListener("DOMContentLoaded", function () {
    const popup = document.getElementById("popup");
    const closePopup = document.getElementById("close-popup");
    const showRegister = document.getElementById("show-register");
    const showLogin = document.getElementById("show-login");
    const loginForm = document.getElementById("login-form");
    const registerForm = document.getElementById("register-form");

    // Show Register Form
    showRegister.addEventListener("click", function () {
        loginForm.style.display = "none";
        registerForm.style.display = "block";
    });

    // Show Login Form
    showLogin.addEventListener("click", function () {
        registerForm.style.display = "none";
        loginForm.style.display = "block";
    });

    // Close Popup
    closePopup.addEventListener("click", function () {
        popup.style.display = "none";
    });

    // AJAX Register
    document.getElementById("register-btn").addEventListener("click", function () {
        const firstName = document.querySelector("#register-form input[placeholder='Enter your first name']").value;
        const lastName = document.querySelector("#register-form input[placeholder='Enter your last name']").value;
        const email = document.querySelector("#register-form input[placeholder='Enter your email']").value;
        const password = document.querySelector("#register-form input[placeholder='Enter your password']").value;

        if (!firstName || !lastName || !email || !password) {
            alert("All fields are required!");
            return;
        }

        const formData = new FormData();
        formData.append("action", "register");
        formData.append("first_name", firstName);
        formData.append("last_name", lastName);
        formData.append("email", email);
        formData.append("password", password);

        fetch("auth.php", { method: "POST", body: formData })
            .then(response => response.text())
            .then(data => {
                if (data === "success") {
                    alert("Registration successful! You can now log in.");
                    registerForm.style.display = "none";
                    loginForm.style.display = "block";
                } else {
                    alert(data);
                }
            });
    });

    document.getElementById("login-btn").addEventListener("click", function () {
    const email = document.querySelector("#login-form input[placeholder='Enter your email']").value.trim();
    const password = document.querySelector("#login-form input[placeholder='Enter your password']").value.trim();

    if (!email || !password) {
        alert("Both fields are required!");
        return;
    }

    const formData = new FormData();
    formData.append("action", "login");
    formData.append("email", email);
    formData.append("password", password);

    fetch("auth.php", { 
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") {
            alert("Login successful!");
            
            // Redirect based on user role
            if (data.role == 0) {
                window.location.href = "dashboard.php";
            } else if (data.role == 2) {
                window.location.href = "index.php";
            }
        } else {
            alert(data.message); // Show error message
        }
    })
    .catch(error => console.error("Error:", error));
});

});

</script>


</html>