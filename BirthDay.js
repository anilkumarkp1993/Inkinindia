



const birthdayGifts = [
    {
        name: "Luxury Watch",
        price: 999,
        desc: "A premium stainless steel luxury watch.",
        img: "https://img.freepik.com/free-psd/watch-isolated-transparent-background_191095-27322.jpg?t=st=1741768300~exp=1741771900~hmac=952a304fb56c588f1a5101229def359004fcef704962209ac7b05c4e082bb679&w=900",
        stock: "Available",
        category: "Accessories"
    },
    {
        name: "Perfume Set",
        price: 499,
        desc: "A delightful fragrance set for special occasions.",
        img: "https://img.freepik.com/free-psd/elegant-black-perfume-bottle_191095-83842.jpg?t=st=1741768371~exp=1741771971~hmac=06be31525065e620859d090f1331715e2e10a0f1ae1429e724abbd68a7fdab9e&w=900",
        stock: "Limited Stock",
        category: "Beauty"
    },
    {
        name: "Doll",
        price: 599,
        desc: "A beautiful doll for kids to play and enjoy.",
        img: "https://img.freepik.com/free-photo/doll-wearing-yellow-ribbon_23-2149416249.jpg?t=st=1741768402~exp=1741772002~hmac=d38b3d749a1ed80bcd1b78924561b2ed529d56616536eecd47d4303edc050dc5&w=740",
        stock: "Out of Stock",
        category: "Toys"
    }
];

// Function definitions follow after array
function openPopup(event) {
    const card = event.target.closest('.group');
    if (card) {
        const giftName = card.getAttribute('data-gift-name');
        const selectedGift = birthdayGifts.find(gift => gift.name === giftName);

        if (selectedGift) {
            const popupTitle = document.getElementById('popupTitle');
            const popupPrice = document.getElementById('popupPrice');
            const popupDesc = document.getElementById('popupDesc');
            const popupImg = document.getElementById('popupImg');
            const popupStock = document.getElementById('popupStock');
            const popupCategory = document.getElementById('popupCategory');

            if (popupTitle && popupPrice && popupDesc && popupImg && popupStock && popupCategory) {
                popupTitle.textContent = selectedGift.name;
                popupPrice.innerHTML = `Rs. ${selectedGift.price}`;
                popupDesc.textContent = selectedGift.desc;
                popupImg.src = selectedGift.img;
                popupStock.textContent = `Stock: ${selectedGift.stock}`;
                popupCategory.textContent = `Category: ${selectedGift.category}`;

                document.getElementById('giftPopup').classList.remove('hidden');
            } else {
                console.error("Popup elements not found in the DOM.");
            }
        } else {
            console.error("Gift details not found.");
        }
    }
}

function closePopup() {
    document.getElementById('giftPopup').classList.add('hidden');
}




// function toggleMenu() {
//     document.getElementById("mobile-menu").classList.toggle("hidden");
// }

// document.getElementById("close-menu").addEventListener("click", function () {
//     document.getElementById("mobile-menu").classList.add("hidden");
// });

document.addEventListener('DOMContentLoaded', () => {
    // Search Functionality
    const searchContainer = document.getElementById('search-container');
    const searchIcon = document.getElementById('search-icon');
    const searchInput = document.getElementById('search-input');
    const logo = document.querySelector('.logo');

    if (searchIcon && searchInput && searchContainer) {
        searchIcon.addEventListener('click', (event) => {
            event.stopPropagation(); // Prevent closing when clicking the icon
            
            // Toggle search input expansion
            searchInput.classList.toggle('w-48'); 
            searchInput.classList.toggle('opacity-100');

            // Adjust logo visibility based on screen size
            if (window.innerWidth < 768) {
                if (searchInput.classList.contains('w-48')) {
                    logo.style.display = 'none'; // Hide logo on small screens when searching
                } else {
                    logo.style.display = 'block';
                }
            }

            searchInput.focus();
        });

        document.addEventListener('click', (event) => {
            if (!searchContainer.contains(event.target)) {
                searchInput.classList.remove('w-48', 'opacity-100'); // Close input
                if (window.innerWidth < 768) {
                    logo.style.display = 'block'; // Restore logo visibility
                }
            }
        });
    } else {
        console.error("Search elements not found in the DOM.");
    }

    // Mobile Menu Functionality
    const menuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (menuButton && mobileMenu) {
        menuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    } else {
        console.error("Mobile menu elements not found in the DOM.");
    }

    // Handle window resizing
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            logo.style.display = 'block'; // Ensure logo is always visible on larger screens
        }
    });
});




function toggleHeart(element) {
    let heartIcon = element.querySelector("i");
    heartIcon.classList.toggle("fa-regular");
    heartIcon.classList.toggle("fa-solid");
    heartIcon.classList.toggle("text-gray-600");
    heartIcon.classList.toggle("text-red-500");
}