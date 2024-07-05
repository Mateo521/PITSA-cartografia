<?php
function agregar_scripts_y_estilos() {
    // Agregar scripts
    wp_enqueue_style( 'tailwind', get_template_directory_uri() . '/src/output.css', array() );
    wp_enqueue_style('mi-tema-estilos', get_stylesheet_uri());
 
}

add_action('wp_enqueue_scripts', 'agregar_scripts_y_estilos');

