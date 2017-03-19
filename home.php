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
