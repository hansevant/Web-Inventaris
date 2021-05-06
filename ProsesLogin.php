<?php
include "Koneksi.php";

$username = $_POST ['username'];
$password = $_POST ['password'];

$login = mysqli_query($sambung,"SELECT * FROM tblogin where username = '$username' and password= '$password'");
$ada = mysqli_num_rows($login);

$a = mysqli_fetch_array($login);

if($ada > 0){

	session_start();

	$_SESSION['id_login'] = $a['id_login'];
	$_SESSION['nama_admin'] = $a['nama_admin'];

	echo "<script>
		alert('Login Sucessfull. WELCOME $_SESSION[nama_admin]'); window.location = 'admin/index.php'

		</script>";
}
else {

	echo "<script>
		alert('Failed To Login, please try again'); window.location = 'index.html'
		</script>";

}

?>