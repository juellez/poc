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
				<img src="/images/twitter-white.png" alt="Twitter" class="footer-twitter" />
				The latest tweets right here! <span class="footer-twitter-handle">via @protectoregonchildren</span>
			</div>
		</div>
	</div>

	<div class="third_wrapper">
		<div class="container">
			<div class="row-fluid">
				<?php $sktURL = 'http://www.sketchthemes.com/'; ?>
				<div class="copyright span4 alpha omega"> <?php echo stripslashes(sketch_get_option($advertica_shortname."_copyright")); ?> </div>

				<div class="footer-list span3 alpha omega"><h4>Get Informed</h4>
					<a href="/parents">For Parents</a>
					<br />
					<a href="/school-administrators">For School Administrators</a>
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
					<a href="/get-involed">Join Us</a>
					<br />
					<a href="/donate">Donate</a>
					<br />
				</div>
				<div class="footer-list span2 alpha omega"><h4>Follow Us</h4>
					<a href="http://facebook.com/protectoregonchildren" title="Facebook"><span class="footer-social sprite-facebook"></a>
					<a href="#" title="Twitter"><span class="footer-social sprite-twitter"></a>
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
</body>
</html>