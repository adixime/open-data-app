<?php 

require_once '../includes/users.php';

if (!user_is_signed_in()) {
	header('Location: sign-in.php');
	exit;	
}

require_once '../includes/filter-wrapper.php';

require_once '../includes/db.php';

$results = $db->query(' SELECT id, name, street_address, longitude, latitude 
						FROM open_data_app
					');

include '../includes/admin-top.php';


?>

	<div class="another_body">
    	<div class="buttons-top">
           <a href="add.php" class="add">Add a Garden</a>
           <a href="sign-out.php" class="signout">Sign Out</a>
       </div>
    	<div class="single_body admin_body">
          
                
            <ol class="listing">
                
                <?php foreach ($results as $garden) : ?>
                    <li itemscope itemtype="http://schema.org/Park">
                        <a href="../single.php?id=<?php echo $garden['id']; ?>" itemprop="name" id="gardenname"><?php echo $garden['name']; ?></a>
                        <a href="edit.php?id=<?php echo $garden['id']; ?>">Edit</a>
                        <a href="delete.php?id=<?php echo $garden['id']; ?>">Delete</a>
                    </li>
                <?php endforeach; ?>
           </ol>
        </div>        
	</div>
    
    <footer>
		<p>copyright @adixime, 2012</p>
	</footer>

<?php
include '../includes/admin-bottom.php';
?>