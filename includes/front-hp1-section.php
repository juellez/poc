<div id="full-client-box" class="skt-section container">

		<?php if(sketch_get_option($advertica_shortname."_clientsec_title")): ?>
			<h3 class="inline-border"><?php echo sketch_get_option($advertica_shortname."_clientsec_title"); ?></h3>
			<span class="border_left"></span>
			<div class="clearfix">&nbsp;</div>
		<?php endif; ?>
		<div class="row">
			<?php if(sketch_get_option($advertica_shortname.'_img1_icon')): ?>
				<div class="col-sm-6 col-md-3 hpblock"><a href="<?= empty( sketch_get_option($advertica_shortname.'_img1_link') ) ? '#' : esc_url(sketch_get_option($advertica_shortname.'_img1_link','advertica-lite')); ?>" title="<?= empty(sketch_get_option($advertica_shortname.'_img1_title')) ? '' : sketch_get_option($advertica_shortname.'_img1_title','advertica-lite'); ?>"><img alt="client-logo" src="<?= empty(sketch_get_option($advertica_shortname.'_img1_icon')) ? '' : sketch_get_option($advertica_shortname.'_img1_icon','advertica-lite'); ?>"><h4><?= empty(sketch_get_option($advertica_shortname.'_img1_title')) ? '' : sketch_get_option($advertica_shortname.'_img1_title','advertica-lite'); ?></h4></a></div>
			<?php endif; ?>

			<?php if(sketch_get_option($advertica_shortname.'_img2_icon')): ?>
				<div class="col-sm-6 col-md-3 hpblock"><a href="<?= empty( sketch_get_option($advertica_shortname.'_img2_link') ) ? '#' : esc_url(sketch_get_option($advertica_shortname.'_img2_link','advertica-lite')); ?>" title="<?= empty(sketch_get_option($advertica_shortname.'_img2_title')) ? '' : sketch_get_option($advertica_shortname.'_img2_title','advertica-lite'); ?>"><img alt="client-logo" src="<?= empty(sketch_get_option($advertica_shortname.'_img2_icon')) ? '' : sketch_get_option($advertica_shortname.'_img2_icon','advertica-lite'); ?>"><h4><?= empty(sketch_get_option($advertica_shortname.'_img2_title')) ? '' : sketch_get_option($advertica_shortname.'_img2_title','advertica-lite'); ?></h4></a></div>
			<?php endif; ?>

			<?php if(sketch_get_option($advertica_shortname.'_img3_icon')): ?>
				<div class="col-sm-6 col-md-3 hpblock"><a href="<?= empty( sketch_get_option($advertica_shortname.'_img3_link') ) ? '#' : esc_url(sketch_get_option($advertica_shortname.'_img3_link','advertica-lite')); ?>" title="<?= empty(sketch_get_option($advertica_shortname.'_img3_title')) ? '' : sketch_get_option($advertica_shortname.'_img3_title','advertica-lite'); ?>"><img alt="client-logo" src="<?= empty(sketch_get_option($advertica_shortname.'_img3_icon')) ? '' : sketch_get_option($advertica_shortname.'_img3_icon','advertica-lite'); ?>"><h4><?= empty(sketch_get_option($advertica_shortname.'_img3_title')) ? '' : sketch_get_option($advertica_shortname.'_img3_title','advertica-lite'); ?></h4></a></div>
			<?php endif; ?>

			<?php if(sketch_get_option($advertica_shortname.'_img4_icon')): ?>
				<div class="col-sm-6 col-md-3 hpblock"><a href="<?= empty( sketch_get_option($advertica_shortname.'_img4_link') ) ? '#' : esc_url(sketch_get_option($advertica_shortname.'_img4_link','advertica-lite')); ?>" title="<?= empty(sketch_get_option($advertica_shortname.'_img4_title')) ? '' : sketch_get_option($advertica_shortname.'_img4_title','advertica-lite'); ?>"><img alt="client-logo" src="<?= empty(sketch_get_option($advertica_shortname.'_img4_icon')) ? '' : sketch_get_option($advertica_shortname.'_img4_icon','advertica-lite'); ?>"><h4><?= empty(sketch_get_option($advertica_shortname.'_img4_title')) ? '' : sketch_get_option($advertica_shortname.'_img4_title','advertica-lite'); ?></h4></a></div>
			<?php endif; ?>
		</div>

</div>