<?php
	session_start();
	$_SESSION['name'] = 'Jon Snow';

	require 'vendor/autoload.php';

	use Tutorial\GuestBook;
	use Tutorial\Message;

	$gb = new GuestBook();
	$gb->addMessage(new Message('Phil', 'Hello World from Phil'));
	$gb->addMessage(new Message('Al', 'Hello World from Al'));

	if($_POST){
		$name = $_POST['name'];
		$message = $_POST['message'];

		$gb->addMessage(new Message($name, $message));
	}

	$messages = $gb->getMessages();
	$output = '';

	while($row = mysqli_fetch_array($messages)){
		$output .= '<li>(' . $row['id'] . ') ' . $row['name'] . ' : ' . $row['message'] . ' (' . $row['timestamp'] . ')</li>';
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Server Side Scripting - Tutorial 2</title>
</head>
<body>
	<h1>Tutorial 3</h1>
	<p><?php echo $output; ?></p>
	<form action="index.php" method="post">
		<fieldset>
			<legend>Name:</legend>
			<input type="text" name="name">
		</fieldset>
		<fieldset>
			<legend>Message:</legend>
			<input type="text" name="message">
		</fieldset>
		<fieldset>
			<legend>Submit</legend>
			<input type="submit" value="Submit">
		</fieldset>
	</form>
</body>
</html>