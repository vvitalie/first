<?php if( is_archive() || ($_GET && is_home()) ): ?>
    <?php
        $coaches_promo_status = get_field('coaches_top_promo_status', 'option');
    ?>
    <?php if( $coaches_promo_status == 'show' ): ?>
        <div class="bottomPromo top <?=($is_IE || $is_edge ? 'iefix' : '')?>" style="background-image: url(<?=get_field('coaches_top_promo_image', 'option')['sizes']['hd']?>)">
            <div class="bottomPromoOver">
                <div class="bottomPromoTable">
                    <div class="bottomPromoCell">
                        <div class="centerDiv">
                            <div class="innerWrapper">
                                <?=get_field('coaches_top_promo_description', 'option')?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php else: ?>
    <?php
        $bottom_promo_status = get_field('bottom_promo_status');
    ?>
    <?php if( $bottom_promo_status == 'show' ): ?>
        <div class="bottomPromo <?=($is_IE || $is_edge ? 'iefix' : '')?>" style="background-image: url(<?=get_field('bottom_promo_image')['sizes']['hd']?>)">
            <div class="bottomPromoOver">
                <div class="bottomPromoTable">
                    <div class="bottomPromoCell">
                        <div class="centerDiv">
                            <div class="innerWrapper">
                                <?=get_field('bottom_promo_description')?>
                                <?php if( get_field('bottom_promo_button_status') == 'show' ): ?>
                                    <a href="<?=get_field('bottom_button_link')?>" class="link"><span><?=get_field('bottom_promo_button')?></span></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
