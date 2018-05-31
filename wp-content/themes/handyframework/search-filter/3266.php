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

if ($query->have_posts()) {
    ?>
    <div class="top-pagination">
        <div class="posts-number">
            <?php

            $cur_page_number = $query->query['paged'];
            $max_page_number = $query->max_num_pages;
            $pages_exc_last = $cur_page_number - 1;
            $posts_per_page = $query->query_vars['posts_per_page'];
            $count_posts = $query->post_count;
            $total_posts = $query->found_posts;
            $posts_number = $posts_per_page * $pages_exc_last + $count_posts;
            $post_type = $query->query['post_type'];
            $cur_posts_of_total = 1;
            $output = '';
            $output .= $posts_number . __(' van ', 'bestu4') . $total_posts . '<span> ' . $post_type . '</span>';
            echo $output;
            ?>
        </div>
        <?php
        custom_paging_nav($query);
        ?>
    </div>


    <?php
    while ($query->have_posts()) {


        $query->the_post();

        ?>
        <div class="post">
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
                    <?php echo my_content(40); ?>
                </div>
                <a href="<?php the_permalink(); ?>" class="button">
                    <?php echo __('Meer informatie', 'best4u');?>
                </a>
            </div>
        </div>

        <?php
    }
    custom_paging_nav($query);
} else {?>
    <div class="no-results"><?php echo __('Geen resultaten gevonden', 'best4u');?></div>
<? } ?>