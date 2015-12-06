<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Make Me Elvis - Send Email</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <img src="blankface.jpg" width="161" height="350" alt="" style="float:right" />
  <img name="elvislogo" src="elvislogo.gif" width="229" height="32" border="0" alt="Make Me Elvis" />
  <p><strong>Private:</strong> For Elmer's use ONLY<br />
  Write and send an email to mailing list members.</p>
<?php
if (isset($_POST['submit'])) {

	$from = "walterwan1990@foxmail.com";
	$subject = $_POST["subject"];
	$text = $_POST["elvismail"];
	$output_form = false;

	if (empty($subject)) {
		echo "You forgot the email <strong>subject</strong>.<br />";
		$output_form = true;
	}
	if (empty($text)) {
		echo "You forgot the email <strong>body</strong>.<br />";
		$output_form = true;
	}

	if ((!empty($subject)) && (!empty($text))) {

		$dbc = mysqli_connect("localhost", "elvis", "elvis", "elvis_store")
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
	} 
}
else {
	$output_form = true;
}

if ($output_form) {
?>
  <br />	
  <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    <label for="subject">Subject of email:</label><br />
    <input id="subject" name="subject" type="text" size="30" value="<?php echo $subject; ?>" /><br />
    <label for="elvismail">Body of email:</label><br />
    <textarea id="elvismail" name="elvismail" rows="8" cols="40"><?php echo $text; ?></textarea><br />
    <input type="submit" name="submit" value="submit" />
  </form>
<?php 
}
?>
</body>
</html>