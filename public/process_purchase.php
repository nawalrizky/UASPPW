<?php
include('koneksi.php');

// Ambil nilai dari form
if (isset($_POST['product_id']) && isset($_POST['username']) && isset($_POST['email'])) {
    $productID = $_POST['product_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

function generateOrderID() {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $length = 6;
    $order_id = '';

    // Generate random alphanumeric characters for the order ID
    for ($i = 0; $i < $length; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $order_id .= $characters[$index];
    }

    return $order_id;
}

$update_sql = "UPDATE product SET total_buy = total_buy + 1 WHERE product_id = $productID";
if (mysqli_query($conn, $update_sql)) {
    // Tambahkan data pembelian ke tabel orderan
    $order_id = generateOrderID(); // Buat fungsi generateOrderID() untuk menghasilkan ID pesanan yang unik
    $order_date = date("Y-m-d"); // Tanggal saat ini
    $insert_sql = "INSERT INTO orderan (order_id, product_id, email, order_date) VALUES ('$order_id', '$productID', '$email', '$order_date')";
    if (mysqli_query($conn, $insert_sql)) {
        echo "Success";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Error: " . mysqli_error($conn);
}
} else {
echo "Missing parameters";
}

mysqli_close($conn);
?>

