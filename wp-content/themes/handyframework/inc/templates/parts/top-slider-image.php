<div class="headerImage">

    <?php
    if (get_field('header_afbeelding_optie') == 'slider') { ?>

        <?php if (have_rows('header_slider')): ?>
            <div class="pageSlider owl-carousel">
                <?php while (have_rows('header_slider')): the_row();
                    $sliderImage = get_sub_field('afbeelding');
                    ?>
                    <div class="sliderImage">
                        <img src="<?php echo $sliderImage['url']; ?>" alt="<?php the_sub_field('titel'); ?>">
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    <?php } else if (get_field('header_afbeelding_optie') == 'afbeelding') { ?>
        <?php $pageImage = get_field('header_afbeelding', get_the_ID());

        if ($pageImage) { ?>
            <div class="pageImage">
                <img src="<?php echo $pageImage['url']; ?>" alt="<?php the_title(); ?>">
            </div>

        <?php } else {

            $defaultImage = get_field('standaard_header_afbeelding', 'option');
            ?>
            <div class="pageImage">
                <img src="<?php echo $defaultImage['url']; ?>" alt="<?php the_title(); ?>">
            </div>
        <?php } ?>

    <?php } else { ?>
        <?php $defaultImage = get_field('standaard_header_afbeelding', 'option'); ?>
        <div class="pageImage">
            <img src="<?php echo $defaultImage['url']; ?>" alt="<?php the_title(); ?>">
        </div>
    <?php } ?>
</div>