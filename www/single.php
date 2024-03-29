<?php
/**
  * The page where you can see the exact co-ordinates and rate.
  *
  * @author  Aditya Gupta <adixime@gmail.com>
  *
  * @copyright adixime
  *
  * @link http://community-gardens.phpfogapp.com/single.php
  *
  * @Version 1.0.0
  *
  */

require_once 'includes/filter-wrapper.php';

require_once 'includes/db.php';

require_once 'includes/functions.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if(empty($id)) {
	header('Location: index.php');
	exit; 
}


$sql = $db->prepare('
	SELECT id, name, street_address, longitude, latitude, rate_count, rate_total 
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

$title = $results['name'];

if ($results['rate_count'] > 0) {
	$rating = round($results['rate_total'] / $results['rate_count']);
} else {
	$rating = 0;
}

$cookie = get_rate_cookie();

include 'includes/user-top.php';

?>

<div class="another_body">
    <div class="single_body">
            <h1><?php echo $results['name']; ?></h1>
        
        <dl>
            <dt>Average Rating</dt><dd><meter value="<?php echo $rating; ?>" min="0" max="5"><?php echo $rating; ?> out of 5</meter></dd>
            <dt>Address</dt><dd><?php echo $results['street_address']; ?></dd>
            <dt>Longitude</dt><dd><?php echo $results['longitude']; ?></dd>
            <dt>Latitude</dt><dd><?php echo $results['latitude']; ?></dd>
        </dl>
        
        <?php if (isset($cookie[$id])) : ?>
        
        <h2>Your rating</h2>
        <ol class="rater rater-usable">
            <?php for ($i = 1; $i <= 5; $i++) : ?>
                <?php $class = ($i <= $cookie[$id]) ? 'is-rated' : ''; ?>
                <li class="rater-level <?php echo $class; ?>">★</li>
            <?php endfor; ?>
        </ol>
        
        <?php else : ?>
        
        <h2>Rate</h2>
        <ol class="rater rater-usable">
            <?php for ($i = 1; $i <= 5; $i++) : ?>
            <li class="rater-level"><a href="rate.php?id=<?php echo $results['id']; ?>&rate=<?php echo $i; ?>">★</a></li>
            <?php endfor; ?>
        </ol>
        
    <?php endif; ?>

    </div>
    
    <a href="index.php" class="home">Home</a>
    
</div>

<footer>
		<p>copyright @adixime, 2012</p>
</footer>

	<div id="disqus_thread"></div>
	<script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'communitygardensapp'; // required: replace example with your forum shortname
    
        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
   <!-- <a href="http://disqus.com" class="dsq-brlink">blog comments powered by <span class="logo-disqus">Disqus</span></a>
-->
<?php
include 'includes/user-bottom.php';
?>