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
                        <h1><?php the_title()?></h1>
                        <div class="starRating">
                            <ul class="starRatingList">
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                    <li><i class="fa fa-star <?= ($i > $star_rating ? 'disabled' : '') ?>" aria-hidden="true"></i></li>
                                <?php endfor; ?>
                            </ul>
                            <div class="reviewsLabel"><?= $star_index ?> <?=get_field('coache_single_review_title','option')?></div>
                        </div>
                        <h4><?=get_field('coaches_profile_title','option')?></h4>
                        <?php the_content()?>
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
                                <?php if( get_the_post_thumbnail() ): ?>
                                    <div class="coacheBottomImage">
                                        <div class="box">
                                            <img src="<?=get_the_post_thumbnail_url()?>" alt="">
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="coacheSettings">
                                    <div class="coacheSettingsItem">
                                        <strong><?=get_field('coaches_coach_title','option')?></strong>
                                        <br>
                                        <?php the_title()?>
                                    </div>
                                    <div class="coacheSettingsItem">
                                        <strong><?=get_field('coaches_company_title','option')?></strong>
                                        <br>
                                        <?=get_field('company_name')?>
                                    </div>
                                    <div class="coacheSettingsItem">
                                        <strong><?= __('Regio','best4u');?></strong>
                                        <br>
                                        <?php
                                        $regio = get_the_terms( $post_id , 'regio' );

                                        if($regio) {
                                            echo '<ul>';
                                            foreach ($regio as $regi) {
                                                echo '<li>' . $regi->name . '</li>';
                                            }
                                            echo '</ul>';
                                        }
                                        ?>

                                            ?>
                                            
                                    </div>
                                    <div class="coacheSettingsItem">
                                        <strong><?= __('Kennisgebieden','best4u');?></strong>
	                                    <?php
                                        $vakgebieden = get_the_terms( $post_id , 'vakgebieden' );
                                        if($vakgebieden) {
                                            echo '<ul>';
                                            foreach ($vakgebieden as $vak) {
                                                echo '<li>' . $vak->name . '</li>';
                                            }
                                            echo '</ul>';
                                        }
	                                    ?>
                                    </div>
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
                                <?php if( $linkedin_button_status == 'show' && $linkedin_url ): ?>
                                    <a href="<?=$linkedin_url?>" class="button simple" target="_blank">
                                        <img src="<?=get_field('coache_single_button_linkedin_image', 'option')['url']?>" alt="<?=get_field('coache_single_button_linkedin_image', 'option')['alt']?>">
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="coacheLeft">
                        <?php if($results): ?>
                            <div class="reviewsList">
                                <h2><?= get_field('coache_single_review_title', 'option') ?></h2>
                                <?php
                                    $star_index = 0;
                                ?>
                                <?php foreach($results as $item): ?>
                                    <?php $star_index++; ?>
                                    <?php if($star_index == 3): ?>
                                        <div class="hideReviews">
                                    <?php endif; ?>
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
                                    <?php if($star_index == $results_count && $star_index > 2): ?>
                                        </div>
                                        <a href="#" class="link-more"><i class="fa fa-chevron-down" aria-hidden="true"></i><span><?= get_field('coache_single_more_text', 'option') ?></span></a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>
<?php get_footer(); ?>
