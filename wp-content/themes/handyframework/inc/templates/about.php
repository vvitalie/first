<?php
    $about_status = get_field('about_status');
    $about_title = get_field('about_title');
    $about_description = get_field('about_description');
    $about_image = get_field('about_image');
    $about_button_status = get_field('about_button_status');
    $about_button_text = get_field('about_button_text');
    $about_button_link = get_field('about_link');
?>
<?php if( $about_status == 'show' ): ?>
    <div class="aboutProject">
        <div class="centerDiv">
            <div class="gRow">
                <div class="aboutProjectCol aboutProjectDescription contentBox">
                    <?php if( $about_title ): ?>
                        <h1>
                            <a href="<?=$about_button_link?>">
                                <?=$about_title?>
                            </a>
                        </h1>
                    <?php endif; ?>
                    <?php if( $about_description ): ?>
                        <?=$about_description?>
                    <?php endif; ?>
                    <?php if( $about_button_status == 'show' ): ?>
                        <a class="button" href="<?=$about_button_link?>"><?=$about_button_text?></a>
                    <?php endif; ?>

<a class="button" target="_BLANK" href="https://youtu.be/2gs2linnGpE">Bekijk hier de IkStartSmart-video</a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
