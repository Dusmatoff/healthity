<?php
    /**
     * The header for our theme
     *
     * This is the template that displays all of the <head> section and everything up until <div id="content">
     *
     * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
     *
     * @package healthity
     */
    
    ?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
        <link rel="shortcut icon" href="<?php bloginfo("template_directory"); ?>/img/favicon.ico" />
        <link href="<?php bloginfo("template_directory"); ?>/css/style-top.css" rel="stylesheet" type="text/css" />
        <?php if( is_404() ): ?>
        <title>HEALTHITY :: Not found</title>
        <?php else: ?>
        <title><?php echo the_title(); ?></title>
        <?php endif; ?>
        <?php wp_head(); ?>
    </head>
    <body>
        <!-- LOADER -->
        <div id="loader-wrapper"></div>
        <!-- CONTENT -->
        <div id="content-hidden" class="left-margin sticky-parent pos-static">
        <?php if( is_404() ): ?>
        <!-- 404 PAGE DECOR -->
        <div class="page-decor notfound-page-decor">
            <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/not-found-decor-1.png"></div>
            <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/not-found-decor-2.png"></div>
            <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/not-found-decor-3.png"></div>
            <div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/not-found-decor-4.png"></div>
        </div>
        <?php endif; ?>
        <?php if( is_page_template('blog-page.php') ): ?>
        <!-- NEWS PAGE DECOR -->
        <div class="page-decor news-page-decor">
			<div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/news-decor-1.png"></div>
			<div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/news-decor-2.png"></div>
			<div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/news-decor-3.png"></div>
		</div>
        <?php endif; ?>
        <?php if(basename(get_page_template()) === 'page.php' && !is_woocommerce() && !is_checkout() && !is_account_page() && !is_front_page() ): ?>
        <!-- SIMPLE PAGE DECOR -->
        <div class="page-decor simple-page-decor">
			<div class="bg bg-lazy-load" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/main-slider-decor.png"></div>
		</div>
        <?php endif; ?>
        <!-- HEADER -->
        <header class="sticky-item">
            <div class="header-inner">
                <div class="layer-close"></div>
                <div class="top-mobile-menu">
                    <?php 
                    $logo = get_field('logo', 'option');
                    if( $logo ): ?>
                    <div id="logo"><a href="<?php echo get_site_url(); ?>"><img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>"></a></div>
                    <?php endif; ?>
                    <div class="top-header">
                        <div class="bg bg-lazy-load bg-header" style="background-image: url(<?php bloginfo("template_directory"); ?>/img/placeholder.jpg);" data-bg="<?php bloginfo("template_directory"); ?>/img/bg-header.jpg"></div>
                        <div class="container">
                            <div class="right-menu">
                                <div class="search-block header-icon">
                                    <span class="icon open-search-form">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512">
                                            <g>
                                                <path d="M495,466.2L377.2,348.4c29.2-35.6,46.8-81.2,46.8-130.9C424,103.5,331.5,11,217.5,11C103.4,11,11,103.5,11,217.5   S103.4,424,217.5,424c49.7,0,95.2-17.5,130.8-46.7L466.1,495c8,8,20.9,8,28.9,0C503,487.1,503,474.1,495,466.2z M217.5,382.9   C126.2,382.9,52,308.7,52,217.5S126.2,52,217.5,52C308.7,52,383,126.3,383,217.5S308.7,382.9,217.5,382.9z"/>
                                            </g>
                                        </svg>
                                    </span>
                                    <?php get_search_form(); ?>
                                </div>
                                <div class="cabinet-block header-icon open-popup" data-rel="<?php echo is_user_logged_in() ? '8' : '3'; ?>">
                                    <span class="icon">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" 	 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M437.02,330.98c-27.883-27.882-61.071-48.523-97.281-61.018C378.521,243.251,404,198.548,404,148 			C404,66.393,337.607,0,256,0S108,66.393,108,148c0,50.548,25.479,95.251,64.262,121.962 			c-36.21,12.495-69.398,33.136-97.281,61.018C26.629,379.333,0,443.62,0,512h40c0-119.103,96.897-216,216-216s216,96.897,216,216 			h40C512,443.62,485.371,379.333,437.02,330.98z M256,256c-59.551,0-108-48.448-108-108S196.449,40,256,40 			c59.551,0,108,48.448,108,108S315.551,256,256,256z"/>
                                                </g>
                                            </g>
                                            <g> </g>
                                            <g> </g>
                                            <g> </g>
                                            <g> </g>
                                            <g> </g>
                                            <g> </g>
                                            <g> </g>
                                            <g> </g>
                                            <g> </g>
                                            <g> </g>
                                            <g> </g>
                                            <g> </g>
                                            <g> </g>
                                            <g> </g>
                                            <g> </g>
                                        </svg>
                                    </span>
                                </div>
                                <div class="header-cart-block contains-products open-popup" data-rel="1">
                                    <?php healthity_woocommerce_cart_link(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-button"><span></span></div>
                </div>
                <div class="toggle-block">
                    <div class="left-menu">
                        <div class="middle-content">
                            <nav>
                                <?php wp_nav_menu( [ 
		                            'theme_location'  => 'menu-1'
	                            ] ); ?>
                            </nav>
                        </div>
                        <div class="language-block">
                            <div class="lang-item active">Eng</div>
                            <div class="lang-item">Slo</div>
                            <div class="lang-item">Рус</div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="margin-header"></div>