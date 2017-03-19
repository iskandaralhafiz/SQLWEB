<?php
 // memanggil file koneksi.php
 include "koneksi.php";
 // membuat variable dengan nilai dari form
 $username = $_POST['username']; // variablenya = username, dan nilainya sesuai yang dimasukkan di input name="username" tadi
 $password = md5($_POST['password']); // variable password, dan nilainya sesuai yang dimasukkan di input name="password" tadi
 // md5 ada sebuah fungsi PHP untuk engkripsi. misalnya admin jadi 21232f297a57a5a743894a0e4a801fc3. untuk lengkapnya, silahkan googling tentang md5
// proses untuk login
// menyesuaikan dengan data di database
 $perintah = "select * from login WHERE username = '$username' AND password = '$password'";
 $hasil = mysql_query($perintah);
 $row = mysql_fetch_array($hasil);
 if ($row['username'] == $username AND $row['password'] == $password) {
 session_start(); // memulai fungsi session
 $_SESSION['username'] = $username;
 header("location:home.php"); // jika berhasil login, maka masuk ke file home.php
 }
 else {
 echo "Gagal Masuk"; // jika gagal, maka muncul teks gagal masuk
 }
 ?>

6. Membuat file home.php
<?php
 session_start();
 if (empty($_SESSION['username'])) {
 header("location:form_login.php"); // jika belum login, maka dikembalikan ke file form_login.php
 }
 else {
 ?>
 Selamat <b><?php echo $_SESSION['username'] ?></b> Berhasil Masuk <br />
 <a href="logout.php">Klik di sini</a> untuk Keluar
 <?php } ?>
