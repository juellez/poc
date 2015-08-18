<?php
/**
 * The sidebar containing the secondary widget area, displays on pages.
 * If no active widgets in this sidebar, it will be hidden completely.
 */	
?>

<div id="sidebar_2" class="ske_widget">
	<ul class="skeside">
		<?php 
			global $post, $sidebar;
			$post_slug=$post->post_name;
			if( !empty($sidebar) ) echo '<li class="ske-container side-menu">'.$sidebar.'</li>';
		?>

		<?php
			if( $post_slug != 'donate' ):
		?>
		<li id="donate-button" class="ske-container widget_text">
			<div class="textwidget">
				<a href="/donate" class="button">Donate</a>
			</div>
		</li>
		<?php endif; // end not on donate page ?>

		<?php dynamic_sidebar( 'Page Sidebar' ); ?>
	</ul>
</div>
<!-- #sidebar_2 .ske_widget -->