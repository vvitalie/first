<?php
/**
 * Search & Filter Pro
 *
 * Sample Results Template
 *
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      http://www.designsandcode.com/
 * @copyright 2015 Designs & Code
 *
 * Note: these templates are not full page templates, rather
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think
 * of it as a template part
 *
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs
 * and using template tags -
 *
 * http://codex.wordpress.org/Template_Tags
 *
 */
global $wpdb;
$results = $wpdb->get_results( 'SELECT review_rating, post_id FROM wp_richreviews', OBJECT );

if ($query->have_posts()) {
    ?>

    <?php
    while ($query->have_posts()) {

        $query->the_post();

        ?>
        <div class="post">
            <div class="date">
                <span><?php echo get_the_date('j'); ?></span>
                <span><?php echo get_the_date('F'); ?></span>
            </div>
            <div class="thumbnail">
                <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail("large");
                }
                ?>
            </div>
            <div class="cnt">
                <h2><?php the_title(); ?></h2>
                <?php if(get_field('company_name')):?>
                    <span class="company"><?php the_field('company_name');?></span>
                <?php endif;?>
                <div class="content">
                    <?php echo my_content(25); ?>
                </div>
                <?php
                $tags = get_the_tags();
                if($tags):
                ?>
                    <div class="tags">
                        <?php

                        echo '<ul>';
                            foreach ($tags as $tag){

                                echo '<li>' . $tag->name . '</li>';

                            }
                        echo '</ul>';
                        ?>
                    </div>
                <?php endif;?>
            </div>
            <a href="<?php the_permalink(); ?>" class="button">
                <?php echo __('Meer informatie', 'best4u');?>
            </a>
        </div>

        <?php
    }
    echo '<div class="agenda-pag">';
    custom_paging_nav($query);
    echo '</div>';
} else {?>
    <div class="no-results"><?php echo __('Geen resultaten gevonden', 'best4u');?></div>
<? } ?>