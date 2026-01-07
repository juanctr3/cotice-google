<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function catice_setup() {
    // 1. Permite subir un Logo desde Apariencia > Personalizar > Identidad del sitio
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );

    // 2. Permite que WordPress gestione la etiqueta <title>
    add_theme_support( 'title-tag' );
    
    // 3. Habilita imágenes destacadas
    add_theme_support( 'post-thumbnails' );

    // 4. Registrar zonas de Menús
    register_nav_menus( array(
        'header_menu' => 'Menú Superior Derecha (Gmail, Imágenes...)',
        'footer_menu' => 'Menú del Footer (Privacidad, Condiciones...)'
    ) );
}
add_action( 'after_setup_theme', 'catice_setup' );

function catice_scripts() {
    wp_enqueue_style( 'catice-style', get_stylesheet_uri(), array(), '2.0' );
}
add_action( 'wp_enqueue_scripts', 'catice_scripts' );

// Añadir opción en el Personalizador para el texto del Footer (ej: Colombia)
function catice_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'catice_options', array(
        'title'    => 'Opciones del Buscador',
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'footer_location_text', array(
        'default'   => 'Colombia',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'footer_location_text', array(
        'label'    => 'Texto de Ubicación (Footer)',
        'section'  => 'catice_options',
        'type'     => 'text',
    ) );
}
add_action( 'customize_register', 'catice_customize_register' );

// Limpieza de header
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
