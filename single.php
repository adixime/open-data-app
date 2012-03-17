<?php

require_once 'includes/filter-wrapper.php';

require_once 'includes/db.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if(empty($id)) {
	header('Location: index.php');
	exit; 
}


$sql = $db->prepare('
	SELECT id, name, street_address, longitude, latitude 
	FROM open_data_app
	where id = :id
');
$sql->bindValue(':id', $id, PDO::PARAM_INT);
$sql->execute();
$results = $sql->fetch();
if(empty($results)) {
	header('Location: index.php');
	exit; 
}

include 'includes/user-top.php';

?>
	<h1>Community Garden: <?php echo $results['name']; ?></h1>
	<dl>
		<dt>Street Address: </dt><dd><?php echo $results['street_address']; ?></dd>
		<dt>Longitude: </dt><dd><?php echo $results['longitude']; ?></dd>
		<dt>Latitude: </dt><dd><?php echo $results['latitude']; ?></dd>
	</dl>
	<a href="index.php">Home</a>

<?php
include 'includes/user-bottom.php';
?>