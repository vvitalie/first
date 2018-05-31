<?php
    $top_promo_status = get_field('top_promo_status');
?>
<?php if( $top_promo_status == 'show' ): ?>
    <?php
        $top_promo_type = get_field('top_promo_type');
    ?>

    <?php if( $top_promo_type == 'slider' ): ?>

        <div class="topPromoSlider">
            <?= do_shortcode(get_field('top_promo_slider')) ?>
        </div>
    <?php endif; ?>

    <?php if( $top_promo_type == 'image' ): ?>
        <div class="topPromoImage <?=($is_IE || $is_edge ? 'iefix' : '')?>" style="background-image: url(<?=get_field('top_promo_image')['sizes']['hd']?>)">
            <div class="topPromoOver">
                <div class="topPromoTable">
                    <div class="topPromoCell">
                        <div class="centerDiv">
                            <div class="innerWrapper">
                                <?=get_field('top_promo_image_text')?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php else: ?>
    <div class="topPromoImage <?=($is_IE || $is_edge ? 'iefix' : '')?>" style="background-image: url(<?=get_field('pages_default_top_promo_image', 'option')['sizes']['hd']?>)">
        <div class="topPromoOver">
            <div class="topPromoTable">
                <div class="topPromoCell">
                    <div class="centerDiv">
                        <div class="innerWrapper">
                            <h1>
                                <?php if(is_post_type_archive('ervaringen')): ?>
                                    <?=get_field('ervaringen_title', 'option');?>
                                <?php elseif(is_post_type_archive('adviseurs')): ?>
                                    <?=get_field('adviseurs_title', 'option');?>
                                <?php else: ?>
                                    <?=get_the_title()?>
                                <?php endif; ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
