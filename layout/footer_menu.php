 <!-- Footer -->
    <section class="bg-gray-100 py-10">
        <div class="container mx-auto px-6">
            <div class="flex justify-center space-x-6 mb-8">
                <a href="#" class="hover:text-blue-500 transition">
                    <i class="fa-brands fa-facebook-f text-2xl text-blue-500"></i>
                </a>
                <a href="#" class="hover:text-blue-400 transition">
                    <i class="fa-brands fa-x-twitter text-blue-500 text-2xl"></i>
                </a>
                <a href="#" class="hover:text-pink-500 transition">
                    <i class="fa-brands fa-instagram text-2xl text-transparent bg-gradient-to-r from-yellow-400 via-pink-500 to-purple-600 bg-clip-text"></i>
                </a>
                <a href="#" class="hover:text-red-500 transition">
                    <i class="fa-brands fa-youtube text-2xl text-red-600"></i>
                </a>
            </div>
            <div class="grid md:grid-cols-4 gap-8 text-center md:text-left">
                <div>
                    <h6 class="text-lg font-semibold mb-3">ABOUT US</h6>
                    <p class="text-sm text-gray-400">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum.
                    </p>
                </div>
                <div>
                    <h5 class="text-lg font-semibold mb-3">Newsletter</h5>
                    <form class="flex flex-col space-y-3">
                        <input type="email" placeholder="Enter your email" class="p-2 rounded">
                        <button
                            class="bg-yellow-500 text-white py-2 rounded-lg border-2 border-transparent transition duration-300 hover:border-yellow-600 hover:bg-white hover:text-black">
                            Subscribe
                        </button>
                    </form>
                </div>
                <div>
                    <h6 class="text-lg font-semibold mb-3">NEED HELP</h6>
                    <p class="text-sm text-gray-400">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum.
                    </p>
                </div>
                <div>
                    <h6 class="text-lg font-semibold mb-3">CONTACT US</h6>
                    <div class="space-y-2 text-gray-400">
                        <p><i class="fa fa-map-marker"></i> Gb road 123, USA</p>
                        <p><i class="fa fa-phone"></i> +01 12345678901</p>
                        <p><i class="fa fa-envelope"></i> vyduryainfo@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
        <footer class="mt-8 border-t border-gray-700 py-4 text-center">
            <p class="text-gray-400 text-sm">
                © <span id="displayYear"></span> All Rights Reserved By
                <a href="https://vyduryadigital.com/" class="text-yellow-700 hover:text-yellow-300">Vydurya Digitals</a>
            </p>
        </footer>
    </section>

    <!-- Feedback Button -->
    <div class="feedback-btn">Feedback</div>

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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


    <style>
        .popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    display: none;
    justify-content: center;
    align-items: center;
}

.popup-content {
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    width: 350px; /* Reduced width for a smaller popup */
    text-align: center;
    position: relative;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    animation: fadeIn 0.3s ease-in-out;
}

.popup-content h2 {
    font-size: 18px;
    margin-bottom: 10px;
}

.form-group {
    margin-bottom: 12px;
    text-align: left;
}

.form-group label {
    display: block;
    font-weight: bold;
    font-size: 14px;
}

.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.form-group a {
    font-size: 13px;
    color: #007bff;
    text-decoration: none;
}

.form-group a:hover {
    text-decoration: underline;
}

.popup-content button {
    padding: 10px;
    border: none;
    background: #ffcc00;
    color: #000;
    font-size: 14px;
    font-weight: bold;
    cursor: pointer;
    border-radius: 5px;
    margin-top: 10px;
    width: 100%;
    transition: background 0.2s ease-in-out;
}

.popup-content button:hover {
    background: #e6b800;
}

.close-btn {
    position: absolute;
    top: 8px;
    right: 10px;
    font-size: 18px;
    cursor: pointer;
    color: red;
}


    div#popup {
    text-align: -webkit-center;
    }

    .popup-content {
    margin-top: 23px;
   }
    </style>