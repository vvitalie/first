<?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
    );

    $the_query = new WP_Query( $args );
?>
<?php if ( have_posts() ) : ?>
    <div class="newsList">
        <div class="centerDiv">
            <div class="gRow">
                <?php while ( is_archive() ? have_posts() : $the_query->have_posts() ) : (is_archive() ? the_post() : $the_query->the_post()); ?>
                    <div class="newsItem">
                        <div class="boxWhite">
                            <?php
                                $title = get_the_title();
                            ?>
                            <div class="newsItemImage">
                                <?php if( get_the_post_thumbnail() ): ?>
                                    <a href="<?=get_permalink()?>">
                                        <img class="<?=(get_field('news_thumbnail_position') == 'width' ? 'width' : 'height')?>" src="<?=get_the_post_thumbnail_url()?>" alt="<?=$title?>">
                                    </a>
                                <?php else: ?>
                                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                                <?php endif; ?>
                            </div>
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
<?php endif; ?>
