<?php
$from = "walterwan1990@foxmail.com";
$subject = $_POST["subject"];
$text = $_POST["elvismail"];

$dbc = mysqli_connect("localhost", "root", "", "elvis_store")
	or die("Error connecting MySQL server");
$query = "SELECT * FROM email_list";
$result = mysqli_query($dbc, $query)
	or die("Error querying database.");

while($row = mysqli_fetch_array($result)) {
	$first_name = $row["first_name"];
	$last_name = $row["last_name"];
	$to = $row["email"];
	$msg = "Dear $first_name $last_name, \n$text";

	mail($to, $subject, $msg, "From:" . $from);

	echo "Email sent to: " . $to . "<br />";
}

mysqli_close($dbc);
?>