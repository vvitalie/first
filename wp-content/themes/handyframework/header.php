<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Site Theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php
    $favicon = get_field('site_favicon', 'option');
    if ($favicon) {
        $fav_url = $favicon['url'];
    } else {
        $fav_url = get_stylesheet_directory_uri() . "/favicons.png";
    }
    ?>
    <link rel="shortcut icon" href="<?php echo $fav_url; ?>"/>
    <link href="https://fonts.googleapis.com/css?family=Chathura|Open+Sans" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="//ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
    <![endif]-->
    <!--[if IE]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <style>
        <?php
            include (TEMPLATEPATH . '/js/js_libraries/mmenu/jquery.mmenu.all.css' );
            include (TEMPLATEPATH . '/style.css' );
            include (TEMPLATEPATH . '/main.css' );
        ?>
    </style>

    <?php wp_head(); ?>
</head>


<body <?php body_class(b4uUseSidebar()); ?> data-sidebar="<?php b4uUseSidebar(); ?>" data-test="hello">
<?php if( !function_exists('get_field') ):?>
    <h1>Advanced custom field disable or was deleted. You need enable or install ACF.</h1>
    <?php die(); ?>
<?php endif; ?>
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
    <div class="mainContainer">
        <header class="mainHeader">
            <div class="mainHeaderFix">
                <div class="centerDiv">
                    <div class="gRow">
                        <div class="siteLogo">
                            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                                <?php
                                    $site_logo_text = get_field('site_logo_text', 'option');
                                    $site_logo = get_field('site_logo', 'option');
                                    if (!$site_logo) {
                                        $img_src = get_template_directory_uri() . "/images/jouw-logo-placeholder.jpg";
                                    }else {
                                        $img_src = $site_logo['url'];
                                    }
                                ?>
                                <img src="<?=$img_src?>" alt="<?php bloginfo('name'); ?>"/>
                                <?php if( $site_logo_text ): ?>
                                    <span class="logoTitle"><?=$site_logo_text?></span>
                                <?php endif; ?>
                            </a>
                        </div>
                        <?php
                        $header_question_text = get_field('header_question_text', 'option');
                        $header_question_link =  get_field('header_question_link', 'option');
                        ?>
                        <?php if( $header_question_text && $header_question_link ): ?>
                            <div class="headerQuestion">
                                <a href="<?=$header_question_link?>" class="button"><?=$header_question_text?></a>
                            </div>
                        <?php endif; ?>
                        <div class="mobileLink">
                            <a class="c-hamburger c-hamburger-sm c-hamburger--htx" href="#mobilemenu" title="Menu">
                                <span>toggle menu</span>
                            </a>
                        </div>
                        <nav class="mainMenu">
                            <?php wp_nav_menu(array("theme_location" => 'primary', 'menu_class' => '', 'container' => '')); ?>
                        </nav>
                    </div>
                </div>
            </div>
        </header>