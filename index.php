<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head(); ?>
</head>

<?php
// Detectar si es la página de inicio
$is_home = is_front_page() || is_home();
$body_class = $is_home ? 'home-centered' : 'inner-page';
?>

<body <?php body_class($body_class); ?>>

    <?php if ( $is_home ) : ?>
        <header class="site-header">
            <?php 
            wp_nav_menu( array( 
                'theme_location' => 'header_menu',
                'container'      => false,
                'menu_class'     => 'header-nav-list',
                'fallback_cb'    => false // No mostrar nada si no hay menú asignado
            ) ); 
            ?>
        </header>

        <main class="main-wrapper">
            <div class="logo-wrapper">
                <?php if ( has_custom_logo() ) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <div class="brand-logo-text">
                        <span>C</span><span>a</span><span>t</span><span>i</span><span>c</span>e<span>f</span>acil
                    </div>
                <?php endif; ?>
            </div>

            <div class="search-container">
                <?php echo do_shortcode('[buscar_paginas]'); ?>
            </div>
        </main>

        <footer class="site-footer">
            <div class="footer-location">
                <?php echo esc_html( get_theme_mod('footer_location_text', 'Colombia') ); ?>
            </div>
            <div class="footer-links">
                 <?php 
                wp_nav_menu( array( 
                    'theme_location' => 'footer_menu',
                    'container'      => false,
                    'menu_class'     => 'footer-nav-list',
                    'fallback_cb'    => false
                ) ); 
                ?>
            </div>
        </footer>

    <?php else : ?>
        <div class="results-header">
            <div class="small-logo-wrapper">
                <?php if ( has_custom_logo() ) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo home_url(); ?>" class="small-logo-text">
                        Caticefacil
                    </a>
                <?php endif; ?>
            </div>
            
             <div class="results-search-box">
                <?php echo do_shortcode('[buscar_paginas]'); ?>
             </div>
             
             <div class="results-menu">
                <?php 
                wp_nav_menu( array( 
                    'theme_location' => 'header_menu',
                    'container'      => false,
                    'menu_class'     => 'header-nav-list',
                    'fallback_cb'    => false
                ) ); 
                ?>
             </div>
        </div>

        <main class="main-wrapper">
            <div class="content-area">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        the_content();
                    endwhile;
                endif;
                ?>
            </div>
        </main>

        <footer class="site-footer inner-footer">
             <div class="footer-links">
                 <?php 
                wp_nav_menu( array( 
                    'theme_location' => 'footer_menu',
                    'container'      => false,
                    'menu_class'     => 'footer-nav-list',
                    'fallback_cb'    => false
                ) ); 
                ?>
            </div>
        </footer>

    <?php endif; ?>

    <?php wp_footer(); ?>
</body>
</html>
