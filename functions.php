<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function catice_setup() {
    // Permite que WordPress gestione la etiqueta <title> (Vital para SEO)
    add_theme_support( 'title-tag' );
    
    // Habilita imágenes destacadas
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'catice_setup' );

function catice_scripts() {
    // Carga el estilo principal
    wp_enqueue_style( 'catice-style', get_stylesheet_uri(), array(), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'catice_scripts' );

// Limpieza de header para velocidad (SEO técnico)
remove_action('wp_head', 'wp_generator'); // Oculta versión de WP
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
