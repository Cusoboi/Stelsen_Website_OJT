<?php
include 'functions/db.php';
if(isset($_POST["Import"])){
		
		$filename=$_FILES["file"]["tmp_name"];
		
		if($_FILES["file"]["size"] > 0)
		{
			$file = fopen($filename, "r");
			while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)


			{
	$UNIT_ID = mysqli_real_escape_string($conn, $getData[0]);
	$S_PS = mysqli_real_escape_string($conn, $getData[1]);
	$S_SRTYPE = mysqli_real_escape_string($conn, $getData[2]);
	$S_SRNUMBER = mysqli_real_escape_string($conn, $getData[3]);
	$S_SRDATE = mysqli_real_escape_string($conn, $getData[4]);
	$S_PA = mysqli_real_escape_string($conn, $getData[5]);
	$S_BN = mysqli_real_escape_string($conn, $getData[6]);
	$S_UN = mysqli_real_escape_string($conn, $getData[7]);
	$S_CN = mysqli_real_escape_string($conn, $getData[8]);
	$S_PL = mysqli_real_escape_string($conn, $getData[9]);
	$S_S = mysqli_real_escape_string($conn, $getData[10]);
	$S_QUO = mysqli_real_escape_string($conn, $getData[11]);
	$S_QD = mysqli_real_escape_string($conn, $getData[12]);
	$S_PO = mysqli_real_escape_string($conn, $getData[13]);
	$S_POD = mysqli_real_escape_string($conn, $getData[14]);
	$S_DR = mysqli_real_escape_string($conn, $getData[15]);
	$S_JO = mysqli_real_escape_string($conn, $getData[16]);
	$S_JOD = mysqli_real_escape_string($conn, $getData[17]);
	
	// prepare and execute SQL statement
	$sql = "INSERT INTO servicetab (UNIT_ID, S_PS, S_SRTYPE, S_SRNUMBER, S_SRDATE, S_PA, S_BN, S_UN, S_CN, S_PL, S_S, S_QUO, S_QD, S_PO, S_POD, S_DR, S_JO, S_JOD) 
			VALUES ('$UNIT_ID', '$S_PS', '$S_SRTYPE', '$S_SRNUMBER', '$S_SRDATE', '$S_PA', '$S_BN', '$S_UN', '$S_CN', '$S_PL', '$S_S', '$S_QUO', '$S_QD', '$S_PO', '$S_POD', '$S_DR', '$S_JO', '$S_JOD')";
	
	$result1 = mysqli_query($conn, $sql);

	// check for errors
	if(!$result1) {
		if (mysqli_errno($conn) == 1062) { // Check for duplicate primary key error
		continue;
		} 
		$error_msg = mysqli_error($conn);
		echo "<script type='text/javascript'>
			alert('Error: $error_msg');
			window.location = 'service.php';
			</script>";
		exit;
	}
				}



			}
			fclose($file);
			echo "<script type=\"text/javascript\">
				alert(\"CSV File has been successfully Imported.\");
				window.location = \"service.php\";
			</script>";
			mysqli_close($conn);
		}
		 
?>