<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Make Me Elvis - Add Email</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <img src="blankface.jpg" width="161" height="350" alt="" style="float:right" />
  <img name="elvislogo" src="elvislogo.gif" width="229" height="32" border="0" alt="Make Me Elvis" />
  <p>Enter your first name, last name, and email to be added to the <strong>Make Me Elvis</strong> mailing list.</p>

<?php
if (isset($_POST["submit"])) {
	$first_name = $_POST["firstname"];
	$last_name = $_POST["lastname"];
	$email = $_POST["email"];
    $output_form = false;
	
	if ((!empty($first_name)) && (!empty($last_name)) && (!empty($email))) {

	$dbc = mysqli_connect('localhost', 'elvis', 'elvis', 'elvis_store')
   		or die('Error connecting to MySQL server.');

	$query = "INSERT INTO email_list (first_name, last_name, email)  VALUES ('$first_name', '$last_name', '$email')";
    
    mysqli_query($dbc, $query)
       	or die ('Data not inserted.');

    echo 'Customer added.';

    mysqli_close($dbc);
	} else {
		echo "Please fill out all of the information.";
    	$output_form = true;
	}

} else {
	$output_form = true;
}


if ($output_form) {
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="firstname">First name:</label>
    <input type="text" id="firstname" name="firstname" value="<?php $first_name; ?>" /><br />
    <label for="lastname">Last name:</label>
    <input type="text" id="lastname" name="lastname" value="<?php $last_name; ?>" /><br />
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" value="<?php $email; ?>" /><br />
    <input type="submit" name="submit" value="Submit" />
</form>
<?php
}
?>

</body>
</html>