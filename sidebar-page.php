<?php
/**
 * The sidebar containing the secondary widget area, displays on pages.
 * If no active widgets in this sidebar, it will be hidden completely.
 */	
global $advertica_shortname;
?>

<div id="sidebar_2" class="ske_widget">
	<ul class="skeside">
		<?php 
			global $post, $sidebar;
			$post_slug=$post->post_name;
			if( !empty($sidebar) ) echo '<li class="ske-container side-menu">'.$sidebar.'</li>';
		?>

		<!--
		<?php
			if( $post_slug != 'donate' ):
		?>
		<li id="donate-button" class="ske-container widget_text">
			<div class="textwidget">
				<a href="/donate" class="button">Donate</a>
			</div>
		</li>
		<?php endif; // end not on donate page ?>
		-->
		<?php
			$i = rand(1,4);
			if(sketch_get_option($advertica_shortname.'_img'.$i.'_icon')): ?>
			<div class="hpblock"><a href="<?= empty( sketch_get_option($advertica_shortname.'_img'.$i.'_link') ) ? '#' : esc_url(sketch_get_option($advertica_shortname.'_img'.$i.'_link','advertica-lite')); ?>" title="<?= empty(sketch_get_option($advertica_shortname.'_img'.$i.'_title')) ? '' : sketch_get_option($advertica_shortname.'_img'.$i.'_title','advertica-lite'); ?>"><img alt="client-logo" src="<?= empty(sketch_get_option($advertica_shortname.'_img'.$i.'_icon')) ? '' : sketch_get_option($advertica_shortname.'_img'.$i.'_icon','advertica-lite'); ?>"><h4><?= empty(sketch_get_option($advertica_shortname.'_img'.$i.'_title')) ? '' : sketch_get_option($advertica_shortname.'_img'.$i.'_title','advertica-lite'); ?></h4></a></div>
		<?php endif; ?>

		<!--
		<?php dynamic_sidebar( 'Page Sidebar' ); ?>
		-->

	</ul>
</div>
<!-- #sidebar_2 .ske_widget -->
