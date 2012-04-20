<?php 

/**
  * This is the main home page of the open data app where all search operations take place.
  *
  * @author  Aditya Gupta <adixime@gmail.com>
  *
  * @copyright adixime
  *
  * @link http://community-gardens.phpfogapp.com/
  *
  * @Version 1.0.0
  *
  */

//require_once 'includes/filter-wrapper.php';

require_once 'includes/db.php';

$results = $db->query(' SELECT id, name, street_address, longitude, latitude, rate_count, rate_total 
						FROM open_data_app
					');

include 'includes/user-top.php';

?>

	<header>
		<h1 class="head_left">Community Gardens</h1>
		<h1 class="head_right">Ottawa City</h1>
    </header>
	
	<div class="left_side">
		<button id="geo">Find Me</button>
		<div id="map"></div>
		
		<form id="geo-form">
			<label for="adr">SEARCH</label>
			<input id="adr" placeholder="search here...">
		</form>
	</div>
	
	<div class="right_side">
		<a href="admin/index.php" class="admin">Admin Login</a>		
		<ol class="garden">
		
			<?php foreach ($results as $garden) : ?>
				<?php
					if ($garden['rate_count'] > 0) {
					$rating = round($garden['rate_total'] / $garden['rate_count']);
					} else {
					$rating = 0;
				}
			?>
			<li itemscope itemtype="http://schema.org/TouristAttraction" data-id="<?php echo $garden['id']; ?>">
				<strong class="distance"></strong>
				<a href="single.php?id=<?php echo $garden['id']; ?>" itemprop="name"><strong><?php echo $garden['name']; ?></strong></a>
				<span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
					<meta itemprop="latitude" content="<?php echo $garden['latitude']; ?>">
					<meta itemprop="longitude" content="<?php echo $garden['longitude']; ?>">
				</span>
				<meter value="<?php echo $rating; ?>" min="0" max="5"><?php echo $rating; ?> out of 5</meter>
                
				<ol class="rater">
					<?php for ($i = 1; $i <= 5; $i++) : ?>
						<?php $class = ($i <= $rating) ? 'is-rated' : ''; ?>
						<li class="rater-level <?php echo $class; ?>">★</li>
					<?php endfor; ?>
				</ol>
			</li>
            
			<?php endforeach; ?>
		</ol>
	</div>		
	<footer>
		<p>copyright @adixime, 2012</p>
	</footer>
	

<?php
include 'includes/user-bottom.php';
?>