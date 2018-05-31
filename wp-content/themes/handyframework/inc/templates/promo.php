<?php
    $promo_status = get_field('promo_status');
    $promo_list = get_field('promo_content');
?>
<?php if( $promo_status == 'show' ): ?>
    <?php if( $promo_list ): ?>
        <div class="promoGrid">
            <div class="centerDiv">
                <?php foreach( $promo_list as $item ): ?>
                    <?php if( $item['acf_fc_layout'] == 'three_column_content' ): ?>
                        <div class="promoGridCol">
                            <div class="gRow">
                                <div class="item description">
                                    <div class="itemBox">
                                        <div class="itemTable">
                                            <div class="itemCell">
                                                <h3><?=$item['title']?></h3>
                                                <div class="descriptionOver">
                                                    <?=$item['content']?>
                                                </div>
                                                <a class="link" target="_BLANK" href="<?=$item['button_link']?>"><i class="fa fa-chevron-right" aria-hidden="true"></i><?=$item['button_text']?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item image">
                                    <div class="itemBox" style="background-image: url(<?=$item['first_image']['sizes']['medium']?>)"></div>
                                </div>
                                <?php if( !is_handheld() || is_handheld() && is_tablet() ): ?>
                                    <div class="item image">
                                        <div class="itemBox" style="background-image: url(<?=$item['secont_image']['sizes']['medium']?>)"></div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if( $item['acf_fc_layout'] == 'two_column_content' ): ?>
                        <div class="promoGridCol">
                            <div class="gRow">
                                <div class="item description">
                                    <div class="itemBox">
                                        <div class="itemTable">
                                            <div class="itemCell">
                                                <h3><?=$item['title']?></h3>
                                                <div class="descriptionOver">
                                                    <?=$item['content']?>
                                                </div>
                                                <a class="link" href="<?=$item['button_link']?>"><i class="fa fa-chevron-right" aria-hidden="true"></i><?=$item['button_text']?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item image big">
                                    <div class="itemBox" style="background-image: url(<?=(!is_mobile() ? $item['image']['sizes']['large'] : $item['image']['sizes']['medium'])?>)"></div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <?php if( !is_handheld() ): ?>
                <div class="promoGridLeft" <?=(get_field('promo_background_left') ? 'style="background-image: url('.get_field('promo_background_left')['sizes']['hd'].')"' : '')?>></div>
                <div class="promoGridRight" <?=(get_field('promo_background_right') ? 'style="background-image: url('.get_field('promo_background_right')['sizes']['hd'].')"' : '')?>></div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>
