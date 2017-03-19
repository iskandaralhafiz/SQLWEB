<?php
 // memanggil file koneksi.php
 include "koneksi.php";
 // membuat variable dengan nilai dari form
 $username = $_POST['username']; // variablenya = username, dan nilainya sesuai yang dimasukkan di input name="username" tadi
 $password = ($_POST['password']); // variable password, dan nilainya sesuai yang dimasukkan di input name="password" tadi
 // md5 ada sebuah fungsi PHP untuk engkripsi. misalnya admin jadi 21232f297a57a5a743894a0e4a801fc3. untuk lengkapnya, silahkan googling tentang md5
// proses untuk login
// menyesuaikan dengan data di database
 $perintah = "SELECT * FROM TblPengguna1 WHERE username = '$username' AND Password = '$password'";
 $hasil = sqlsrv_query($conn, $perintah);
 $row = sqlsrv_fetch_array($hasil);
 if ($row['username'] == $username AND $row['Password'] == $password) {
 session_start(); // memulai fungsi session
 $_SESSION['username'] = $username;
 header("location:home.php"); // jika berhasil login, maka masuk ke file home.php
 }
 else {
 echo "Gagal Masuk"; // jika gagal, maka muncul teks gagal masuk
 }
 ?>
