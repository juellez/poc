<?php get_header(); ?>

<?php global $advertica_shortname; ?>

<!-- FEATURED BOXES SECTION -->
<?php include("includes/front-featured-boxes-section.php"); ?>

<!-- AWESOME PARALLAX SECTION -->
<?php include("includes/front-parallax-section.php"); ?>

<!-- PAGE EDITER CONTENT: "home" 10 Questions -->
<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
		<div id="front-content-box" class="skt-section">
			<div class="container">
				<?php the_content(); ?>
			</div>
		</div>
	<?php endwhile; ?>
<?php endif; ?>

<!-- GET INFORMED SECTION -->
<?php include("includes/front-news-section.php"); ?>


<!-- WHAT ARE GOOD NEWS CLUBS SECTION -->
<div id="front-content-box2" class="skt-section content-block">
	<div class="container">
		<?php 
			$page = get_page_by_path('/home/what-are-good-news-clubs', OBJECT, 'page');
			echo $page->post_content;
		?>
	</div>
</div>

<!-- GET INVOLVED SECTION -->
<div id="front-content-box3" class="skt-section">
	<div class="container">
		<h3 class="inline-border">Get Involved</h3>
		<span class="border_left"></span>
		<?php 
			$page = get_page_by_path('/home/get-involved', OBJECT, 'page');
			echo $page->post_content;
		?>
	</div>
</div>

<?php get_footer(); ?>