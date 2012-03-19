<?php 

require_once 'includes/filter-wrapper.php';

require_once 'includes/db.php';

$results = $db->query(' SELECT id, name, street_address, longitude, latitude 
						FROM open_data_app
					');

include 'includes/user-top.php';

?>
	<a href="admin/index.php">Admin Login</a>
    
	<ol class="gardens">
		<?php foreach ($results as $garden) : ?>
        	<li itemscope itemtype="http://schema.org/Park">
            	<a href="single.php?id=<?php echo $garden['id']; ?>" itemprop="name"><?php echo $garden['name']; ?></a>
				<span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
					<meta itemprop="latitude" content="<?php echo $garden['latitude']; ?>">
					<meta itemprop="longitude" content="<?php echo $garden['longitude']; ?>">
				</span>

            </li>
        <?php endforeach; ?>
	</ul>
	
	<div id="map"></div>

<?php
include 'includes/user-bottom.php';
?>