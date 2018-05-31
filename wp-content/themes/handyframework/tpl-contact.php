<?php
/**
 * Template Name: Contact pagina
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
    <div class="centerDiv">
        <div class="contactsPage">
            <div class="gRow">
                <div class="leftContent span-8">
                    <?php if( have_posts() ) : ?>
                        <div class="boxWhite contentBox custom">
                            <?php while( have_posts() ) : the_post(); ?>
                                <?php the_content(); ?>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>

