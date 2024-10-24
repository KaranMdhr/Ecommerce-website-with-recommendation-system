<?php
// Start the session
session_start();

// Get the 'id' parameter from the URL
$product_id = isset($_GET['id']) ? intval($_GET['id']) : null;


function getuserdata(){
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'mobee';
$mysqli = new mysqli($host, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}



// Check if the user is logged in
if (isset($_SESSION['UserEmail']) && isset($_SESSION['UserFullName'])) {
    // Retrieve session variables
    $userEmail = $_SESSION['UserEmail'];

    // Prepare a query to fetch customer_id based on session email
    $query = "SELECT customer_id FROM mobee_user WHERE customer_email = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('s', $userEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a user was found
    if ($result->num_rows > 0) {
        // Fetch customer_id
        $userData = $result->fetch_assoc();
        $customer_id = $userData['customer_id'];

        // Return customer_id
        return $customer_id;
    } else {
        // No user found
        return null;
    }
} else {
    // User is not logged in, return null or handle as needed
    return null;
}
}


// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'mobee';
$mysqli = new mysqli($host, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Function to get similar products based on category
function getContentBasedRecommendations($product_id, $mysqli, $top_n = 10) {
    // Get the category_id of the given product
    $query = "SELECT * FROM product_category WHERE product_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('i', $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $category_id_row = $result->fetch_assoc();

    if (!$category_id_row) {
        return []; // No category found
    }

    $category_id = $category_id_row['category_id'];

    // Find other products in the same category
    $query = "SELECT * FROM product_category WHERE category_id = ? AND product_id != ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ii', $category_id, $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Collect similar products
    $similar_products = [];
    while ($row = $result->fetch_assoc()) {
        $similar_products[] = $row['product_id'];
    }

    return array_slice($similar_products, 0, $top_n);
}

// Function to get collaborative recommendations
function getCollaborativeRecommendations($user_id, $mysqli, $top_n = 10) {
    // Find products that the user has interacted with
    $query = "SELECT product_id FROM user_history WHERE customer_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_products = [];
    while ($row = $result->fetch_assoc()) {
        $user_products[] = $row['product_id'];
    }

    // Find other users who interacted with the same products
    $recommended_products = [];
    foreach ($user_products as $product_id) {
        $query = "SELECT customer_id, product_id FROM user_history WHERE product_id = ? AND customer_id != ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('ii', $product_id, $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            if (!in_array($row['product_id'], $user_products)) {
                if (!isset($recommended_products[$row['product_id']])) {
                    $recommended_products[$row['product_id']] = 0;
                }
                $recommended_products[$row['product_id']] += 1;
            }
        }
    }

    // Sort and return top N products
    arsort($recommended_products);
    return array_slice(array_keys($recommended_products), 0, $top_n);
}

// Function to get hybrid recommendations
function getHybridRecommendations($user_id, $product_id, $mysqli, $top_n = 10) {
    $content_recs = getContentBasedRecommendations($product_id, $mysqli, $top_n);
    $collab_recs = getCollaborativeRecommendations($user_id, $mysqli, $top_n);

    // Merge and de-duplicate recommendations
    $combined_recs = array_unique(array_merge($content_recs, $collab_recs));

    return array_slice($combined_recs, 0, $top_n);
}

// Fetch customer_id using the function
$user_id = getuserdata();

// Get hybrid recommendations
$recommendations = getHybridRecommendations($user_id, $product_id, $mysqli, $top_n = 10);

// Fetch product details for recommendations
$rec_details = [];
foreach ($recommendations as $rec_product_id) {
    $query = "SELECT * FROM mobee_product WHERE product_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('i', $rec_product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $rec_details[] = $result->fetch_assoc();
}

// Output recommendations as JSON
header('Content-Type: application/json');
echo json_encode($rec_details, JSON_PRETTY_PRINT);

// Close the connection
$mysqli->close();
?>
