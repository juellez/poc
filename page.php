<?php 
/**
* The template for displaying all pages.
*
* This is the template that displays all pages by default.
* Please note that this is the WordPress construct of pages and that other
* 'pages' on your WordPress site will use a different template.
*
*/
get_header(); 

// if this page has children, display them here
$childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
if( $childpages ){
	$subtitle_id = $post->ID;
}
else{
	if( $post->post_parent ){
	    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
		$subtitle_id = $post->post_parent;
	}
}
$post_slug=$post->post_name;
if( $post_slug == 'news' | $post_slug == 'resources' | $post_slug == 'get-informed' || $post_slug == 'about-the-good-news-club' ){
	$headtitle = 'Get Informed';
	$subtitle = 'Stay Informed';
	// $bgphoto = '/images/bwphoto-boy-studying.jpg';
	$childpages = '';
	foreach( array('about-the-good-news-club','parents','administrators','resources','news') as $slug ){
		$subtitle_page = get_page_by_path($slug);
		$childpages .= '<li class="page_item page-item-'.$subtitle_page->ID.'"><a href="/'.$slug.'">'.$subtitle_page->post_title.'</a></li>';
	}
}
else{
	if( $post_slug == 'donate' ){
		$subtitle_page = get_page_by_path('get-involved');
	    $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $subtitle_page->ID . '&echo=0' );
		$subtitle_id = $subtitle_page->ID;
	}
}
if ( $childpages ) {
	// if( $subtitle_id == 18 ){
	// 		$bgphoto = '/images/bwphoto-boytyping.jpg';
	// }
	// outpu the title
	if( empty($subtitle) ) $subtitle = get_post_meta ( $subtitle_id, 'sidebar_title', true );
	if( empty($headtitle) ) $headtitle = get_post_meta ( $subtitle_id, 'header_title', true );
	$sidebar = '<h3>' . $subtitle . '</h3>';
    $sidebar .= '<ul>' . $childpages . '</ul>';
}

if (has_post_thumbnail( $post->ID ) ){
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	$bgphoto = $image[0];
}
$headtitle = get_the_title();
if( stristr($headtitle, ' and ') ){
	$headtitle = str_replace(' and ', ' <span class="amp">&amp;</span> ', $headtitle);
}
$headbkg = get_post_meta ( $post->ID, 'header_bkg', true );
// for our dynamic header sizing
if( strlen($headtitle > 30) ) $s = 3.8;
else $s = 2.6;
?>

<style>
/* .bread-title-holder .container { */
#full-bg-breadimage-fixed {
	background-image: url('<?= empty($bgphoto) ? '/images/kids-blue-banner.jpg' : $bgphoto ?>');
}
<?php if( !empty($headbkg) ): ?>
.img-cover{
	background-color: <?=$headbkg ?>;
	opacity: .8;
}
<?php endif; ?>
</style>
<script>
jQuery(document).ready(function () {
	jQuery(window).scroll(function() {
	    var x = jQuery(window).scrollTop();
	    jQuery('#full-bg-breadimage-fixed').css('background-position', 'center ' + parseInt(x / 10) + 'px');
	});
	// jQuery("h1.title").fitText(<?=$s ?>, { minFontSize: '20px' } );
	var max = 43;
	var wonly = true;
	if( jQuery(document).width() < 400 ){
		max = 34;
		wonly = false;
	}
	// var w = jQuery('#banner-title').width();
	textFit(document.getElementById('banner-title'), {alignVert: true, alignHoriz: true, widthOnly: wonly, minFontSize: 18, maxFontSize: max});
});
</script>
<?php global $advertica_shortname; ?>

<div class="main-wrapper-item"> 
	<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
		<div class="bread-title-holder">
			<div id="full-bg-breadimage-fixed"></div>
			<span class="img-cover"></span>
			<div class="container">
<!-- 				<div class="row-fluid">
					<div class="container_inner clearfix">
 -->						<h1 id="banner-title" class="title">
							<?= empty($headtitle) ? get_the_title() : $headtitle; ?></h1>
						<?php  if(sketch_get_option($advertica_shortname."_hide_bread") == 'true') {
							// if ((class_exists('advertica_breadcrumb_class'))) {$advertica_breadcumb->custom_breadcrumb();}
						}
						?>
<!-- 					</div>
				</div>
 -->		</div>
		</div>

	<div class="page-content default-pagetemp">
		<div class="container post-wrap">
			<div class="row-fluid">
				<div id="content" class="span8">
					<div class="post clearfix" id="post-<?php the_ID(); ?>">
						<div class="skepost">
							<?php the_content(); ?>
							<?php wp_link_pages(__('<p><strong>Pages:</strong> ','advertica-lite'), '</p>', __('number','advertica-lite')); ?>
						</div>
					<!-- skepost --> 
					</div>
					<!-- post -->
					<?php edit_post_link('Edit', '', ''); ?>
					<?php endwhile; ?>
					<?php else :  ?>
						<div class="post">
							<h2><?php _e('Page Does Not Exist','advertica-lite'); ?></h2>
						</div>
					<?php endif; ?>
						<div class="clearfix"></div>
				</div>
				<!-- content -->

				<div class="span1">&nbsp;</div>

				<!-- Sidebar -->
				<div id="sidebar" class="span3">
					<?php get_sidebar('page'); ?>
				</div>
				<div class="clearfix"></div>
				<!-- Sidebar --> 
			</div>
		</div>
	</div>

	<?php include("includes/front-featured-boxes-section.php"); ?>

</div>
<?php get_footer(); ?>