<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Buscador inteligente de servicios Caticefacil.">
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
            <?php if(has_nav_menu('primary')) { wp_nav_menu(array('theme_location'=>'primary')); } ?>
             <a href="#">Gmail</a>
            <a href="#">Imágenes</a>
        </header>

        <main class="main-wrapper">
            <div class="brand-logo">
                <span>C</span><span>a</span><span>t</span><span>i</span><span>c</span>e<span>f</span>acit
            </div>

            <div class="search-container">
                <?php echo do_shortcode('[buscar_paginas]'); ?>
            </div>
        </main>

        <footer class="site-footer">
            <p>Colombia</p>
        </footer>

    <?php else : ?>
        <div class="results-header">
            <a href="<?php echo home_url(); ?>" class="small-logo">
                <span style="color:#4285f4">C</span><span style="color:#ea4335">a</span><span style="color:#fbbc05">t</span><span style="color:#4285f4">i</span><span style="color:#34a853">c</span><span style="color:#ea4335">e</span>
            </a>
            <div style="flex-grow:1; max-width: 600px;">
                <?php echo do_shortcode('[buscar_paginas]'); ?>
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

    <?php endif; ?>

    <?php wp_footer(); ?>
</body>
</html>
