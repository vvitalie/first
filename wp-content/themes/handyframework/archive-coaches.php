<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Site Theme
 */

get_header(); ?>
<div class="mainContent coaches">
    <?php include('inc/templates/bottom-promo.php'); ?>
    <?php include('inc/templates/coaches-list.php'); ?>
</div>
<?php get_footer(); ?>
