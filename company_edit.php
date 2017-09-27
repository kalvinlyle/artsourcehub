<?php
$id = htmlspecialchars(trim($_POST['id']));
$name = htmlspecialchars(trim($_POST['name']));
$website = htmlspecialchars(trim($_POST['website']));
$address = htmlspecialchars(trim($_POST['address']));
$type = (int)htmlspecialchars(trim($_POST['type']));
$lat = htmlspecialchars(trim($_POST['lat']));
$lng = htmlspecialchars(trim($_POST['lng']));

$db = new PDO('sqlite:data.sqlite');
$sql = "UPDATE company SET name = '$name', website='$website', address ='$address', type ='$type', lat ='$lat', lng ='$lng' WHERE id = '$id';";
error_log($sql);
$db->exec($sql);
$db = NULL;

/*
$subject = "Welcome to the Leaflet Users Map!";
$body = '
<html>
<head>
</head>
<body>
	<p>Thanks for adding yourself to the map!</p>
	Your account information:<br>
	-------------------------<br>
	Email: '.$email.'<br>
	Token: '.$token.'<br>
	-------------------------<br><br>
	Should you need to edit your information, please visit the map and click on the Remove me button.<br>
	Enter your email and unique token to remove your entry from the database.<br>
	Feel free to add yourself back to the map at any time!
</body>
</html>
';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Leaflet Users Map <noreply@artsourcehub.com>' . "\r\n";
mail($email, $subject, $body, $headers, "-fnoreply@artsourcehub.com");
*/

?>