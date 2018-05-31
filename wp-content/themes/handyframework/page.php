<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Site Theme
 */

get_header(); ?>

<div class="mainContent">
    <?php include('inc/templates/top-promo.php'); ?>
    <?php include('inc/templates/column-content.php'); ?>
    <?php if ( get_the_content(get_the_ID()) ): ?>
        <div class="newsSingle custom">
            <div class="centerDiv">
                <div class="innerWrapper">
                    <div class="boxWhite contentBox">
                        <?php while (have_posts()) : the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php include('inc/templates/bottom-promo.php'); ?>
</div>
<?php get_footer(); ?>
