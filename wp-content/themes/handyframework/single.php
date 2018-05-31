<?php
/**
 * The template for displaying all single posts.
 *
 * @package Site Theme
 */

get_header(); ?>
<div id="primary" class="mainContent">
    <?php while (have_posts()) : the_post(); ?>
        <div class="topPromoImage" style="background-image: url(<?=get_field('news_top_promo_image', 'option')['sizes']['hd']?>)">
            <div class="topPromoOver">
                <div class="topPromoTable">
                    <div class="topPromoCell">
                        <div class="centerDiv">
                            <div class="innerWrapper">
                                <h1><?php the_title();?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="newsSingle">
            <div class="centerDiv">
                <div class="innerWrapper">
                    <div class="boxWhite">
                        <div class="contentBox">
                            <?php if( get_the_post_thumbnail() ): ?>
                                <div class="thumbnailImage">
                                    <img src="<?=get_the_post_thumbnail_url()?>" alt="<?php the_title();?>">
                                </div>
                            <?php endif; ?>
                            <div class="entry-meta">
                                <?php best4u_posted_on(); ?>
                            </div>
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>
<?php get_footer(); ?>
