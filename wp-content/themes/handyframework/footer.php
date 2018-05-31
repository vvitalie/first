<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Site Theme
 */
?>


<footer class="mainFooter">
    <div class="upperFooter">
        <div class="centerDiv">
            <div class="gRow">
                <!--<img src="/" alt=""/>-->
                <?php
                    $footer_logo = get_field('footer_logo_text', 'option');
                    $social_links = get_field('social_links', 'option');
                ?>
                <?php if( $footer_logo ): ?>
                    <div class="footerLogo">
                        <a href="/"><?=$footer_logo?></a>
                    </div>
                <?php endif; ?>
                <?php if( $social_links ): ?>
                    <div class="socialLinks">
                        <ul>
                            <?php foreach($social_links as $social_item): ?>
                                <li>
                                    <a href="<?=$social_item['link']?>" target="_blank"><i class="fa fa-<?=$social_item['icon']?>" aria-hidden="true"></i></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="footerNav">
                    <?php wp_nav_menu(array("theme_location" => 'footer', 'menu_class' => 'footerMenu', 'container' => '')); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="lowerFooter">
        <div class="centerDiv">
            <div class="gRow">
                <div class="copyright">
                    &copy; <?=date("Y")?> <a href="/"><?=$footer_logo?></a> <?=get_field('footer_disclaimer', 'option')?>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<div id="mobilemenu" class="displayNone"></div>
<?php wp_footer(); ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116079890-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-116079890-1');
</script>
</body>
</html>
