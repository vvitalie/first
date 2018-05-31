<?php
    global $wpdb;
    $results = $wpdb->get_results( 'SELECT review_rating, post_id FROM wp_richreviews', OBJECT );
?>
<?php

    if( is_post_type_archive('ervaringen') ) {
        $archive_content_status = get_field('ervaringen_content_status', 'option');
    }elseif( is_post_type_archive('adviseurs') ){
        $archive_content_status = get_field('adviseurs_content_status', 'option');
    } else {
        $archive_content_status = get_field('coaches_content_status', 'option');
    }
?>
<?php if( !is_post_type_archive('ervaringen') && get_field('ervaringen_descriptions', 'option') || !is_post_type_archive('adviseurs') && get_field('adviseurs_descriptions', 'option') ): ?>
    <?php if( $archive_content_status == 'show' && is_archive() ): ?>
        <div class="coacheArchiveContent">
            <div class="centerDiv">
                <div class="gRow">
                    <div class="simpleContent">
                        <div class="contentBox">
                            <?php
                                if( is_post_type_archive('ervaringen') ) {
                                    $archive_title = get_field('ervaringen_title', 'option');
                                    $archive_description = get_field('ervaringen_descriptions', 'option');
                                }elseif( is_post_type_archive('adviseurs') ){
                                    $archive_title = get_field('adviseurs_title', 'option');
                                    $archive_description = get_field('adviseurs_descriptions', 'option');
                                }else {
                                    $archive_title = get_field('coahes_title', 'option');
                                    $archive_description = get_field('coaches_descriptions', 'option');
                                }

                            ?>
                            <?php if( !is_post_type_archive('ervaringen') && !is_post_type_archive('adviseurs') ): ?>
                                <?php if( $archive_title ): ?>
                                    <h1><?=$archive_title?></h1>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?=$archive_description?>
                        </div>
                    </div>
                    <?php
                        $coache_registration_status = get_field('coaches_regitration_status', 'option');
                    ?>
                    <?php if( !is_post_type_archive('ervaringen') && !is_post_type_archive('adviseurs') ): ?>
                        <?php if( $coache_registration_status == 'show' ): ?>
                            <div class="simpleSidebar">
                                <div class="boxWhite">
                                    <?=get_field('coache_registration_description', 'option');?>
                                    <?php if( get_field('coache_registration_button_status', 'option') == 'show' ): ?>
                                        <a href="<?=get_field('coache_registration_button_link', 'option')?>" class="button medium"><?=get_field('coache_registration_button_text', 'option')?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php
    if( !is_archive() ) {
        $args = array(
            'post_type' => 'coaches',
            'orderby' => 'date',
            'posts_per_page' => 12
        );

        $the_query = new WP_Query( $args );
    }
?>
<?php if ( have_posts() ) : ?>
    <div class="coachesList <?= (is_post_type_archive('ervaringen') && !get_field('ervaringen_descriptions', 'option') ? 'ervaringen-only' : is_post_type_archive('adviseurs') && !get_field('adviseurs_descriptions', 'option') ? 'ervaringen-only' : '') ?>">
        <div class="centerDiv">
            <div class="innerWrapper">
                <div class="gRow">
                    <?php
                        $index = 0;
                        $indexFirst = 0;
                        $itemFirst = 'first';
                    ?>
                    <div class="filter-box topPromoForm_wrapper gform_wrapper medium">
                        <?php echo do_shortcode(get_field('coache_filter_shortcode', 'option')); ?>

                        <?php
                        $args = array( 'post_type' => 'coaches');
                        ?>
                    </div>
                    <?php while ( is_archive() ? have_posts() : $the_query->have_posts() ) : (is_archive() ? the_post() : $the_query->the_post()); ?>
                        <?php
                            $item_class = '';
                            if( $index < 4 ) {

                                if( $index != 0 ) {
                                    if( $index%3 == 0 ) {
                                        $item_class = 'left';
                                    }
                                }
                                $index++;
                            }else {
                                $index = 0;
                            }

                            if($indexFirst > 4) {
                                $indexFirst = 0;
                                $itemFirst = 'first';
                            }else if($indexFirst == 0){
                                $itemFirst = 'first';
                            }else {
                                $itemFirst = '';
                            }

                            $indexFirst++;

                        ?>
                        <div class="coacheItem <?=$item_class?> <?=$itemFirst?>">
                            <?php
                                $title = get_the_title();
                            ?>
                            <?php if( get_the_post_thumbnail() ): ?>
                                <div class="coacheItemImage">
                                    <?php if( is_archive() ): ?>
                                        <a href="<?=get_permalink()?>">
                                    <?php endif; ?>
                                        <img src="<?=get_the_post_thumbnail_url()?>" alt="<?=$title?>">
                                    <?php if( is_archive() ): ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <div class="coacheItemDescription">
                                <?php if( $title ): ?>
                                    <h2>
                                        <?php if( is_archive() ): ?>
                                            <a href="<?=get_permalink()?>">
                                        <?php endif; ?>
                                            <?=$title?>
                                        <?php if( is_archive() ): ?>
                                            </a>
                                        <?php endif; ?>
                                    </h2>
                                <?php endif; ?>
                                <?php if( is_post_type_archive('coaches') ): ?>
                                    <div class="starRating">
                                        <ul class="starRatingList">
                                            <?php
                                                $post_id = get_the_ID();
                                                $star_index = 0;
                                                $star_rating = 0;

                                                foreach( $results as $item ) {
                                                    if($item->post_id == $post_id) {
                                                        $star_rating += $item->review_rating;
                                                        $star_index++;
                                                    }
                                                }

                                                if( $star_rating != 0 && $star_index != 0 ) {
                                                    $star_rating = $star_rating / $star_index;
                                                }
                                            ?>
                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                <li><i class="fa fa-star <?= ($i > $star_rating ? 'disabled' : '') ?>" aria-hidden="true"></i></li>
                                            <?php endfor; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <p><?=my_content(30, get_the_content());?></p>
                                <?php if( is_archive() && !is_post_type_archive('adviseurs') ): ?>
                                    <a href="<?=get_permalink()?>" class="more"><?=get_field('coaches_archive_more', 'option')?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="centerDiv">
        <div class="innerWrapper">
            <?php custom_paging_nav($wp_query); ?>
        </div>
    </div>
<?php endif; ?>
