<?php
include 'functions/db.php';
if(isset($_POST["Import"])){
		
		$filename=$_FILES["file"]["tmp_name"];
		
		if($_FILES["file"]["size"] > 0)
		{
			$file = fopen($filename, "r");
			while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)


			{
	$USER_ID = mysqli_real_escape_string($conn, $getData[0]);
	$PM_PS = mysqli_real_escape_string($conn, $getData[1]);
	$PM_SRTYPE = mysqli_real_escape_string($conn, $getData[2]);
	$PM_SRNUMBER = mysqli_real_escape_string($conn, $getData[3]);
	$PM_SRDATE = mysqli_real_escape_string($conn, $getData[4]);
	$PM_PA = mysqli_real_escape_string($conn, $getData[5]);
	$PM_BN = mysqli_real_escape_string($conn, $getData[6]);
	$PM_UN = mysqli_real_escape_string($conn, $getData[7]);
	$PM_CN = mysqli_real_escape_string($conn, $getData[8]);
	$PM_PL = mysqli_real_escape_string($conn, $getData[9]);
	$PM_MOP = mysqli_real_escape_string($conn, $getData[10]);
	$CONTRACT = mysqli_real_escape_string($conn, $getData[11]);
	$REMARKS = mysqli_real_escape_string($conn, $getData[12]);
	$PM_QUO = mysqli_real_escape_string($conn, $getData[13]);
	$PM_QD = mysqli_real_escape_string($conn, $getData[14]);
	$PM_PO = mysqli_real_escape_string($conn, $getData[15]);
	$PM_POD = mysqli_real_escape_string($conn, $getData[16]);
	$PM_DR = mysqli_real_escape_string($conn, $getData[17]);
	$PM_JO = mysqli_real_escape_string($conn, $getData[18]);

	

	// prepare and execute SQL statement
	$sql = "INSERT INTO subject (USER_ID, PM_PS, PM_SRTYPE, PM_SRNUMBER, PM_SRDATE, PM_PA, PM_BN, PM_UN, PM_CN, PM_PL, PM_MOP, CONTRACT, REMARKS, PM_QUO, PM_QD, PM_PO, PM_POD, PM_DR, PM_JO) 
			VALUES ('$USER_ID', '$PM_PS', '$PM_SRTYPE', '$PM_SRNUMBER', '$PM_SRDATE', '$PM_PA', '$PM_BN', '$PM_UN', '$PM_CN', '$PM_PL', '$PM_MOP', '$CONTRACT', '$REMARKS','$PM_QUO', '$PM_QD', '$PM_PO', '$PM_POD', '$PM_DR', '$PM_JO')";
	
	$result1 = mysqli_query($conn, $sql);

	// check for errors
	if(!$result1) {
		if (mysqli_errno($conn) == 1062) { // Check for duplicate primary key error
		continue;
		} 
		$error_msg = mysqli_error($conn);
		echo "<script type='text/javascript'>
			alert('Error: $error_msg');
			window.location = 'index.php';
			</script>";
		exit;
	}
				}



			}
			fclose($file);
			echo "<script type=\"text/javascript\">
				alert(\"CSV File has been successfully Imported.\");
				window.location = \"index.php\";
			</script>";
			mysqli_close($conn);
		}
		 
?>