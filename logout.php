<?php
 session_start(); // memulai session
 session_destroy(); // menghapus session
 header("location:form_login.php"); // mengambalikan ke form_login.php
 ?>
