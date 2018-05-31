<?php
    $column_status = get_field('column_content_status');
?>
<?php if( $column_status == 'show' ): ?>
    <div class="columnContent">
        <div class="centerDiv">
            <div class="gRow">
                <?php
                    $column_type = get_field('column_content_type')
                ?>
                <?php foreach( $column_type as $item ): ?>
                    <?php if( $item['acf_fc_layout'] == 'two_columns' ): ?>
                        <div class="columnContent6">
                            <div class="boxWhite contentBox">
                                <?=$item['content_left']?>
                                <?php if( $item['content_left_button_status'] == 'show' ): ?>
                                    <a href="<?=$item['content_left_button_link']?>" class="button"><?=$item['content_left_button_text']?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="columnContent6">
                            <div class="boxWhite contentBox">
                                <?=$item['content_right']?>
                                <?php if( $item['content_right_button_status'] == 'show' ): ?>
                                    <a href="<?=$item['content_right_button_link']?>" class="button"><?=$item['content_right_button_text']?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if( $item['acf_fc_layout'] == 'one_column' ): ?>
                        <div class="columnContent8">
                            <div class="boxWhite contentBox <?=$item['content_custom_class']?>">
                                <?=$item['content']?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
