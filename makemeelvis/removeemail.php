<?php

$dbc = mysqli_connect("localhost", "root", "", "elvis_store")
	or die("Error connecting MySQL server");

$email = $_POST["email"];

$query = "DELETE FROM email_list WHERE email = '$email'";

mysqli_query($dbc, $query)
	or die("Error querying database");

mysqli_close($dbc);

echo "$email has been deleted!";
?>