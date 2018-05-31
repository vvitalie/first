<?php
/*
 *Template Name: Home
*/
get_header(); ?>
	<div class="mainContent">
        <?php include('inc/templates/top-promo.php'); ?>
        <?php include('inc/templates/important-points.php'); ?>
        <?php include('inc/templates/about.php'); ?>
        <?php include('inc/templates/promo.php'); ?>
        <?php include('inc/templates/district.php'); ?>
        <?php if( have_posts() ): ?>
            <div class="centerDiv">
                <?php while( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <?php include('inc/templates/bottom-promo.php'); ?>
	</div><!--mainContent-->
<?php get_footer(); ?>
