<?php
/**
 * Template Name: Coaches
 */

get_header(); ?>
<div class="mainContent filtered">
    <?php include('inc/templates/top-promo.php'); ?>
    <div class="centerDiv">
        <div class="gRow">
            <div class="posts-filter">
                <?php echo do_shortcode(get_field('coache_filter_shortcode')); ?>
            </div>
            <div class="filtered-posts">
                <?php if(get_the_content()):?>
                    <div class="posts-head">
                        <?php the_content();?>
                    </div>
                <?php endif;?>
                <?php echo do_shortcode(get_field('coache_filter_shortcode_results')); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
