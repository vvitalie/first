<?php
/**
 * Template Name: Agenda
 */

get_header(); ?>
<div class="mainContent agenda">
    <?php include('inc/templates/top-promo.php'); ?>
    <div class="agenda-filter">
        <div class="centerDiv">
            <?php echo do_shortcode(get_field('agenda_filter_shortcode')); ?>
        </div>
    </div>
    <div class="centerDiv">
        <div class="gRow">
            <div class="posts">
                <?php if(get_the_content()):?>
                    <div class="posts-head">
                        <?php the_content();?>
                    </div>
                <?php endif;?>
                <?php echo do_shortcode(get_field('agenda_filter_shortcode_results')); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
