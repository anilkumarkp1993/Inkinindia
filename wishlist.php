<?php
session_start();
$first_name = isset($_SESSION['first_name']) ? $_SESSION['first_name'] : "Guest";
?>


    <?php
   $header_path = $_SERVER['DOCUMENT_ROOT'] . "/Inkinindia/layout/header_menu.php";
    include $header_path; ?>

  

     <div class="wishlist-container">
        <h3>No products were added to the wishlist.</h3>
        <p>Your wishlist is empty. Start shopping now!</p>
        <a href="index.php" class="btn btn-primary btn-back">Back to Shopping</a>
    </div>



    <?php
   $footer_path = $_SERVER['DOCUMENT_ROOT'] . "/Inkinindia/layout/footer_menu.php";
    include $footer_path; ?>



</body>
</html>
