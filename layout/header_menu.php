<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Index.css">
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- SwiperJS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>


<body class="bg-yellow-100">
    <!-- Navbar -->
    <nav class="w-full p-4 border-b border-gray-200 dark:bg-gray-900 navbar-container">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-6 lg:px-10 navbar-container">
            <a href="#" class="flex items-center space-x-2">
                <img src="./Images/Inkin-india-final-logo-01_320x.avif" class="h-10" alt="Logo">
            </a>
            <ul class="hidden md:flex space-x-6 font-medium text-lg">
                <li><a href="./Index.php" class="text-yellow-500 font-semibold">Home</a></li>
                <li><a href="#" class="hover:text-yellow-500 transition">Shop</a></li>
                <li><a href="#" class="hover:text-yellow-500 transition">Celebration</a></li>
                <li><a href="./BirthdayGift.php" class="hover:text-yellow-500 transition">Birthday Gift</a></li>
                <li><a href="#" class="hover:text-yellow-500 transition">Vehicle Gift</a></li>
            </ul>
            <div class="flex items-center space-x-7 nav-icons">
                <div class="relative flex items-center">
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

                


                <a href="#" class="relative nav-icon favorite-icon">
                    <i class="fas fa-heart text-gray-700 hover:text-yellow-500"></i>
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full px-1">0</span>
                </a>
                <a href="Product.html" class="relative nav-icon cart-icon">
                    <i class="fas fa-shopping-cart text-gray-700 hover:text-yellow-500"></i>
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full px-1">0</span>
                </a>
            </div>
            <button class="md:hidden text-gray-700 focus:outline-none" id="mobile-menu-button">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
        <div class="hidden md:hidden bg-white shadow-md p-4" id="mobile-menu">
            <ul class="flex flex-col space-y-4 text-lg font-medium text-gray-900">
                <li><a href="../Index.php" class="hover:text-yellow-500">Home</a></li>
                <li><a href="#" class="hover:text-yellow-500">Shop</a></li>
                <li><a href="#" class="hover:text-yellow-500">Celebration</a></li>
                <li><a href="#" class="hover:text-yellow-500">Business Gift</a></li>
                <li><a href="#" class="hover:text-yellow-500">Vehicle Gift</a></li>
            </ul>
        </div>
    </nav>