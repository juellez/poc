<?php global $advertica_shortname; ?>
<?php
	// allow for tracking of clicks on features
	function getContent($piece,$title){
		global $advertica_shortname;
		$c = $parsed = '';
		if( !empty(sketch_get_option($advertica_shortname.$piece)) ){
			$c = sketch_get_option($advertica_shortname.$piece);
			$label = sketch_get_option($advertica_shortname.$title);
			$parsed = str_replace('<a ', '<a class="ga-track" data-track-event-category="FeatureBox" data-track-event-action="click" data-track-event-label="'.$label.'"', $c);
		}
		return $parsed;
	}
?>
<div id="featured-box" class="skt-section">
	<div class="container">
		<div class="mid-box-mid row-fluid"> 
			<!-- Featured Box 1 -->
			<div class="mid-box span4 fade_in_hide element_fade_in">
				<div class="skt-iconbox iconbox-top">		
					<div class="iconbox-icon skt-animated small-to-large skt-viewport">	
						<?php if(sketch_get_option($advertica_shortname.'_fb1_first_part_image')) { ?>
							<a class="skt-featured-images ga-track" 
								data-track-event-category="Home"
								data-track-event-action="Clicks on Feature Box"
								data-track-event-label="1"
								href="<?php if(sketch_get_option($advertica_shortname."_fb1_first_part_link")) { echo sketch_get_option($advertica_shortname."_fb1_first_part_link"); } ?>" 
								title="<?php if(sketch_get_option($advertica_shortname."_fb1_first_part_heading")) { echo sketch_get_option($advertica_shortname."_fb1_first_part_heading"); } ?>">
									<span class="skt-featured-image-mask"></span>
									<img class="skin-bg" src="<?php  echo sketch_get_option($advertica_shortname.'_fb1_first_part_image','advertica-lite'); ?>" alt="boximg"/>
							</a>
						<?php } ?>
					</div>
					<div class="iconbox-content">		
						<h4><?php if(sketch_get_option($advertica_shortname."_fb1_first_part_heading")) { echo sketch_get_option($advertica_shortname."_fb1_first_part_heading"); } ?>:</br>
							<span><?php if(sketch_get_option($advertica_shortname."_fb1_first_part_subheading")) { echo sketch_get_option($advertica_shortname."_fb1_first_part_subheading"); } ?></span></h4>			
						<p><?php echo getContent('_fb1_first_part_content','_fb1_first_part_heading'); ?></p>
					</div>			
					<div class="clearfix"></div>	
				</div>
			</div>
			<!-- Featured Box 2 -->
			<div class="mid-box span4 fade_in_hide element_fade_in" >
				<div class="skt-iconbox iconbox-top">
					<div class="iconbox-icon skt-animated small-to-large skt-viewport">	
					  <?php if(sketch_get_option($advertica_shortname.'_fb2_second_part_image')) { ?>
						<a class="skt-featured-images ga-track" 
								data-track-event-category="Feature Boxes"
								data-track-event-action="click"
								data-track-event-label="2"
								href="<?php if(sketch_get_option($advertica_shortname."_fb2_second_part_link")) { echo esc_url(sketch_get_option($advertica_shortname."_fb2_second_part_link")); } ?>" title="<?php if(sketch_get_option($advertica_shortname."_fb2_second_part_heading")) { echo sketch_get_option($advertica_shortname."_fb2_second_part_heading"); } ?>">
								<span class="skt-featured-image-mask"></span>
								<img class="skin-bg" src="<?php  echo sketch_get_option($advertica_shortname.'_fb2_second_part_image','advertica-lite'); ?>" alt="boximg"/>
						</a>
					  <?php  } ?>	
					</div>		
					<div class="iconbox-content">		
						<h4><?php if(sketch_get_option($advertica_shortname."_fb2_second_part_heading")) { echo sketch_get_option($advertica_shortname."_fb2_second_part_heading"); } ?>:</br>
                            <span><?php if(sketch_get_option($advertica_shortname."_fb2_second_part_subheading")) { echo sketch_get_option($advertica_shortname."_fb2_second_part_subheading"); } ?></span></h4>
						<p><?php echo getContent('_fb2_second_part_content','_fb2_second_part_heading'); ?></p>
					</div>
					<div class="clearfix"></div>	
				</div>
			</div>
			<!-- Featured Box 3 -->
			<div class="mid-box span4 fade_in_hide element_fade_in" >
				<div class="skt-iconbox iconbox-top">		
					<div class="iconbox-icon skt-animated small-to-large skt-viewport">
					  <?php if(sketch_get_option($advertica_shortname.'_fb3_third_part_image')) { ?>			
						<a class="skt-featured-images ga-track" 
								data-track-event-category="Home"
								data-track-event-action="Clicks on Feature Box"
								data-track-event-label="3"
								href="<?php if(sketch_get_option($advertica_shortname."_fb3_third_part_link")) { echo esc_url(sketch_get_option($advertica_shortname."_fb3_third_part_link")); } ?>" title="<?php if(sketch_get_option($advertica_shortname."_fb3_third_part_heading")) { echo sketch_get_option($advertica_shortname."_fb3_third_part_heading"); } ?>">				
								<span class="skt-featured-image-mask"></span>
								<img class="skin-bg" src="<?php  echo sketch_get_option($advertica_shortname.'_fb3_third_part_image','advertica-lite'); ?>" alt="boximg"/>
						</a>
					  <?php } ?>	
					</div>			
					<div class="iconbox-content">			
						<h4><?php if(sketch_get_option($advertica_shortname."_fb3_third_part_heading")) { echo sketch_get_option($advertica_shortname."_fb3_third_part_heading"); } ?>:</br>
                            <span><?php if(sketch_get_option($advertica_shortname."_fb3_third_part_subheading")) { echo sketch_get_option($advertica_shortname."_fb3_third_part_subheading"); } ?></span></h4>			
						<p><?php echo getContent('_fb3_third_part_content','_fb3_third_part_heading'); ?></p>
					</div>		
					<div class="clearfix"></div>	
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
