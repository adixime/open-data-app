<?php

	/**
  * The page where you can add a garden.
  *
  * @author  Aditya Gupta <adixime@gmail.com>
  *
  * @copyright adixime
  *
  * @link http://community-gardens.phpfogapp.com/admin/add.php
  *
  * @Version 1.0.0
  *
  */

require_once '../includes/users.php';

if (!user_is_signed_in()) {
	header('Location: sign-in.php');
	exit;	
}

require_once '../includes/filter-wrapper.php';

$errors = array();

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$street_address = filter_input(INPUT_POST, 'street_address', FILTER_SANITIZE_STRING);
$longitude = filter_input(INPUT_POST, 'longitude', FILTER_SANITIZE_NUMBER_FLOAT);
$latitude = filter_input(INPUT_POST, 'latitude', FILTER_SANITIZE_NUMBER_FLOAT);

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
			INSERT INTO open_data_app (name, street_address, longitude, latitude)
			VALUES (:name, :street_address, :longitude, :latitude)
		');
		$sql->bindValue(':name', $name, PDO::PARAM_STR);
		$sql->bindValue(':street_address', $street_address, PDO::PARAM_STR);
		$sql->bindValue(':longitude', $longitude, PDO::PARAM_STR);
		$sql->bindValue(':latitude', $latitude, PDO::PARAM_STR);
		$sql->execute();

		header('Location: index.php');
		exit;
	}
}

include '../includes/admin-top.php';

?>
	<div class="another_body">
    	<div class="single_body">
            <form method="post" action="add.php">
                <div>
                    <label for="name">Community Garden Name:<?php if (isset($errors['name'])) : ?> <strong>is required</strong><?php endif; ?></label>
                    <input id="name" name="name" value="<?php echo $name; ?>" required>
                </div>
                <div>
                    <label for="street_address">Street Address<?php if (isset($errors['street_address'])) : ?> <strong>is required</strong><?php endif; ?></label>
                    <input id="street_address" name="street_address" value="<?php echo $street_address; ?>" required>
                </div>
                <div>
                    <label for="longitude">Longitude:<?php if (isset($errors['longitude'])) : ?> <strong>is required</strong><?php endif; ?></label>
                    <input id="longitude" name="longitude" type="number" value="<?php echo $longitude; ?>" required>
                </div>
                <div>
                    <label for="latitude">Latitude:<?php if (isset($errors['latitude'])) : ?> <strong>is required</strong><?php endif; ?></label>
                    <input id="latitude" name="latitude" type="number" value="<?php echo $latitude; ?>" required>
                </div>
                <button type="submit">Add</button>
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