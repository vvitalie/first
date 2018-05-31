<?php
    $important_status = get_field('important_points_status');
    $important_list = get_field('important_points_list');
?>
<?php if( $important_status == 'show' ): ?>
    <?php if( $important_list ): ?>
        <div class="importantPoints">
            <div class="importantPointsCenter">
                <ul class="importantPointsList">
                    <?php foreach( $important_list as $item ): ?>
                        <li>
                            <i class="fa fa-check" aria-hidden="true"></i>
                            <?=$item['title']?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
