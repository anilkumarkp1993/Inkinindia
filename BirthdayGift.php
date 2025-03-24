<?php
session_start();
$first_name = isset($_SESSION['first_name']) ? $_SESSION['first_name'] : "Guest";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brithday Gift</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- SwiperJS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>
<style>
    .feedback-btn {
        writing-mode: vertical-rl;
        position: fixed;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        background-color: #ffcc00;
        padding: 10px 8px;
        font-weight: bold;
        border-radius: 6px;
        cursor: pointer;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
    }

    /* Ensure search input is styled correctly for desktop */
    #search-input {
        transition: width 0.3s ease-in-out, opacity 0.3s ease-in-out;
    }

    #search-input.w-64 {
        width: 16rem; /* Matches Tailwind's w-64 */
        opacity: 1 !important;
    }
      p#fname {
    margin-left: 16px;
    margin-top: -12px;
    font-size: 12px;
   }

    @media (max-width: 767px) {
        .nav-icons {
            gap: 1rem;
        }

        .navbar-container {
            position: relative;
            height: 60px;
        }

        #search-container {
            position: relative;
        }

        #search-icon {
            position: relative;
            z-index: 30;
            display: block; /* Ensure it stays visible */
        }

        #search-input.w-64 {
            width: 150px;
            position: absolute;
            right: 2.5rem;
            top: 50%;
            transform: translateY(-50%);
            z-index: 20;
            border-radius: 9999px;
            padding: 0.5rem 1rem;
            opacity: 1 !important;
            height: auto;
            background: white;
        }

        .search-active #search-icon {
            position: absolute;
            right: 3rem;
            top: 50%;
            transform: translateY(-50%);
            z-index: 30;
            display: block !important; /* Ensure it remains visible */
        }

        .search-active .user-icon,
        .search-active .favorite-icon,
        .search-active .cart-icon {
            display: none !important;
        }

        .logo {
            position: relative;
            z-index: 35;
        }

        #mobile-menu-button {
            position: absolute;
            right: 0.5rem;
            top: 50%;
            transform: translateY(-50%);
            z-index: 30;
            display: block !important;
        }

        #mobile-menu {
            position: absolute;
            top: 60px;
            left: 0;
            width: 100%;
            z-index: 10;
        }

        .header-text {
            font-size: 1.5rem !important;
            line-height: 1.75rem !important;
        }

        .offer-banner {
            height: 3rem !important;
            padding: 0.5rem !important;
        }

        .offer-banner h3 {
            font-size: 1rem !important;
        }
    }
</style>

<body class="bg-yellow-100">
    <nav class="w-full p-4 border-b border-gray-200 dark:bg-gray-900 navbar-container">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-6 lg:px-10">
            <!-- Logo -->
            <a href="#" class="flex items-center space-x-2">
                <img src="./Images/Inkin-india-final-logo-01_320x.avif" class="h-10 logo" alt="Logo">
            </a>
    
            <!-- Desktop Menu -->
            <ul class="hidden md:flex space-x-6 font-medium text-lg">
                <li><a href="./Index.php" class="text-yellow-500 font-semibold">Home</a></li>
                <li><a href="#" class="hover:text-yellow-500 transition">Shop</a></li>
                <li><a href="#" class="hover:text-yellow-500 transition">Celebration</a></li>
                <li><a href="./BirthdayGift.php" class="hover:text-yellow-500 transition">Birthday Gift</a></li>
                <li><a href="#" class="hover:text-yellow-500 transition">Vehicle Gift</a></li>
            </ul>
    
            <!-- Icons -->
            <div class="flex items-center nav-icons space-x-4 md:space-x-5">
                <!-- Search Box -->
                <div id="search-container" class="relative flex items-center">
                    <button id="search-icon" class="text-gray-700 hover:text-yellow-500 focus:outline-none">
                        <i class="fas fa-search"></i>
                    </button>
                    <input type="text" id="search-input"
                        class="w-0 opacity-0 border border-gray-300 rounded-full px-3 py-2 bg-white transition-all duration-300 ease-in-out outline-none"
                        placeholder="Search..." />
                </div>
    
                 
                  <?php
                 $guest="Guest";
                 $first_name = isset($first_name) ? $first_name : '';
                 //echo $first_name;
                 if($first_name===$guest){ ?>
                     <a href="#" id="open-popup" class="nav-icon">
        <i class="fas fa-user"><p id="fname"><?php echo htmlspecialchars($first_name); ?></p></i>
        </a>

                 <?php } else{ ?>
                     <a href="./my_account.php"  class="nav-icon">
        <i class="fas fa-user"><p id="fname"><?php echo htmlspecialchars($first_name); ?></p></i>
        </a>

                   <?php }?>


                <a href="#" class="relative favorite-icon">
                    <i class="fas fa-heart text-gray-700 hover:text-yellow-500"></i>
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full px-1">0</span>
                </a>
                <a href="Product.html" class="relative cart-icon">
                    <i class="fas fa-shopping-cart text-gray-700 hover:text-yellow-500"></i>
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full px-1">0</span>
                </a>
    
                <!-- Mobile Menu Button -->
                <button class="md:hidden text-gray-700 focus:outline-none" id="mobile-menu-button">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    
        <!-- Mobile Menu -->
        <div class="hidden md:hidden bg-white shadow-md p-4" id="mobile-menu">
            <ul class="flex flex-col space-y-4 text-lg font-medium text-gray-900">
                <li><a href="./Index.php" class="hover:text-yellow-500">Home</a></li>
                <li><a href="#" class="hover:text-yellow-500">Shop</a></li>
                <li><a href="#" class="hover:text-yellow-500">Celebration</a></li>
                <li><a href="#" class="hover:text-yellow-500">Business Gift</a></li>
                <li><a href="#" class="hover:text-yellow-500">Vehicle Gift</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto py-10 px-6">
        <!-- Heading -->
        <div class="max-w-xl mx-auto text-center p-5">
            <h2 class="text-xl md:text-5xl font-bold tracking-tight mb-6">BirthDay Giftz</h2>
        </div>

        <!-- Toolbar: Filter, Result Count, View Mode, Sort Dropdown -->
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center px-6 py-4 gap-4">
            <!-- Left Section: Filter & Result Count -->
            <div class="flex items-center space-x-4 md:space-x-6">
                <button class="flex items-center bg-black text-white px-4 py-2 rounded-md hover:bg-gray-800">
                    <i class="fas fa-filter mr-2"></i> Filter
                </button>
                <p class="text-gray-700 text-sm md:text-base">There are <strong>4</strong> results in total</p>
            </div>

            <!-- Middle Section: View Mode -->
            <div class="flex items-center space-x-2 md:space-x-4">
                <button id="gridView" class="text-gray-400 hover:text-black p-2 transition">
                    <i class="fas fa-th text-xl"></i>
                </button>
                <button id="largeGridView" class="text-gray-400 hover:text-black p-2 transition">
                    <i class="fas fa-th-large text-xl"></i>
                </button>
                <button id="listView" class="text-black p-2 transition">
                    <i class="fas fa-th-list text-xl"></i>
                </button>
            </div>

            <!-- Right Section: Sort Dropdown -->
            <div class="w-full md:w-auto text-center md:text-left">
                <label for="sort" class="text-gray-700 font-semibold mr-2">Sort by:</label>
                <select id="sort" class="border px-4 py-2 rounded-md focus:outline-none focus:ring focus:border-gray-300">
                    <option>Featured</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                    <option>Newest Arrivals</option>
                </select>
            </div>
        </div>
    </div>

    <section class="p-6 container mx-auto py-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Gift Cards -->
            <div class="gift-card p-4 rounded-lg border shadow-lg hover:shadow-xl transition relative group w-full mx-auto"
                data-gift-name="Luxury Watch">
                <span class="absolute top-2 left-2 bg-yellow-400 text-xs font-bold px-2 py-1 rounded">Offer</span>
                <div class="absolute top-3 right-4 flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition">
                    <span class="bg-gray-100 p-2 rounded-full cursor-pointer transition duration-300"
                        onclick="toggleHeart(this)">
                        <i class="fa-regular fa-heart text-gray-600"></i>
                    </span>
                    <span class="bg-gray-100 p-2 rounded-full cursor-pointer shadow-md" onclick="openPopup(event)">
                        <i class="fa-regular fa-eye"></i>
                    </span>
                </div>
                <div class="mt-3 w-full h-40 bg-gray-200 rounded-lg overflow-hidden">
                    <img src="./Images/BirthDay.jpg" alt="Luxury Watch" class="w-full h-full object-cover">
                </div>
                <p class="mt-3 text-center font-semibold text-gray-800">Luxury Watch</p>
                <p class="text-center font-bold text-gray-900">Price: Rs. 999</p>
            </div>

            <div class="gift-card p-4 rounded-lg border shadow-lg hover:shadow-xl transition relative group w-full mx-auto"
                data-gift-name="Perfume Set">
                <span class="absolute top-2 left-2 bg-yellow-400 text-xs font-bold px-2 py-1 rounded">Offer</span>
                <div class="absolute top-3 right-4 flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition">
                    <span class="bg-gray-100 p-2 rounded-full cursor-pointer transition duration-300"
                        onclick="toggleHeart(this)">
                        <i class="fa-regular fa-heart text-gray-600"></i>
                    </span>
                    <span class="bg-gray-100 p-2 rounded-full cursor-pointer shadow-md" onclick="openPopup(event)">
                        <i class="fa-regular fa-eye"></i>
                    </span>
                </div>
                <div class="mt-3 w-full h-40 bg-gray-200 rounded-lg overflow-hidden">
                    <img src="./Images/BirthDay.jpg" alt="Perfume Set" class="w-full h-full object-cover">
                </div>
                <p class="mt-3 text-center font-semibold text-gray-800">Perfume Set</p>
                <p class="text-center font-bold text-gray-900">Price: Rs. 499</p>
            </div>

            <div class="gift-card p-4 rounded-lg border shadow-lg hover:shadow-xl transition relative group w-full mx-auto"
                data-gift-name="Doll">
                <span class="absolute top-2 left-2 bg-yellow-400 text-xs font-bold px-2 py-1 rounded">Offer</span>
                <div class="absolute top-3 right-4 flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition">
                    <span class="bg-gray-100 p-2 rounded-full cursor-pointer transition duration-300"
                        onclick="toggleHeart(this)">
                        <i class="fa-regular fa-heart text-gray-600"></i>
                    </span>
                    <span class="bg-gray-100 p-2 rounded-full cursor-pointer shadow-md" onclick="openPopup(event)">
                        <i class="fa-regular fa-eye"></i>
                    </span>
                </div>
                <div class="mt-3 w-full h-40 bg-gray-200 rounded-lg overflow-hidden">
                    <img src="./Images/BirthDay.jpg" alt="Doll" class="w-full h-full object-cover">
                </div>
                <p class="mt-3 text-center font-semibold text-gray-800">Doll</p>
                <p class="text-center font-bold text-gray-900">Price: Rs. 599</p>
            </div>

            <div class="gift-card p-4 rounded-lg border shadow-lg hover:shadow-xl transition relative group w-full mx-auto"
                data-gift-name="Doll">
                <span class="absolute top-2 left-2 bg-yellow-400 text-xs font-bold px-2 py-1 rounded">Offer</span>
                <div class="absolute top-3 right-4 flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition">
                    <span class="bg-gray-100 p-2 rounded-full cursor-pointer transition duration-300"
                        onclick="toggleHeart(this)">
                        <i class="fa-regular fa-heart text-gray-600"></i>
                    </span>
                    <span class="bg-gray-100 p-2 rounded-full cursor-pointer shadow-md" onclick="openPopup(event)">
                        <i class="fa-regular fa-eye"></i>
                    </span>
                </div>
                <div class="mt-3 w-full h-40 bg-gray-200 rounded-lg overflow-hidden">
                    <img src="./Images/BirthDay.jpg" alt="Doll" class="w-full h-full object-cover">
                </div>
                <p class="mt-3 text-center font-semibold text-gray-800">Doll</p>
                <p class="text-center font-bold text-gray-900">Price: Rs. 599</p>
            </div>
        </div>
    </section>

    <!-- Popup Modal -->
    <div id="giftPopup" class="hidden fixed inset-0 flex justify-center items-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg relative w-11/12 max-w-lg flex">
            <div class="w-1/2 pr-4">
                <img id="popupImg" class="w-full h-full object-cover rounded-lg" src="" alt="Product Image">
            </div>
            <div class="w-1/2 flex flex-col justify-center">
                <span class="absolute top-2 right-2 text-gray-500 cursor-pointer text-xl"
                    onclick="closePopup()">×</span>
                <h2 id="popupTitle" class="text-xl font-bold text-gray-800"></h2>
                <p id="popupDesc" class="text-gray-600 mt-2"></p>
                <p id="popupPrice" class="text-red-500 font-bold text-lg mt-2"></p>
                <p id="popupStock" class="text-green-500 font-semibold mt-1"></p>
                <p id="popupCategory" class="text-gray-500 italic mt-1"></p>
                <button class="mt-4 bg-yellow-400 text-white px-4 py-2 rounded-lg hover:bg-yellow-500">
                    Buy Now
                </button>
            </div>
        </div>
    </div>

    <?php
   $footer_path = $_SERVER['DOCUMENT_ROOT'] . "/Inkinindia/layout/footer_menu.php";
    include $footer_path; ?>

</body>
<script>
    // Search toggle functionality for both desktop and mobile
    document.getElementById('search-icon').addEventListener('click', function() {
        const searchInput = document.getElementById('search-input');
        const nav = document.querySelector('nav');
        const searchContainer = document.getElementById('search-container');

        if (searchInput.classList.contains('w-0')) {
            // Expand search input
            searchInput.classList.remove('w-0');
            searchInput.classList.add('w-64');
            searchInput.style.opacity = '1'; // Ensure visibility
            nav.classList.add('search-active');
            searchInput.focus(); // Optional: Focus the input field
        } else {
            // Collapse search input
            searchInput.classList.remove('w-64');
            searchInput.classList.add('w-0');
            searchInput.style.opacity = '0';
            nav.classList.remove('search-active');
        }
    });

    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });

    // Heart toggle function
    function toggleHeart(element) {
        const heartIcon = element.querySelector('i');
        heartIcon.classList.toggle('fa-regular');
        heartIcon.classList.toggle('fa-solid');
    }

    // Popup functions
    function openPopup(event) {
        const card = event.target.closest('.gift-card');
        const giftName = card.getAttribute('data-gift-name');
        const imgSrc = card.querySelector('img').src;
        const price = card.querySelector('p:last-child').textContent;

        document.getElementById('popupImg').src = imgSrc;
        document.getElementById('popupTitle').textContent = giftName;
        document.getElementById('popupPrice').textContent = price;
        document.getElementById('popupDesc').textContent = 'Lorem ipsum dolor sit amet.';
        document.getElementById('popupStock').textContent = 'In Stock';
        document.getElementById('popupCategory').textContent = 'Category: Birthday Gifts';
        document.getElementById('giftPopup').classList.remove('hidden');
    }

    function closePopup() {
        document.getElementById('giftPopup').classList.add('hidden');
    }

    // Set current year in footer
    document.getElementById('displayYear').textContent = new Date().getFullYear();
</script>

</html>