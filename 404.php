<?php get_header(); ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <style>
        /* Estilos específicos para error 404 */
        body { font-family: arial, sans-serif; text-align: center; display: flex; flex-direction: column; justify-content: center; height: 100vh; margin: 0; color: #202124; }
        .error-code { font-size: 100px; font-weight: bold; color: #ea4335; margin: 0; }
        .error-msg { font-size: 24px; margin-bottom: 30px; }
        .back-btn { background: #f8f9fa; border: 1px solid #f8f9fa; border-radius: 4px; color: #3c4043; padding: 10px 24px; text-decoration: none; font-size: 14px; }
        .back-btn:hover { background-color: #f1f3f4; border-color: #f1f3f4; text-decoration: none; }
    </style>
</head>
<body>

    <div class="main-wrapper">
        <div style="margin-bottom: 20px;">
            <span style="color:#4285f4; font-size: 24px; font-weight:bold;">C</span>
            <span style="color:#ea4335; font-size: 24px; font-weight:bold;">a</span>
            <span style="color:#fbbc05; font-size: 24px; font-weight:bold;">t</span>
            <span style="color:#4285f4; font-size: 24px; font-weight:bold;">i</span>
            <span style="color:#34a853; font-size: 24px; font-weight:bold;">c</span>
            <span style="color:#ea4335; font-size: 24px; font-weight:bold;">e</span>
        </div>

        <h1 class="error-code">404</h1>
        <p class="error-msg">Parece que esta página no existe.</p>
        
        <a href="<?php echo home_url(); ?>" class="back-btn">Volver al inicio</a>
    </div>

    <?php wp_footer(); ?>
</body>
</html>
