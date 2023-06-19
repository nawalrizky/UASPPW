<?php require_once('header2.php'); ?>
<div class="container flex flex-col px-10 h-screen mx-auto -mt-[3rem] max-w-sm md:max-w-lg lg:max-w-xl">
    <lottie-player class="mx-auto"src="https://assets7.lottiefiles.com/packages/lf20_F84APy6eKd.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop  autoplay></lottie-player> 
    <h1 class="text-neutral-300 text-3xl -mt-5 mx-auto mb-5 text-center bg-gradient-to-r from-[#04E762] to-[#89FC00] pt-3" style="-webkit-text-fill-color: transparent;
    -webkit-background-clip: text;">Ask Anything !</h1>
    <form action="process_contact.php" method="POST">
    <div class="mb-6">
      <label for="username" class="block mb-2 text-sm font-medium text-neutral-300 dark:text-white ">Your name</label>
      <input type="text" id="username" class="bg-neutral-800 border border-gray-300 text-white text-sm rounded-lg block  w-full p-2.5" placeholder="Nawal Rizky" required>
    </div>
    <div class="mb-6">
      <label for="email" class="block mb-2 text-sm font-medium text-neutral-300 dark:text-white">Your email</label>
      <input type="email" id="email" class="bg-neutral-800 border border-gray-300 text-white text-sm rounded-lg   block w-full  p-2.5" placeholder="example@gmail.com" required>
      </div>
    <div class="mb-6">
      <label for="pesan" class="block mb-2 text-sm font-medium text-neutral-300 dark:text-white">Question Box !</label>
      <input type="text" name="pesan"id="pesan" class="bg-neutral-800 border border-gray-300 text-white text-sm rounded-lg  block w-full  p-4" required>
    </div>
    <input onclick="submitMessage()" value="Send"type="button" class="text-neutral-900 bg-gradient-to-r from-[#04E762] to-[#89FC00] focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center"></input>
  </form>
  </div>
  <script>
    function submitMessage() {
        // Ambil nilai input dari form
        var username = document.getElementById("username").value;
        var email = document.getElementById("email").value;
        var pesan = document.getElementById("pesan").value

        // Kirim request AJAX ke server untuk memproses pembelian
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Respon dari server setelah pembelian berhasil
                alert("Pesan telah dikirim");
            }
        };
        xhttp.open("POST", "process_contact.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("username=" + encodeURIComponent(username) + "&email=" + encodeURIComponent(email) + "&pesan=" + encodeURIComponent(pesan));
    }
</script>
</body>
</html>