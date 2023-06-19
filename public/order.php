

<?php require_once('header3.php'); ?>


<div class="container flex flex-col p-10  mx-auto -mt-[3rem] max-w-sm md:max-w-lg lg:max-w-xl">
    <lottie-player class="mx-auto"src="https://assets7.lottiefiles.com/packages/lf20_F84APy6eKd.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay></lottie-player> 
    <h1 class="text-neutral-300 text-3xl -mt-5 mx-auto mb-5 text-center bg-gradient-to-r from-[#04E762] to-[#89FC00] pt-3" style="-webkit-text-fill-color: transparent;
    -webkit-background-clip: text;">Get Your Order!</h1>
  <?php 
include('koneksi.php');
if (isset($_POST['product_id'])) {
    $selected_product_id = $_POST['product_id'];

    // Query to fetch product details based on selected product_id
    $sql = "SELECT product_id, product_name, old_price, current_price, deskripsi, fitur_product, total_buy FROM product WHERE product_id = $selected_product_id";
    $result = mysqli_query($conn, $sql);


echo '<table class="w-full text-md text-center text-white ">';
echo '<thead>';
echo '<tr class="text-gray-400 text-md">';
echo '<th scope="col" class="px-6 py-3 bg-gradient-to-r from-[#04E762] to-[#89FC00]" style="-webkit-text-fill-color: transparent;
-webkit-background-clip: text;">Product</th><th scope="col" class="px-6 py-3 bg-gradient-to-r from-[#04E762] to-[#89FC00]" style="-webkit-text-fill-color: transparent;
-webkit-background-clip: text;">Price</th><th scope="col" class="px-6 py-3 bg-gradient-to-r from-[#04E762] to-[#89FC00]" style="-webkit-text-fill-color: transparent;
-webkit-background-clip: text;" >Description</th>';
echo '<tr>';
echo '</thead>';

foreach($result as $d) :
  echo '<tbody>';
    echo "<tr class=' text-sm border border-gray-300 bg-neutral-800'><th scope='row' class='px-3 py-3 font-medium text-white whitespace-nowrap '>".
   $d['product_name']."</th>".
    "<td class='px-3 py-3'>".$d['current_price']."</td>".
    "<td class='px-3 py-3'>".$d['deskripsi']."</td>"."</td></tr>";

endforeach;
    echo  "</table";
}
    ?>

    <form >
    <div class="mb-6 mt-5">
      <label for="username" class="block mb-2 text-sm font-medium text-neutral-300 dark:text-white ">Name</label>
      <input type="text" id="username" class="bg-neutral-800 border border-gray-300 text-white text-sm rounded-lg block  w-full p-2.5" placeholder="Nawal Rizky" required>
    </div>
    <div class="mb-6">
      <label for="email" class="block mb-2 text-sm font-medium text-neutral-300 dark:text-white">Email</label>
      <input type="email" id="email" class="bg-neutral-800 border border-gray-300 text-white text-sm rounded-lg   block w-full  p-2.5" placeholder="example@gmail.com" required>
      </div>
    <div class="mb-6">
      <label for="card_number" class="block mb-2 text-sm font-medium text-neutral-300 dark:text-white">Card Number</label>
      <input type="text" id="card_number" class="bg-neutral-800 border border-gray-300 text-white text-sm rounded-lg   block w-full  p-2.5" placeholder="**** **** **** 1234" required>
      </div>
    <div class="mb-6">
      <label for="expiration_date" class="block mb-2 text-sm font-medium text-neutral-300 dark:text-white">Expiration Date</label>
      <input type="text" id="expiration_date" class="bg-neutral-800 border border-gray-300 text-white text-sm rounded-lg   block w-full  p-2.5" placeholder="MM / YY" required>
      </div>
    <div class="mb-6">
      <label for="cvv" class="block mb-2 text-sm font-medium text-neutral-300 dark:text-white">CVV</label>
      <input type="text" id="cvv" class="bg-neutral-800 border border-gray-300 text-white text-sm rounded-lg   block w-full  p-2.5" placeholder="***" required>
      </div>
    </form>
    <form action="process_purchase.php" method="POST">
    <input type="hidden" name="product_id" value="<?php echo $selected_product_id; ?>">
    <input onclick="buyProduct()" value="Confirm" type="button" class="text-neutral-900 bg-gradient-to-r from-[#04E762] to-[#89FC00] focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center"></input>
  </form>
  <script>
    function buyProduct() {
        // Ambil nilai input dari form
        var username = document.getElementById("username").value;
        var email = document.getElementById("email").value;
        var productID = "<?php echo $selected_product_id; ?>";
       

        // Kirim request AJAX ke server untuk memproses pembelian
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Respon dari server setelah pembelian berhasil
                alert("Pembelian berhasil!");
            }
        };
        xhttp.open("POST", "process_purchase.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email) + "&product_id=" + encodeURIComponent(productID));
    }
</script>
  </div>
</body>
</html>