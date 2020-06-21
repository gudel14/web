<?php
include_once "connect.php";

	class usr{}

	$user_nrp = $_POST["user_nrp"];
	$user_nama = $_POST["user_nama"];
	$user_password = $_POST["user_password "];
	$user_confirmpassword = $_POST["user_confirmpassword"];

	if ((empty($user_nrp))){
		$response = new usr();
		$response ->succsess = 0 ;
		$response ->message ="masukkan nrp";
		die(json_encode($response));
	
	} else if ((empty($user_nama))){
		$response = new usr();
		$response ->succsess = 0 ;
		$response ->message ="masukkan nama";
		die(json_encode($response));

	} else if ((empty($user_password))){
		$response = new usr();
		$response ->succsess = 0 ;
		$response ->message ="masukkan password";
		die(json_encode($response));

	} else if ((empty($confirmpassword)) || $user_password != $confirmpassword ){
		$response = new usr();
		$response ->succsess = 0 ;
		$response ->message ="password tidak sama";
		die(json_encode($response));
	} else {
		if (!empty($user_nrp)&& $user_password==$confirmpassword) {
			$num_rows = mysqli_num_rows(mysql_query($connect, "SELECT * FROM user WHERE user_nrp ='".$user_nrp"'"));

			 if ($num_rows == 0){
                $query = mysqli_query($connect, "INSERT INTO user (user_id, user_nrp, user_nama, user_password) VALUES(0,'".$usernrp."', '".$user_nama"', '".$user_password."')");

                if ($query) {
                	# code...
                	$response = new usr();
					$response ->succsess = 0 ;
					$response ->message ="register berhasil silahkan login";
					die(json_encode($response));

                } else {
                	$response = new usr();
					$response ->succsess = 0 ;
					$response ->message ="nrp sudah ada";
					die(json_encode($response));
                }

            }else {
            	# code...
            	$response = new usr();
				$response ->succsess = 0 ;
				$response ->message ="nrp sudah ada";
				die(json_encode($response));

            }
		} 
	}


mysqli_close($connect);

?>