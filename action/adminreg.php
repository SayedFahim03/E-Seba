<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../connect.php');
	if (isset($_POST['dsubmit'])) {
		$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$sql = "INSERT INTO `admin`(`f_name`, `l_name`, `email`, `username`, `gender`, `phone`, `password`) 
			VALUES ('{$_POST['fname']}','{$_POST['lname']}','{$_POST['email']}','{$_POST['username']}','{$_POST['gender']}','{$_POST['phone']}','{$pass}')";
		$result = mysqli_query($connect, $sql);

		if ($result) {
			header("Location: http://localhost/Emedicare/adminlog.php?success");
		}
	}else

?>