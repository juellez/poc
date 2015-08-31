<?php
/**
 * The sidebar containing the secondary widget area, displays on pages.
 * If no active widgets in this sidebar, it will be hidden completely.
 */	
global $advertica_shortname, $post, $sidebar;
?>

<div id="sidebar_2" class="ske_widget">
	<ul class="skeside">
		<?php 
			$post_slug=$post->post_name;
			if( !empty($sidebar) ) echo '<li class="ske-container side-menu">'.$sidebar.'</li>';
		?>

		<?php
			// get cat of current page
			if( $terms = get_the_terms($post->id, 'poc-cat') ){
				// create our side bar query
				$sbq = new WP_Query( array( 'post_type' => 'sidebar', 'poc-cat' => $terms[0]->slug ) );

				if ( $sbq->have_posts() ) : while ( $sbq->have_posts() ) : $sbq->the_post(); ?>

				<li class="ske-container textwidget side-menu"><?php the_content(); ?></li>

				<?php endwhile; endif;
			}
		?>

                <?php
                        // get cat of current page
                        if( $terms = get_the_terms($post->id, 'poc-cat') ){
                                // create our side bar query
                                $sbq = new WP_Query( array( 'post_type' => 'sidebar', 'poc-cat' => 'global-1st-block', 'order' => 'random') );

                                if ( $sbq->have_posts() ) : while ( $sbq->have_posts() ) : $sbq->the_post(); ?>

                                <li class="ske-container textwidget side-menu"><?php the_content(); ?></li>

                                <?php endwhile; endif;
                        }
                ?>

                <?php
                        // get cat of current page
                        if( $terms = get_the_terms($post->id, 'poc-cat') ){
                                // create our side bar query
                                $sbq = new WP_Query( array( 'post_type' => 'sidebar', 'poc-cat' => 'global-2nd-block', 'order' => 'random') );

                                if ( $sbq->have_posts() ) : while ( $sbq->have_posts() ) : $sbq->the_post(); ?>

                                <li class="ske-container textwidget side-menu"><?php the_content(); ?></li>

                                <?php endwhile; endif;
                        }
                ?>

		<!-- <?php
			$i = rand(1,4);
			if(sketch_get_option($advertica_shortname.'_img'.$i.'_icon')): ?>
			<li class="ske-container side-menu"><div class="hpblock"><a href="<?= empty( sketch_get_option($advertica_shortname.'_img'.$i.'_link') ) ? '#' : esc_url(sketch_get_option($advertica_shortname.'_img'.$i.'_link','advertica-lite')); ?>" title="<?= empty(sketch_get_option($advertica_shortname.'_img'.$i.'_title')) ? '' : sketch_get_option($advertica_shortname.'_img'.$i.'_title','advertica-lite'); ?>"><img 
				alt="client-logo" src="<?= empty(sketch_get_option($advertica_shortname.'_img'.$i.'_icon')) ? '' : sketch_get_option($advertica_shortname.'_img'.$i.'_icon','advertica-lite'); ?>"><h4><?= empty(sketch_get_option($advertica_shortname.'_img'.$i.'_title')) ? '' : sketch_get_option($advertica_shortname.'_img'.$i.'_title','advertica-lite'); ?></h4></a></div></li>
		<?php endif; ?> -->

	</ul>
</div>
<!-- #sidebar_2 .ske_widget -->
