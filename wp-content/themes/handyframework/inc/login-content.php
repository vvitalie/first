<?php
ob_start(); ?>
<div class="loginContentLeft">
<?php $country = get_field('credits', 'options');
$has_im = get_field('has_internet_marketing', 'options');
$img_cms = '<img src="'.get_template_directory_uri().'/images/Logo_Best4u_cms.png" alt="Best4u cms">';
$img_im = '<img src="'.get_template_directory_uri().'/images/Logo_Best4u_im_2.png" alt="Best4u internet marketing">';
?>
    <div class="lContent">
        <div class="lCms">
            <?php if($country == 'nl'):
                echo $img_cms;
                the_field('nl_cms', 'options');  ?>
            <?php elseif($country == 'be'):
                echo $img_cms;
                the_field('be_cms', 'options');  ?>
            <?php endif; ?>
        </div>
        <div class="lIm">
            <?php if($country == 'nl' && $has_im == 'yes'):
                echo $img_im;
                the_field('nl_im', 'options');  ?>
            <?php elseif($country == 'be' && $has_im == 'yes'):
                echo $img_im;
                the_field('be_im', 'options');  ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $content = ob_get_contents();
ob_clean();

echo $content;