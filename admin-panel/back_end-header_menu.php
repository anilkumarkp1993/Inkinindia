<style>
/* Sidebar Styling */
/*.sidebar {
    width: 250px;
    height: 100vh;
    background: #2c3e50;
    padding-top: 20px;
    position: fixed;
    left: 0;
    top: 0;
    overflow-y: auto;
}*/

/*.sidebar h2 {
    color: #ecf0f1;
    text-align: center;
    margin-bottom: 20px;
    font-size: 22px;
    font-weight: bold;
}*/

/*.sidebar ul {
    list-style: none;
    padding: 0;
    margin: 0;
}*/

.sidebar ul li {
    position: relative;
}

.sidebar ul li a {
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #ecf0f1;
    padding: 12px 20px;
    text-decoration: none;
    font-size: 16px;
    transition: 0.3s;
    border-radius: 5px;
}

.sidebar ul li a:hover {
    background: #1abc9c;
    color: white;
}

/* Submenu Styling */
.sidebar ul li .submenu {
    display: none;
    list-style: none;
    padding-left: 20px;
}

.sidebar ul li .submenu li a {
    font-size: 14px;
    padding: 10px 20px;
    background: #34495e;
    border-left: 3px solid #1abc9c;
    transition: 0.3s;
}

.sidebar ul li .submenu li a:hover {
    background: #16a085;
}

/* Active Link */
.sidebar ul li a.active {
    background: #e74c3c;
}

/* Arrow Style */
.arrow {
    transition: transform 0.3s;
}

.open .arrow {
    transform: rotate(180deg);
}
</style>

<!-- Sidebar Menu -->
<div class="sidebar">
    <h2>Admin Panel</h2>
    <ul>
        <li><a href="./dashboard.php">Dashboard</a></li>

        <li class="has-submenu">
            <a href="trending_gift_master.php" class="submenu-toggle">
                Trending Gift Section <span class="arrow">▼</span>
            </a>
            <ul class="submenu">
                <li><a href="./trending_gift_master.php">Trending Gift Master</a></li>
                <li><a href="./trending_gift_category.php">Add Gift Category</a></li>
                <li><a href="./manage_trending_gift.php">Add Gifts</a></li>
            </ul>
        </li>
        <li><a href="./dashboard.php">Celebration Gift Section</a></li>
    </ul>
</div>

<!-- JavaScript for Toggle -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".submenu-toggle").forEach(function(menu) {
        menu.addEventListener("click", function(e) {
            e.preventDefault();
            let submenu = this.nextElementSibling;
            submenu.style.display = submenu.style.display === "block" ? "none" : "block";
            this.classList.toggle("open");
        });
    });
});

$(document).ready(function () {
    // Get current page URL
    let currentPage = window.location.pathname.split("/").pop();

    // Loop through each submenu item and check if it matches the current page
    $(".submenu a").each(function () {
        if ($(this).attr("href") === currentPage) {
            $(this).addClass("active"); // Add active class to the link
            $(this).closest(".has-submenu").addClass("active"); // Also highlight parent menu
        }
    });
});

</script>
