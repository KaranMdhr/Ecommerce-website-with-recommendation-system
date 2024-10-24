<?php
session_start();
include_once('phplib/db_config.php');

// Ensure database connection is established
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get and sanitize input parameters
$Product_ID = isset($_GET['productid']) ? intval($_GET['productid']) : 0;
$Amount = isset($_GET['price']) ? floatval($_GET['price']) : 0.0;

// Generate Unique Session ID if not set
if (!isset($_SESSION['uniqueSessionID'])) {
    $_SESSION['uniqueSessionID'] = uniqid(rand(), true);
}
$rand = $_SESSION['uniqueSessionID'];

// Prepare SQL query to check if the product is already in the cart
$sql = "SELECT * FROM `mobee_cart` WHERE `User_ID` = ? AND `product_id` = ?";
$stmt = $con->prepare($sql);
if ($stmt === false) {
    die("Prepare failed: " . $con->error);
}
$stmt->bind_param('si', $rand, $Product_ID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Product Already In Cart.</div>";
} else {
    // Prepare SQL query to insert the product into the cart
    $sqlcommand = "INSERT INTO `mobee_cart` (`User_ID`, `product_id`, `product_price`, `qty`) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($sqlcommand);
    if ($stmt === false) {
        die("Prepare failed: " . $con->error);
    }
    $quantity = 1; // Default quantity
    $stmt->bind_param('sidi', $rand, $Product_ID, $Amount, $quantity);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> Product Added To Cart.</div>";
    } else {
        echo "<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Unable to Add Product To Cart.</div>";
    }
}

// Close statement and connection
$stmt->close();
$con->close();
?>
