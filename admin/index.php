<?php 

require_once '../includes/filter-wrapper.php';

require_once '../includes/db.php';

$results = $db->query(' SELECT id, name, street_address, longitude, latitude 
						FROM open_data_app
					');

include '../includes/admin-top.php';

?>
	<a href="add.php">Add a Community Garden!</a>
    
	<ol>
		
        <?php foreach ($results as $garden) : ?>
        	<li itemscope itemtype="http://schema.org/Park">
            	<a href="../single.php?id=<?php echo $garden['id']; ?>" itemprop="name"><?php echo $garden['name']; ?></a>
                <a href="edit.php?id=<?php echo $garden['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $garden['id']; ?>">Delete</a>
            </li>
        <?php endforeach; ?>
	</ul>
	
	<div id="map"></div>

<?php
include '../includes/admin-bottom.php';
?>