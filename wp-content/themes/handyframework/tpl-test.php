<?php
/**
 * Template Name TEst pagina
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Site Theme
 */

get_header(); ?>

<div class="mainContent">
	<?php include('inc/templates/top-promo.php'); ?>
	<div class="centerDiv">
		<div class="contactsPage">
			<div class="gRow">
				<div class="leftContent test span-12">
					<?php echo do_shortcode('[searchandfilter id="1798"]'); ?>
                    <?php

					$fields = acf_get_fields(504);
					//var_dump($fields);
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
