<?php 

require_once '../includes/filter-wrapper.php';

require_once '../includes/db.php';
//var_dump($db);
//->exec() allows us to perform SQ: and NOT expect results
//->query() allows us to perform SQL and expect results
$results = $db->query(' SELECT id, name, street_address, longitude, latitude 
						FROM open_data_app
					');
//var_dump($db->errorInfo());
//var_dump($results);

include '../includes/admin-top.php';

?>
	<a href="add.php">Add a Community Garden!</a>
    
	<ul>
		<?php /*foreach ($results as $movie) {
                echo '<li>' . $movie['movie_title'] . '</li>';
              }*/
        ?>
        
        <?php foreach ($results as $garden) : ?>
        	<li>
            	<a href="../single.php?id=<?php echo $garden['id']; ?>"><?php echo $garden['name']; ?></a>
                <a href="edit.php?id=<?php echo $garden['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $garden['id']; ?>">Delete</a>
            </li>
        <?php endforeach; ?>
	</ul>

<?php
include '../includes/admin-bottom.php';
?>