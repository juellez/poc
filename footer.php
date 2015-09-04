<?php
/**
* The template for displaying the footer.
*
* Contains footer content and the closing of the
* #main and #page div elements.
*
*/
global $tweetfeedmeta,$advertica_shortname;
?>

<?php  
if($tweetfeedmeta == '1' || true){ ?>
<!-- full-twitter-box -->
<div id="full-twitter-box">
	<div class="container">
		<div class="row-fluid">
			<?php  get_template_part('section','twitter-panel'); ?>
		</div>
	</div>
</div>
<?php } ?>
	<div class="clearfix"></div>
</div>
<!-- #main --> 

<!-- #footer -->
<div id="footer">
	<div id="full-twitter-box">
		<div class="container">
			<div class="row-fluid">
				<?php

				// do we display twitter?
				if( sketch_get_option($advertica_shortname.'_twitter_handle') ):
					$twitter_handle = sketch_get_option($advertica_shortname.'_twitter_handle'); // username

					// do we pull in tweets?
					if( sketch_get_option($advertica_shortname.'_twitter_consumer_key') ){
						$api_key = urlencode( sketch_get_option($advertica_shortname.'_twitter_consumer_key') );
						$api_secret = urlencode( sketch_get_option($advertica_shortname.'_twitter_consumer_secret') );
						$auth_url = 'https://api.twitter.com/oauth2/token'; 

						$data_count = 3; // number of tweets
						$data_url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';

						// get api access token
						$api_credentials = base64_encode($api_key.':'.$api_secret);

						$auth_headers = 'Authorization: Basic '.$api_credentials."\r\n".
						                'Content-Type: application/x-www-form-urlencoded;charset=UTF-8'."\r\n";

						$auth_context = stream_context_create(
						    array(
						        'http' => array(
						            'header' => $auth_headers,
						            'method' => 'POST',
						            'content'=> http_build_query(array('grant_type' => 'client_credentials', )),
						        )
						    )
						);

						$auth_response = json_decode(file_get_contents($auth_url, 0, $auth_context), true);
						$auth_token = $auth_response['access_token'];

						// get tweets
						$data_context = stream_context_create( array( 'http' => array( 'header' => 'Authorization: Bearer '.$auth_token."\r\n", ) ) );

						$tweets = json_decode(file_get_contents($data_url.'?count='.$data_count.'&screen_name='.urlencode($twitter_handle), 0, $data_context), true);
					}
				?>
				<div class="span4">
				<img src="/images/twitter-white.png" alt="Twitter" class="footer-twitter" />
				The latest tweets right here <a href="http://twitter.com/<?=$twitter_handle ?>" target="_blank" class="footer-twitter-handle">via @<?=$twitter_handle ?>!</a>
				</div>
				<div class="span8" id="footer-twitter-timeline"><?php
					// result - do what you want
					for ($i = 0; $i <= 2; $i++) {
						print('<span><a href="https://twitter.com/badnewsclub/status/'.$tweets[$i]['id'].'" target="_blank">');
					    print_r($tweets[$i]['text']);
					    print('</a></span>');
					}
				?></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php /* var_dump($tweets); */ ?>
	<div class="third_wrapper">
		<div class="container">
			<div class="row-fluid">
				<?php $sktURL = 'http://www.sketchthemes.com/'; ?>
				<div class="copyright span4 alpha omega"> <?php echo stripslashes(sketch_get_option($advertica_shortname."_copyright")); ?> </div>

				<div class="footer-list span3 alpha omega"><h4>Get Informed</h4>
					<a href="/parents">For Parents</a>
					<br />
					<a href="/administrators">For School Administrators</a>
					<br />
					<a href="/resources">Resources</a>
					<br />
					<a href="/news">News</a>
					<br />
				</div>
				<div class="footer-list span3 alpha omega"><h4>Get Involved</h4>
					<a href="/get-involved/parents">Parents</a>
					<br />
					<a href="/get-involved/concerned-citizens">Concerned Citizens</a>
					<br />
					<a href="/get-involved">Join Us</a>
					<br />
					<a href="/get-involved/donate">Donate</a>
					<br />
				</div>
				<div class="footer-list span2 alpha omega"><h4>Follow Us</h4>
					<a href="http://facebook.com/protectoregonchildren" title="Facebook"><span class="footer-social sprite-facebook"></a>
					<a href="http://twitter.com/badnewsclub" title="Twitter"><span class="footer-social sprite-twitter"></a>
				</div>

				<div class="clearfix"></div>
			</div>
		</div>
	</div><!-- third_wrapper --> 

	<div class="container">
		<div class="row-fluid">
			<div class="second_wrapper">
				<?php dynamic_sidebar( 'Footer Sidebar' ); ?>
				<div class="clearfix"></div>
			</div><!-- second_wrapper -->
		</div>
	</div>

</div>
<!-- #footer -->
</div>
<!-- #wrapper -->
	<a href="JavaScript:void(0);" title="Back To Top" id="backtop"></a>
	<?php wp_footer(); ?>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<script>
jQuery( document ).ready( function(){

	jQuery("#footer-twitter-timeline > span:gt(0)").hide();

	setInterval(function() { 
	  jQuery('#footer-twitter-timeline > span:first')
	    .fadeOut(1000)
	    .next()
	    .fadeIn(1000)
	    .end()
	    .appendTo('#footer-twitter-timeline');
	},  6000);

});
</script>

</body>
</html>
