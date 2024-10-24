<?php
// Start the session
session_start();

// Get the 'id' parameter from the URL
$product_id = isset($_GET['id']) ? intval($_GET['id']) : null;

// Database connection details
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'mobee';
$mysqli = new mysqli($host, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Function to calculate cosine similarity between two values (prices in this case)
function cosine_similarity($priceA, $priceB) {
    $dotProduct = $priceA * $priceB;
    $magnitudeA = sqrt(pow($priceA, 2));
    $magnitudeB = sqrt(pow($priceB, 2));

    if ($magnitudeA * $magnitudeB == 0) {
        return 0; // Handle division by zero
    }

    return $dotProduct / ($magnitudeA * $magnitudeB); // Cosine similarity formula
}

// Function to get the price of a product by its ID
function getProductPrice($product_id, $mysqli) {
    $query = "SELECT price FROM mobee_product WHERE product_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('i', $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();

    return $product ? $product['price'] : null;
}

// Function to get product recommendations based on cosine similarity and price similarity
function getCosineSimilarityRecommendations($product_id, $mysqli, $price_margin = 0.2, $top_n = 5) {
    $selected_price = getProductPrice($product_id, $mysqli);
    if (!$selected_price) {
        return []; // No product found
    }

    // Define the price range for similarity (e.g., +/- 20%)
    $lower_bound = $selected_price * (1 - $price_margin);
    $upper_bound = $selected_price * (1 + $price_margin);

    $query = "SELECT product_id, price, product_name, selling, SKU, image FROM mobee_product WHERE price BETWEEN ? AND ? AND product_id != ? ORDER BY selling ASC";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ddi', $lower_bound, $upper_bound, $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $recommendations = [];
    while ($row = $result->fetch_assoc()) {
        $other_price = $row['price'];
        $similarity = cosine_similarity($selected_price, $other_price);
        $recommendations[] = [
            'product_id' => $row['product_id'],
            'price' => $other_price,
            'similarity' => $similarity,
            'product_name' => $row['product_name'],
            'selling' => $row['selling'],
            'SKU' => $row['SKU'],
            'image' => $row['image'],
        ];
    }

    $stmt->close();

    // Sort recommendations by similarity, and in case of tie, sort by price closeness (ascending)
    usort($recommendations, function($a, $b) use ($selected_price) {
        // First, sort by cosine similarity (higher is better)
        if ($b['similarity'] != $a['similarity']) {
            return $b['similarity'] <=> $a['similarity'];
        }
        
        // If similarities are the same, sort by absolute price difference (lower is better)
        $priceDiffA = abs($a['price'] - $selected_price);
        $priceDiffB = abs($b['price'] - $selected_price);
        return $priceDiffA <=> $priceDiffB;
    });

    // Return top N recommendations
    return array_slice($recommendations, 0, $top_n);
}

// Get recommendations based on cosine similarity and price range
$cosine_recommendations = getCosineSimilarityRecommendations($product_id, $mysqli, $price_margin = 0.2, $top_n = 5);

// Output recommendations as JSON
header('Content-Type: application/json');
$json_data = json_encode($cosine_recommendations, JSON_PRETTY_PRINT);

if ($json_data === false) {
    echo 'JSON encoding error: ' . json_last_error_msg();
} else {
    echo $json_data;
}

// Close the connection
$mysqli->close();
?>
