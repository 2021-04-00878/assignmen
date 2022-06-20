<?php

if ( isset($name) || isset($enrolled) || isset($headmaster) || isset($popularteacher) || isset($results) || isset($occupation) || isset($email) || isset($password) || isset($account)|| isset($username) ) {

$name = $_POST['name'];
$enrolled = $_POST['enrolled'];
$graduated = $_POST['graduated'];
$headmaster = $_POST['headmaster'];
$popularteacher = $_POST['popularteacher'];
$results = $_POST['results'];
$occupation = $_POST['occupation'];
$email = $_POST['email'];
$password = $_POST['password'];
$account = $_POST['account'];
$username = $_POST['username'];

}

if (!empty($name) || !empty($enrolled) || !empty($graduated) || !empty($headmaster) || !empty($popularteacher) || !empty($results) || !empty($occupation) || !empty($email) || !empty($password) || !empty($account) || !empty($username)) {

	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "bubinga";

	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

	if (mysqli_connect_error()){
		die('connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
	} else {
		$SELECT = "SELECT email from alumni where email = ? Limit 1";
		$INSERT = "INSERT Into alumni (name, enrolled, graduated, headmaster, popularteacher, results, occupation, email, password, account, username) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,)";
		$stmt = $conn-> prepare($SELECT);
		$stmt = $bind-Param ("s", $email);
		$stmt -> execute();
		$stmt -> bind_result($email);
		$stmt -> store_result();
		$rnum = $stmt -> num_rows;

		if ($rnum == 0){

			$stmt -> close();
			$stmt = $conn -> prepare($INSERT);
			$stmt -> bind_param("siisssssiss", $name, $enrolled, $graduated, $headmaster, $popularteacher, $results, $occupation, $email, $password, $account, $username,);
			$stmt -> execute();
			echo "New Record inserted successfully";

		}else{
			echo "Someone already uses this an emeil";
		}
		$stmt -> close();
		$conn -> close(); 


	}
}

?>