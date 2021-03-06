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
$results = $wpdb->get_results( 'SELECT * FROM wp_richreviews WHERE post_id = '.$post_id.' AND review_status = 1', OBJECT );
$star_rating = 0;
$star_index = 0;

foreach($results as $item) {
    $star_rating += $item->review_rating;
    $star_index++;
}

if( $star_rating != 0 && $star_index != 0 ) {
    $star_rating = $star_rating / $star_index;
}
$results_count = count($results);
?>
<div class="mainContent">
    <?php while (have_posts()) : the_post(); ?>
        <div class="coacheTop">
            <div class="centerDiv">
                <div class="gRow">
                    <div class="coacheLeft">
                        <?php if( get_the_post_thumbnail() ): ?>
                            <div class="coacheBottomImage">
                                <div class="box">
                                    <img src="<?=get_the_post_thumbnail_url()?>" alt="">
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="name">
                            <h4><?php echo __('Partner', 'best4u');?></h4>
                            <h1><?php the_title()?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="coacheBottom">
            <div class="centerDiv">
                <div class="gRow">
                    <div class="coacheRight">
                        <div class="boxWhite">
                            <div class="contentBox">
                                <div class="coacheSettings">
                                    <div class="coacheSettingsItem">
                                        <strong><?php echo __('Partner', 'best4u');?></strong>
                                        <br>
                                        <?php the_title()?>
                                    </div>

                                    <?php
                                    $regio = get_the_terms( $post_id , 'regio_partners' );
                                    if($regio):
                                    ?>
                                        <div class="coacheSettingsItem">
                                            <strong><?= __('Regio','best4u');?></strong>
                                            <br>
                                            <?php
                                            if($regio) {
                                                echo '<ul>';
                                                foreach ($regio as $regi) {
                                                    echo '<li>' . $regi->name . '</li>';
                                                }
                                                echo '</ul>';
                                            }
                                            ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php
                                    $vakgebieden = get_the_terms( $post_id , 'vakgebieden_partners' );
                                    if($vakgebieden):
                                    ?>
                                        <div class="coacheSettingsItem">
                                            <strong><?= __('Categorieën','best4u');?></strong>
                                            <?php

                                            if($vakgebieden) {
                                                echo '<ul>';
                                                foreach ($vakgebieden as $vak) {
                                                    echo '<li>' . $vak->name . '</li>';
                                                }
                                                echo '</ul>';
                                            }
                                            ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php
                                    $location = get_field('map_coaches', get_the_ID());
                                    if( !empty($location) ):
                                        ?>
                                        <div class="single-map">
                                            <div class="acf-map coaches-map">
                                                <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php
                                $website_button_status = get_field('coache_single_button_website_status', 'option');
                                $website_url = get_field('website');
                                $linkedin_button_status = get_field('coache_single_button_linkedin_status', 'option');
                                $linkedin_url = get_field('linkedin');
                                ?>
                                <?php if( $website_button_status == 'show' && $website_url ): ?>
                                    <a href="<?=$website_url?>" class="button" target="_blank"><?=get_field('coache_single_button_website_text', 'option')?></a>
                                <?php endif; ?>

                                <?php
                                $linkedin = get_field('linkedin');
                                if($linkedin):
                                    ?>
                                    <a href="<?php echo $linkedin;?>" class="linkdin">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>


                    <div class="coach-tabs">

                        <ul class="tabs">
                            <li class="tab-link current" data-tab="tab-1"><?php echo __('Beschrijving','best4u');?></li>
                            <li class="tab-link" data-tab="tab-2"><?php echo __('Reviews','best4u');?></li>
                        </ul>

                        <div id="tab-1" class="tab-content current">
                            <?php the_content();?>
                            <div class="social-share">
                                <?php echo do_shortcode('[social_icons]');?>
                            </div>
                            <?php

                            $posts = get_field('related_posts');

                            if ($posts):?>
                                <div class="ag-sng-posts">
                                    <?php foreach ($posts as $p): // variable must NOT be called $post (IMPORTANT) ?>
                                        <div class="post">
                                            <div class="date">
                                                <span><?php echo get_the_date('j', $p->ID); ?></span>
                                                <span><?php echo get_the_date('F', $p->ID); ?></span>
                                            </div>
                                            <div class="thumbnail">
                                                <?php
                                                if (get_the_post_thumbnail_url($p->ID)) :?>
                                                    <img src="<?php echo get_the_post_thumbnail_url($p->ID); ?>" alt="">
                                                <?php endif; ?>
                                            </div>
                                            <div class="cnt">
                                                <h2><?php echo get_the_title($p->ID); ?></h2>
                                                <?php if (get_field('company_name', $p->ID)): ?>
                                                    <span class="company"><?php echo get_field('company_name', $p->ID); ?></span>
                                                <?php endif; ?>
                                                <div class="content">
                                                    <?php echo my_content(25); ?>
                                                </div>
                                                <?php
                                                $tags = get_the_tags($p->ID);
                                                if ($tags):
                                                    ?>
                                                    <div class="tags">
                                                        <?php

                                                        echo '<ul>';
                                                        foreach ($tags as $tag) {

                                                            echo '<li>' . $tag->name . '</li>';

                                                        }
                                                        echo '</ul>';
                                                        ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <a href="<?php echo get_permalink($p->ID); ?>" class="button">
                                                <?php echo __('Meer informatie', 'best4u'); ?>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div id="tab-2" class="tab-content">
                            <?php if($results): ?>
                                <div class="reviewsList">
                                    <?php foreach($results as $item): ?>
                                        <div class="boxWhite">
                                            <div class="reviewHeader">
                                                <h3><?= $item->review_title ?></h3>
                                                <div class="meta">
                                                    <div class="author"><?= $item->reviewer_name ?></div>,
                                                    <div class="date"><?= date('d F Y', strtotime($item->date_time)) ?></div>
                                                </div>
                                            </div>
                                            <div class="starRating">
                                                <ul class="starRatingList">
                                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                                        <li><i class="fa fa-star <?= ($i > $item->review_rating ? 'disabled' : '') ?>" aria-hidden="true"></i></li>
                                                    <?php endfor; ?>
                                                </ul>
                                            </div>
                                            <p><?= $item->review_text ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif;
                            echo do_shortcode('[RICH_REVIEWS_FORM]');
                            ?>
                        </div>

                    </div><!-- container -->

                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>
<?php get_footer(); ?>
