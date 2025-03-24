<?php
session_start();
include 'db.php'; 

// $db_path = $_SERVER['DOCUMENT_ROOT'] . "/Inkinindia/config/db.php";
// include $db_path;

$first_name = isset($_SESSION['first_name']) ? $_SESSION['first_name'] : "Guest";
$email= isset($_SESSION['email']) ? $_SESSION['email'] : "empty";
$user_id = $_SESSION['user_id'];

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: Index.php");
    exit();
}
//print_r($_SESSION); exit;
?>


 <?php
   $header_path = $_SERVER['DOCUMENT_ROOT'] . "/Inkinindia/layout/header_menu.php";
    include $header_path; ?>



<div class="account-container">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="account-sidebar">
                <!-- <h5 class="text-center">Account Menu</h5> -->
                <a href="./my_account.php" class="menu-link active" data-target="dashboard">Dashboard</a>
                <a href="#" class="menu-link" data-target="addresses">Your Addresses</a>
                <a href="./wishlist.php">Your Wishlist</a>
                <a href="./logout.php">Log Out</a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">

            <?php if (isset($_SESSION['flash_message'])): ?>
    <div class="alert alert-success flshmsg">
        <?php 
            echo $_SESSION['flash_message']; 
            unset($_SESSION['flash_message']); // Remove message after displaying
        ?>
    </div>
     <?php endif; ?>

     <?php

     if (isset($_SESSION['update_flash_message'])) {
    echo "<script>alert('" . $_SESSION['update_flash_message'] . "');</script>";
    unset($_SESSION['update_flash_message']); // Clear the message after showing
   }
   ?>


            <!-- Hidden Address Form -->
        <div id="addressForm" class="border p-4 mt-3 rounded" style="display: none;">
            
            <h4>Add  Your Address</h4>
            <form action="save_address.php" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Company</label>
                    <input type="text" class="form-control" name="company" placeholder="Company">
                </div>
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea class="form-control" name="address" placeholder="Enter your address" rows="3" required></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">City</label>
                        <input type="text" class="form-control" name="city" placeholder="City" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Country/Region</label>
                        <select class="form-control" id="country" name="country">
                            <option>India</option>
                          </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Province</label>
                        <select class="form-control" id="province" name="province">
                            
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option
                            ><option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option><option value="Daman and Diu">Daman and Diu</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Ladakh">Ladakh</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Puducherry">Puducherry</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="West Bengal">West Bengal</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Postal/ZIP Code</label>
                        <input type="text" class="form-control" name="postal_code" placeholder="Postal/ZIP Code" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
                </div>
                <div class="mb-3">
                   <input type="checkbox" id="setAsDefault" name="setAsDefault">
                    <label for="setAsDefault">Set as default address</label>
                </div>
                <button type="submit" class="btn btn-success">Add a New Address</button>
                <button type="button" class="btn btn-secondary" id="cancelAddressForm">Cancel</button>
            </form>
        </div>


        <!-- Dashboard Section (Visible by Default) -->
    <div class="account-content" id="account-content">
        <h3>Welcome, <strong><?php echo htmlspecialchars($first_name); ?></strong>!</h3>
        <p>Not you? <a href="./logout.php" class="text-danger">Log Out</a></p>

        <!-- Order History -->
        <h3>Order History</h3>
        <div class="alert alert-info">
            <strong>No Orders Yet!</strong> <br><br>
            <a href="./Index.php" class="btn-custom">Make your first order</a>
        </div>

        <?php
        $sql = "SELECT * FROM addresses WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();



        // Check if address exists
        $address_exists = $result->num_rows > 0;
        ?>


        <!-- Account Details -->
        <h3>Account Details</h3>
        <div class="account-details">
            <span><strong>Name:</strong> <?php echo htmlspecialchars($first_name); ?></span>
            <span><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></span>
        </div>
    </div>

    <!-- Address Section (Hidden Initially) -->
    <div class="account-address" id="account-address" style="display: none;">
        <h3>Your Addresses</h3>
        <button class="btn btn-primary mb-3" id="showAddressForm">Add a New Address</button>
        <h4>Default Address</h4>
        <?php if ($address_exists): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="border p-3 rounded">
                <p><?php echo htmlspecialchars($row['first_name']." ".$row['last_name']); ?></p>
                <p><?php echo htmlspecialchars($email); ?></p>
                <p><?php echo htmlspecialchars($row['address']); ?></p>
                <p><?php echo htmlspecialchars($row['city']); ?></p>
                <p><?php echo htmlspecialchars($row['province']).",".$row['country'];?></p>
                <p><?php echo htmlspecialchars($row['postal_code']); ?></p>
                <p><?php echo htmlspecialchars($row['phone']); ?></p>
               

                <button class="btn btn-warning btn-sm edit-btn" 
    data-id="<?php echo $row['id']; ?>" 
    data-firstname="<?php echo htmlspecialchars($row['first_name']); ?>" 
    data-lastname="<?php echo htmlspecialchars($row['last_name']); ?>"
    data-company="<?php echo htmlspecialchars($row['company']); ?>"
    data-address="<?php echo htmlspecialchars($row['address']); ?>"
    data-country="<?php echo htmlspecialchars($row['country']); ?>"
    data-city="<?php echo htmlspecialchars($row['city']); ?>"
    data-state="<?php echo htmlspecialchars($row['province']); ?>"
    data-postalcode="<?php echo htmlspecialchars($row['postal_code']); ?>"
    data-default="<?php echo htmlspecialchars($row['is_default']); ?>">
    Edit
</button>
                <button class="btn btn-danger btn-sm delete-address" data-id="<?php echo $row['id']; ?>">Delete</button>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
       
    <?php endif; ?>

   <!-- </div> -->



    <!-- Address Edit Form (Initially Hidden) -->
<div id="editAddressForm" style="display: none; border: 1px solid #ddd; padding: 20px; margin-top: 20px;">
    <h3>Edit Address</h3>
    <form action="update_address.php" method="POST">
        <input type="hidden" name="id" id="editId">
         <div class="mb-3">
           <label class="form-label">First Name</label>
            <input type="text" name="first_name" id="editFName" class="form-control" required>
        </div>
         <div class="mb-3">
           <label class="form-label">Last Name</label>
            <input type="text" name="last_name" id="editLName" class="form-control" required>
        </div>
         <div class="mb-3">
            <label>Company</label>
            <input type="text" name="company" id="editCompany" class="form-control" required>
        </div>
         <div class="mb-3">
            <label>Address</label>
             <textarea class="form-control" name="address" id="editAddress" placeholder="Enter your address" rows="3" required></textarea>
            
        </div>
         <div class="mb-3">
             <label class="form-label">Country/Region</label>
            
             <select class="form-control" id="editCountry" name="country">
                            <option>India</option>
                          </select>

        </div>
        
         <div class="mb-3">
            <label>City</label>
            <input type="text" name="city" id="editCity" class="form-control">
        </div>
         <div class="mb-3">
            <label>State</label>
            
            <select class="form-control" id="editState" name="state">
                            
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option
                            ><option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option><option value="Daman and Diu">Daman and Diu</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Ladakh">Ladakh</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Puducherry">Puducherry</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="West Bengal">West Bengal</option>
                        </select>
        </div>
         <div class="mb-3">
            <label>Postal Code</label>
            <input type="text" name="postal_code" id="editPostalCode" class="form-control">
        </div>
         <div class="mb-3">
                   <input type="checkbox" id="editsetAsDefault" name="setAsDefault">
                    <label for="setAsDefault">Set as default address</label>
                </div>
        <button type="submit" class="btn btn-success">Update Address</button>
        <button type="button" class="btn btn-secondary" id="cancelEdit">Cancel</button>
    </form>
</div>



    </div>
</div>

        </div>
    </div>
</div>


<?php
   $footer_path = $_SERVER['DOCUMENT_ROOT'] . "/Inkinindia/layout/footer_menu.php";
    include $footer_path; ?>
    
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
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

<script>
    document.getElementById("showAddressForm").addEventListener("click", function () { 
                    document.getElementById("addressForm").style.display = "block";
                });

                document.getElementById("cancelAddressForm").addEventListener("click", function () {
                    document.getElementById("addressForm").style.display = "none";
                });
    setTimeout(function() {
        let alertBox = document.querySelector('.flshmsg');
        if (alertBox) {
            alertBox.style.display = 'none';
        }
    }, 3000); // 3 seconds
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Get all menu links
    const menuLinks = document.querySelectorAll(".menu-link");
    // Sections to show/hide
    const sections = {
        dashboard: document.getElementById("account-content"),
        addresses: document.getElementById("account-address")
    };

    // Add click event listener to menu links
    menuLinks.forEach(link => {
        link.addEventListener("click", function (event) {
            event.preventDefault();
            const target = this.getAttribute("data-target");

            // Hide all sections
            for (let key in sections) {
                sections[key].style.display = "none";
            }

            // Show the targeted section
            if (sections[target]) {
                sections[target].style.display = "block";
            }

            // Update active class
            menuLinks.forEach(l => l.classList.remove("active"));
            this.classList.add("active");
        });
    });
});
</script>

<!-- JavaScript for Edit Functionality -->
<script>
 document.addEventListener("DOMContentLoaded", function () {
    const editButtons = document.querySelectorAll(".edit-btn"); // Ensure correct class name
    const editForm = document.getElementById("editAddressForm");
    const editId = document.getElementById("editId");
    const editFName = document.getElementById("editFName");
    const editLName = document.getElementById("editLName");
    const editCompany = document.getElementById("editCompany");
    const editAddress = document.getElementById("editAddress");
    const editCountry = document.getElementById("editCountry");
    const editCity = document.getElementById("editCity");
    const editState = document.getElementById("editState");
    const editPostalCode = document.getElementById("editPostalCode"); 
    const editsetAsDefault= document.getElementById("editsetAsDefault");
    const cancelEdit = document.getElementById("cancelEdit");

    if (!editButtons.length) {
        console.warn("No edit buttons found!");
        return;
    }

    editButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const id = button.getAttribute("data-id");
            const firstName = button.getAttribute("data-firstname");
            const lastName = button.getAttribute("data-lastname");
            const company = button.getAttribute("data-company");
            const address = button.getAttribute("data-address");
            const country = button.getAttribute("data-country");
            const city = button.getAttribute("data-city");
            const state = button.getAttribute("data-state");
            const postalCode = button.getAttribute("data-postalcode");
            const defaultValue  = button.getAttribute("data-default");

            // Ensure the form elements exist
            if (editForm && editId && editFName && editLName && editCompany && editAddress && editCountry && editCity && editState && editPostalCode && editsetAsDefault) {
                editId.value = id;
                editFName.value = firstName;
                editLName.value = lastName;
                editCompany.value = company;
                editAddress.value = address;
                editCountry.value = country;
                editCity.value = city;
                editState.value = state;
                editPostalCode.value = postalCode;

                editsetAsDefault.checked = defaultValue == "1" || defaultValue.toLowerCase() == "true";

                

                editForm.style.display = "block";
            } else {
                console.error("One or more form elements are missing!");
            }
        });
    });

    if (cancelEdit) {
        cancelEdit.addEventListener("click", function () {
            editForm.style.display = "none";
        });
    }
});


</script>
<script>
$(document).ready(function(){
    $(".delete-address").click(function(){
        var addressId = $(this).data("id"); // Get address ID

        // Show confirmation dialog
        Swal.fire({
            title: "Are you sure?",
            //text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                // If user confirms, send AJAX request
                $.ajax({
                    url: "delete_address.php", // PHP file to handle deletion
                    type: "POST",
                    data: { id: addressId },
                    success: function(response) {
                        Swal.fire("Deleted!", "Your address has been deleted.", "success").then(() => {
                            location.reload(); // Refresh page after delete
                        });
                    },
                    error: function() {
                        Swal.fire("Error!", "Something went wrong.", "error");
                    }
                });
            }
        });
    });
});
</script>


