<?php 

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
	include "functions/db.php";

	$serv = $_POST['serv'];

	foreach ($_FILES['my_image']['name'] as $key => $img_name) {
		$img_size = $_FILES['my_image']['size'][$key];
		$tmp_name = $_FILES['my_image']['tmp_name'][$key];
		$error = $_FILES['my_image']['error'][$key];

		if ($error === 0) {
			if ($img_size > 1250000) {
				$em = "Sorry, your file is too large.";
				header("Location: imgup.php?error=$em");
				exit();
			}else {
				$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
				$img_ex_lc = strtolower($img_ex);

				$allowed_exs = array("jpg", "jpeg", "png"); 

				if (in_array($img_ex_lc, $allowed_exs)) {
					$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
					$img_upload_path = 'Service Images/'.$new_img_name;
					move_uploaded_file($tmp_name, $img_upload_path);

					// Insert into Database
					$sql = "INSERT INTO images(image_url, serv) 
					        VALUES('$new_img_name', '$serv')";
					mysqli_query($conn, $sql);
				}else {
					$em = "You can't upload files of this type";
			        header("Location: imgup.php?error=$em");
			        exit();
				}
			}
		}else {
			$em = "Unknown error occurred!";
			header("Location: imgup.php?error=$em");
			exit();
		}
	}

	header("Location: view.php");
}
?>