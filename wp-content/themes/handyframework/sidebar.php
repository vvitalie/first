<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Site Theme
 */

if ( get_field('activeer_sidebar') == 'option2' ) {
	return;
} 
?>
<div class="rightContent widget-area span-4 span-last" role="complementary">
    <div class="boxWhite contentBox custom">
	    <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
</div><!--rightContent-->







