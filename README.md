# UASPPW1_22-505597-SV-21827_Project-Portfolio
#note : Website sebaiknya dijalankan saat online

Nama : Nawal Rizky Kautsar
Website Portfolio yang juga menyediakan jasa pembuatan website, client dapat mengcontact saya atau membeli jasa saya melalui website tersebut

1. Desain sudah konsisten
2. Responsive
   Contoh : 
   <div data-aos="fade-up" data-aos-offset="300"data-aos-easing="ease-in-sine"class="grid grid-cols-2 lg:grid-cols-4 lg:mx-[13rem] lg:mt-10 gap-2 mx-2 md:gap-5 md:mx-5 align-bottom">
   saat mobile grid akan menampilkan hanya 2 kolom, sedangkan saat tampilan large/laptop akan menampilkan 4 kolom.
3. Saat mengcontact maupun membeli jasa, user akan menerima feedback alert
   Contoh :
   var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Respon dari server setelah pembelian berhasil
                alert("Pembelian berhasil!");
            }
  
4. Konten dinamis 
   Terdapat pada page order.php yang digunakan untuk menampilkan kolom dari tabel database yang sesuai dengan product id yang dipanggil melalui button pada halaman price.php seperti contoh dibawah
   Contoh :
  Halaman price.php:
   <form  action="order.php" method="POST">
        <input type="hidden" name="product_id" value="1">
        <input value="Choose plan" type="submit" class="text-neutral-900 bg-gradient-to-r from-[#04E762] to-[#89FC00] focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center" >
        </form>
  
  Halaman order.php:
  if (isset($_POST['product_id'])) {
    $selected_product_id = $_POST['product_id'];

    // Query to fetch product details based on selected product_id
    $sql = "SELECT product_id, product_name, old_price, current_price, deskripsi, fitur_product, total_buy FROM product WHERE product_id = $selected_product_id";
    $result = mysqli_query($conn, $sql);
  
  Maka tabel yang ditampilkan pada halaman order adalah tabel product yang berisi nilai 1.
  
  Selain itu user dapat mengcontact admin melalui page contact.php dan checkout order pada page order.php yang akan disimpan ke dalam database secara otomatis 
  Contoh :
  Halaman process_purchase.php :
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
  
 
  
