<?php get_header(); ?>

<?php global $advertica_shortname; ?>

<!-- FEATURED BOXES SECTION -->
<?php include("includes/front-featured-boxes-section.php"); ?>

<!-- PAGE EDITER CONTENT: "home" 10 Questions -->
<?php /* if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
		<div id="front-content-box" class="skt-section">
			<div class="container">
				<?php the_content(); ?>
			</div>
		</div>
	<?php endwhile; ?>
<?php endif; */ ?>

<div id="front-content-box" class="skt-section">
	<div class="container">
		<h2>Should I send my child to the Good News Club?</h2>
		<h3>10 Questions for Parents Making this Important Decision</h3>
		<!-- h3>Should I send my child to the Good News Club?</h3 -->
		<div class="cta-main">
		 <hr class="double" />
		 <div class="btn-pad"><a class="button main" href="/parents/10-questions/">Get the Questions</a></div>
		</div>
	</div>
</div>


<!-- GET INFORMED SECTION -->
<?php include("includes/front-hp1-section.php"); ?>

<!-- WHAT ARE GOOD NEWS CLUBS SECTION -->
<div id="front-content-box2" class="skt-section content-block">
	<div class="full-banner">
		<h2>What is the Good News Club?</h2>
	</div>
	<div class="container" style="margin-top: 65px;">
		<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
		<?php 
			$page = get_page_by_path('/home', OBJECT, 'page');
			echo $page->post_content;
		?>
		</div>
	</div>
</div>

<!-- GET INVOLVED SECTION -->
<?php include("includes/front-hp2-section.php"); ?>

<?php get_footer(); ?>