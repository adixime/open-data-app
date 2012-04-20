<?php

require_once '../includes/filter-wrapper.php';

$errors = array();
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (empty($id)) {
	header('Location: index.php');
	exit;
}

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$street_address = filter_input(INPUT_POST, 'street_address', FILTER_SANITIZE_STRING);
$longitude = filter_input(INPUT_POST, 'longitude', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$latitude = filter_input(INPUT_POST, 'latitude', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
	if(empty($name)) {
		$errors['name'] = true;
	}
	if (empty($street_address)) {
		$errors['street_address'] = true;
	}
	if (empty($longitude)) {
		$errors['longitude'] = true;
	}
	if (empty($latitude)) {
		$errors['latitude'] = true;
	}
	if (empty($errors)) {
		require_once '../includes/db.php';

		$sql = $db->prepare('
			UPDATE open_data_app
			SET name = :name, street_address = :street_address, longitude = :longitude, latitude = :latitude
			WHERE id = :id
		');
		$sql->bindValue(':id', $id, PDO::PARAM_INT);
		$sql->bindValue(':name', $name, PDO::PARAM_STR);
		$sql->bindValue(':street_address', $street_address, PDO::PARAM_STR);
		$sql->bindValue(':longitude', $longitude, PDO::PARAM_STR);
		$sql->bindValue(':latitude', $latitude, PDO::PARAM_STR);
		$sql->execute();
		
		//header('Location: index.php');
		//exit;
	}
}else {
	require_once '../includes/db.php';

	$sql = $db->prepare('
		SELECT id, name, street_address, longitude, latitude
		FROM open_data_app
		WHERE id = :id
	');
	$sql->bindValue(':id', $id, PDO::PARAM_INT);
	$sql->execute();
	$results = $sql->fetch();

	$name = $results['name'];
	$street_address = $results['street_address'];
	$longitude = $results['longitude'];
	$latitude = $results['latitude'];
}

include '../includes/admin-top.php';

?>
	<div class="another_body">
    	<div class="single_body">
            <form method="post" action="edit.php?id=<?php echo $id; ?>">
                <div>
                    <label for="">Community Garden Name<?php if (isset($errors['name'])) : ?> <strong>is required</strong><?php endif; ?></label>
                    <input id="name" name="name" value="<?php echo $name; ?>" required>
                </div>
                <div>
                    <label for="street_address">Street Address<?php if (isset($errors['street_address'])) : ?> <strong>is required</strong><?php endif; ?></label>
                    <input id="street_address" name="street_address" value="<?php echo $street_address; ?>" required>
                </div>
                <div>
                    <label for="longitude">Longitude<?php if (isset($errors['longitude'])) : ?> <strong>is required</strong><?php endif; ?></label>
                    <input id="longitude" name="longitude" type="number" value="<?php echo $longitude; ?>" required>
                </div>
                <div>
                    <label for="latitude">Latitude<?php if (isset($errors['latitude'])) : ?> <strong>is required</strong><?php endif; ?></label>
                    <input id="latitude" name="latitude" type="number" value="<?php echo $latitude; ?>" required>
                </div>
                <button type="submit">Update</button>
            </form>
		</div>        
        <a href="index.php" class="home">Admin Page</a>
    </div>
	<footer>
		<p>copyright @adixime, 2012</p>
	</footer>
<?php
include '../includes/admin-bottom.php';
?>