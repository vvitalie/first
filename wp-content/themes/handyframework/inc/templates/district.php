<?php
    $district_status = get_field('district_status');
    $district_title = get_field('district_title');
    $district_description = get_field('district_description');
    $district_image = get_field('district_image');
    $district_button_status = get_field('district_button_status');
    $district_button_text = get_field('district_button_text');
    $district_button_link = get_field('district_button_link');
?>
<?php if( $district_status == 'show' ): ?>
    <div class="districtMap">
        <div class="centerDiv">
            <div class="gRow">
                <div class="districtMapCol districtMapImage">
                    <img class="districtMapImage" src="<?=$district_image['url'];?>" alt="<?=$district_image['alt']?>">
                </div>
                <div class="districtMapCol districtMapDescription contentBox">
                    <?php if( $district_title ): ?>
                        <h2>
                            <a href="<?=$district_button_link?>">
                                <?=$district_title?>
                            </a>
                        </h2>
                    <?php endif; ?>
                    <?php if( $district_description ): ?>
                        <?=$district_description?>
                    <?php endif; ?>
                    <?php if( $district_button_status == 'show' ): ?>
                        <a class="button" href="<?=$district_button_link?>"><?=$district_button_text?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
