<?php

require_once 'includes/filter-wrapper.php';

require_once 'includes/db.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if(empty($id)) {
	header('Location: index.php');
	exit; //Stop the PHP compiler right here and immediately redirect the user	
}

//Only connect to the database if there is an ID, because this is after the above if statement
//Witout an ID there is no point connecting to the database

//3rd way of getting info from database or to put in but it allows to change how the query works based on the info added.
//->prepare() allows us to execute SQL with user input
//this also prepares against sql injection
$sql = $db->prepare('
	SELECT id, name, street_address, longitude, latitude 
	FROM open_data_app
	where id = :id
');
//->bindValue() lets us fill in placeholders in our prepared statement
// :id is a placeholder for us to SECURELY put information 
$sql->bindValue(':id', $id, PDO::PARAM_INT);
// Performs the SQL query on the database
$sql->execute();
// Gets the results from the sql query and stores them in a variable
// fetchAll() if we expect to get all results
// fetch() if we need to get one result
$results = $sql->fetch();
//Redirect the user back to the homepage if ther eare no database results
//No results will happen if they chande the ?id=4 to include an ID that doesn't exist
if(empty($results)) {
	header('Location: index.php');
	exit; //Stop the PHP compiler right here and immediately redirect the user	
}


?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Open Data App Prototype</title>
	<link href="css/public.css" rel="stylesheet">
</head>

<body>

	<h1>Community Garden: <?php echo $results['name']; ?></h1>
    <p>Street Address: <?php echo $results['street_address']; ?></p>
	<p>Longitude: <?php echo $results['longitude']; ?></p>
	<p>Latitude: <?php echo $results['latitude']; ?></p>
	<a href="index.php">Home</a>
    
</body>
</html>