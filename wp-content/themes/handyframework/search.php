<?php
/**
 * The template for displaying search results pages.
 *
 * @package Site Theme
 */

get_header(); ?>
<div class="mainContent">
    <div class="topPromoImage" style="background-image: url(<?=get_field('search_top_promo_image', 'option')['sizes']['hd']?>)">
        <div class="topPromoOver">
            <div class="topPromoTable">
                <div class="topPromoCell">
                    <div class="centerDiv">
                        <div class="innerWrapper">
                            <h1><?php printf( __( 'Search Results for: %s', 'best4u' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if ( have_posts() ) : ?>
        <div class="newsList">
            <div class="centerDiv">
                <div class="gRow">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class="newsItemHorizontal">
                            <div class="boxWhite">
                                <?php
                                    $title = get_the_title();
                                ?>
<!--                                <div class="newsItemImage">-->
<!--                                    --><?php //if( get_the_post_thumbnail() ): ?>
<!--                                        <a href="--><?//=get_permalink()?><!--">-->
<!--                                            <img class="--><?//=(get_field('news_thumbnail_position') == 'width' ? 'width' : 'height')?><!--" src="--><?//=get_the_post_thumbnail_url()?><!--" alt="--><?//=$title?><!--">-->
<!--                                        </a>-->
<!--                                    --><?php //else: ?>
<!--                                        <i class="fa fa-picture-o" aria-hidden="true"></i>-->
<!--                                    --><?php //endif; ?>
<!--                                </div>-->
                                <div class="newsItemDescription">
                                    <?php if( $title ): ?>
                                        <h2><a href="<?=get_permalink()?>"><?=$title?></a></h2>
                                    <?php endif; ?>
                                    <p><?=my_content(30, get_the_content());?></p>
                                    <a href="<?=get_permalink()?>" class="more">
                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                        <?=get_field('news_button_more', 'option')?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="newsSingle">
            <div class="centerDiv">
                <div class="innerWrapper">
                    <div class="boxWhite">
                        <div class="contentBox">
                            <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'best4u' ); ?></p>
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div><!--mainContent-->
<?php get_footer(); ?>
