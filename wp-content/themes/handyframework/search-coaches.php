<?php
    get_header();
    global $wpdb;
    $results = $wpdb->get_results( 'SELECT review_rating, post_id FROM wp_richreviews', OBJECT );
?>
<div class="mainContent coaches">
    <?php include('inc/templates/bottom-promo.php'); ?>
    <div class="coachesList">
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
                    </div>
                    <div class="coachesList">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
                                <?php if( get_the_post_thumbnail() ): ?>
                                    <?php
                                        $title = get_the_title();
                                    ?>
                                    <div class="coacheItemImage">
                                        <a href="<?=get_permalink()?>">
                                            <img src="<?=get_the_post_thumbnail_url()?>" alt="<?=$title?>">
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="coacheItemDescription">
                                    <?php if( $title ): ?>
                                        <h2>
                                            <a href="<?=get_permalink()?>">
                                                <?=$title?>
                                            </a>
                                        </h2>
                                    <?php endif; ?>
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
                                    <p><?=my_content(30, get_the_content());?></p>
                                    <a href="<?=get_permalink()?>" class="more"><?=get_field('coaches_archive_more', 'option')?></a>
                                </div>
                            </div>
                        <?php endwhile; endif; ?>
                    </div>
                    <?php custom_paging_nav($wp_query); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
