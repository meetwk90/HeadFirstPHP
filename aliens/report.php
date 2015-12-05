<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Aliens Abducted Me - Report an Abduction</title>
</head>
<body>
  
  <h2>Aliens Abducted Me - Report an Abduction</h2>

<?php
//	$name = $_POST["firstname"] . $_POST["lastname"];
	$first_name = $_POST("firstname");
	$last_name = $_POST("lastname");
	$when = $_POST["whenithappened"];
	$how_long = $_POST["howlong"];
	$description = $_POST["aliendescription"];
	$fang_spotted = $_POST["fangspotted"];
	$email = $_POST["email"];
	$how_many = $_POST["howmany"];
	$what = $_POST["whattheydid"];
	$other = $_POST["other"];

	$dbc = mysqli_connect("localhost", "alien", "alien", "aliendatabase")
		or die("Error connecting to MySQL server");
	$query = "INSERT INTO aliens_abduction (first_name, last_name, when_it_happened, how_long, how_many, alien_description, " . 
		"what_they_did, fang_spotted, other, email) VALUES ('$first_name', '$last_name', '$when', '$how_long', '$how_many', ". 
		"'$description', '$what', '$fang_spotted', '$other', '$emali')";
	$result = mysqli_query($dbc, $query)
		or die("Error queryting database");
	mysqli_close($dbc);

	echo "Thanks for submitting the form.<br />";
	echo "You were abducted " . $when;
	echo " and were gone for " . $how_long . "<br />";
	echo "Number of aliens: " . $how_many . "<br />";
	echo "Describe them: " . $description . "<br />";
	echo "The aliens did this: " . $what . "<br />";
	echo "Was Fang there? " . $fang_spotted . "<br />";
	echo "Other: " . $other . "<br />";
	echo "Your email address is: " . $email;

/*	$to = "1017207277@qq.com";
*	$subject = "Aliens Abducted Me";
*	$msg = "$name was abducted $when and was gone for $how_long.\n" . 
*		"Number of aliens: $how_many\n" . 
*		"Alien description: $description\n" . 
*		"What the did: $what\n" . 
*		"Fang spotted: $fang_spotted\n" . 
*		"Other: $other";
*	mail($to, $subject, $msg, 'From:' . $email);
*/
?>

</body>
</html>