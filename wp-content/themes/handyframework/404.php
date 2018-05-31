<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Site Theme
 */

get_header(); ?>
<div class="mainContent">
    <div class="topPromoImage" style="background-image: url(<?=get_field('404_top_promo_image', 'option')['sizes']['hd']?>)">
        <div class="topPromoOver">
            <div class="topPromoTable">
                <div class="topPromoCell">
                    <div class="centerDiv">
                        <div class="innerWrapper">
                            <h1><?php _e( 'Oops! That page can&rsquo;t be found.', 'best4u' ); ?></h1>
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
                        <div class="title404">404</div>
                        <p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'best4u' ); ?></p>
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--mainContent-->
<?php get_footer(); ?>
