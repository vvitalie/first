<?php
/**
 * The template for displaying all single posts.
 *
 * @package Site Theme
 */

get_header(); ?>
<?php
global $wpdb;
$post_id = get_the_ID();
$results = $wpdb->get_results('SELECT * FROM wp_richreviews WHERE post_id = ' . $post_id . ' AND review_status = 1', OBJECT);
$star_rating = 0;
$star_index = 0;

foreach ($results as $item) {
    $star_rating += $item->review_rating;
    $star_index++;
}

if ($star_rating != 0 && $star_index != 0) {
    $star_rating = $star_rating / $star_index;
}
$results_count = count($results);
?>
<div class="mainContent">
    <?php while (have_posts()) : the_post(); ?>

        <div class="agenda-top">
            <div class="centerDiv">
                <div class="gRow">
                    <div class="left">
                        <?php
                        if (get_field('single_page_title')):
                            ?>
                            <h1><?php the_field('single_page_title'); ?></h1>
                        <?php else: ?>
                            <h1><?php the_title(); ?></h1>
                        <?php endif; ?>
                        <?php
                        if (get_field('subtitle')):
                            ?>
                            <p><?php the_field('subtitle'); ?></p>
                        <?php endif; ?>
                        <div class="social-share">
                            <span><?php echo __('Share', 'best4u'); ?></span>
                            <?php echo do_shortcode('[social_icons]'); ?>
                        </div>
                        <div class="date">
                            <span><?php echo get_the_date('j'); ?></span>
                            <span><?php echo get_the_date('F'); ?></span>
                        </div>
                    </div>
                    <?php $right_bg_image = get_field('header_image'); ?>
                    <div class="right" data-background="<?php echo $right_bg_image['sizes']['large'] ?>"></div>
                </div>
            </div>
        </div>

        <div class="agenda-content">
            <div class="centerDiv">
                <div class="gRow">
                    <div class="left">
                        <?php the_content(); ?>
                        <?php if (get_field('call_to_action_link')): ?>
                            <a href="<?php echo get_field('call_to_action_link'); ?>" class="button">
                                <?php echo get_field('call_to_action_label'); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="right">
                        <div class="row">
                            <div class="icon">
                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                            </div>
                            <div class="info">
                                <span><?php echo __('Datum', 'best4u'); ?></span>
                                <span><?php echo get_the_date('j F Y, H '); ?><?php echo __('uur', 'best4u'); ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="icon">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </div>
                            <div class="info">
                                <span><?php echo __('Locatie', 'bet4u'); ?></span>
                                <span><?php echo get_field('locatie'); ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="icon">
                                <i class="fa fa-tag" aria-hidden="true"></i>
                            </div>
                            <div class="info">
                                <span><?php echo __('Prijs', 'bet4u'); ?></span>
                                <span><?php echo get_field('prijs'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endwhile; ?>
</div>
<?php get_footer(); ?>
