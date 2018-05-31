<?php
/*
 *Template Name Experience
*/
get_header(); ?>
<div class="mainContent">
    <?php include('inc/templates/top-promo.php'); ?>
    <?php
        $experience_promo_status = get_field('experience_slider_status');
    ?>
    <?php if( $experience_promo_status == 'show' ): ?>
        <div class="bottomPromo top <?=($is_IE || $is_edge ? 'iefix' : '')?>" style="background-image: url(<?=get_field('expereance_top_promo_image')['sizes']['hd']?>)">
            <div class="bottomPromoOver">
                <div class="bottomPromoTable">
                    <div class="bottomPromoCell">
                        <div class="centerDiv">
                            <div class="innerWrapper">
                                <?=get_field('expereance_top_promo_description')?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="coacheArchiveContent">
        <div class="centerDiv">
            <div class="gRow">
                <div class="simpleContent full">
                    <div class="contentBox">
                        <?php
                        $experience_title = get_field('experience_title');
                        ?>
                        <?php if( $experience_title ): ?>
                            <h1><?=$experience_title?></h1>
                        <?php endif; ?>
                        <?=get_field('experience_description')?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('inc/templates/coaches-list.php'); ?>
</div>
<?php get_footer(); ?>
