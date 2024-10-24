<?php
include_once('phplib/controler.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order_id = $_POST['order_id'];
    $new_status = $_POST['new_status'];

    // Prepare and execute the update query
    $stmt = $con->prepare("UPDATE `mobee_order` SET `current_status` = ? WHERE `order_id` = ?");
    $stmt->bind_param('si', $new_status, $order_id);

    if ($stmt->execute()) {
        echo "<script>alert('Order status updated successfully.'); window.location.href='vieworder.php';</script>";
    } else {
        echo "<script>alert('Error updating order status.'); window.location.href='vieworder.php';</script>";
    }

    $stmt->close();
}
?>
