<div id="full-client-box2" class="skt-section container">
		<?php if(sketch_get_option($advertica_shortname."_hp2_title")): ?>
			<h3 class="inline-border"><?php echo sketch_get_option($advertica_shortname."_hp2_title"); ?></h3>
			<span class="border_left"></span>
			<div class="clearfix">&nbsp;</div>
		<?php endif; ?>
		<div class="row">
			<?php if(sketch_get_option($advertica_shortname.'_hp2_img1_icon')): ?>
				<div class="col-sm-4 hpblock"><a class="ga-track"
					data-track-event-category="PhotoBox"
					href="<?= empty( sketch_get_option($advertica_shortname.'_hp2_img1_link') ) ? '#' : esc_url(sketch_get_option($advertica_shortname.'_hp2_img1_link','advertica-lite')); ?>" title="<?= empty(sketch_get_option($advertica_shortname.'_hp2_img1_title')) ? '' : sketch_get_option($advertica_shortname.'_hp2_img1_title','advertica-lite'); ?>"><img alt="client-logo" src="<?= empty(sketch_get_option($advertica_shortname.'_hp2_img1_icon')) ? '' : sketch_get_option($advertica_shortname.'_hp2_img1_icon','advertica-lite'); ?>"><h4><?= empty(sketch_get_option($advertica_shortname.'_hp2_img1_title')) ? '' : sketch_get_option($advertica_shortname.'_hp2_img1_title','advertica-lite'); ?></h4></a></div>
			<?php endif; ?>

			<?php if(sketch_get_option($advertica_shortname.'_hp2_img2_icon')): ?>
				<div class="col-sm-4 hpblock"><a 
					data-track-event-category="PhotoBox"
					href="<?= empty( sketch_get_option($advertica_shortname.'_hp2_img2_link') ) ? '#' : esc_url(sketch_get_option($advertica_shortname.'_hp2_img2_link','advertica-lite')); ?>" title="<?= empty(sketch_get_option($advertica_shortname.'_hp2_img2_title')) ? '' : sketch_get_option($advertica_shortname.'_hp2_img2_title','advertica-lite'); ?>"><img alt="client-logo" src="<?= empty(sketch_get_option($advertica_shortname.'_hp2_img2_icon')) ? '' : sketch_get_option($advertica_shortname.'_hp2_img2_icon','advertica-lite'); ?>"><h4><?= empty(sketch_get_option($advertica_shortname.'_hp2_img2_title')) ? '' : sketch_get_option($advertica_shortname.'_hp2_img2_title','advertica-lite'); ?></h4></a></div>
			<?php endif; ?>

			<?php if(sketch_get_option($advertica_shortname.'_hp2_img3_icon')): ?>
				<div class="col-sm-4 hpblock"><a 
					data-track-event-category="PhotoBox"
					href="<?= empty( sketch_get_option($advertica_shortname.'_hp2_img3_link') ) ? '#' : esc_url(sketch_get_option($advertica_shortname.'_hp2_img3_link','advertica-lite')); ?>" title="<?= empty(sketch_get_option($advertica_shortname.'_hp2_img3_title')) ? '' : sketch_get_option($advertica_shortname.'_hp2_img3_title','advertica-lite'); ?>"><img alt="client-logo" src="<?= empty(sketch_get_option($advertica_shortname.'_hp2_img3_icon')) ? '' : sketch_get_option($advertica_shortname.'_hp2_img3_icon','advertica-lite'); ?>"><h4><?= empty(sketch_get_option($advertica_shortname.'_hp2_img3_title')) ? '' : sketch_get_option($advertica_shortname.'_hp2_img3_title','advertica-lite'); ?></h4></a></div>
			<?php endif; ?>
		</div>
</div>