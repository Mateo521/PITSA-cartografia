<?php
function agregar_scripts_y_estilos() {
    // Agregar scripts
    wp_enqueue_style( 'tailwind', get_template_directory_uri() . '/src/output.css', array() );
    wp_enqueue_style('mi-tema-estilos', get_stylesheet_uri());
 
}

add_action('wp_enqueue_scripts', 'agregar_scripts_y_estilos');



// Si el archivo functions.php no tiene la etiqueta de apertura PHP, añádela
if ( ! function_exists( 'mi_tema_setup' ) ) {
    function mi_tema_setup() {
        // Añadir soporte para imágenes destacadas
        add_theme_support( 'post-thumbnails' );
    }
}
add_action( 'after_setup_theme', 'mi_tema_setup' );





function my_theme_sidebars() {
    register_sidebar( array(
        'name'          => 'Noticias Relacionadas',
        'id'            => 'related-posts',
        'before_widget' => '<div class="widget related-posts">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => 'Noticias de la Misma Categoría',
        'id'            => 'same-category-posts',
        'before_widget' => '<div class="widget same-category-posts">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'my_theme_sidebars' );


/*

// Función para habilitar la paginación en tipos de post
function custom_pagination() {
    global $wp_query;

    $big = 999999999; // Número muy grande, necesitas un número grande para asegurar que el paginador se genere adecuadamente.

    echo paginate_links( array(
        'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format'  => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total'   => $wp_query->max_num_pages
    ) );
}
*/


function custom_pagination($numpages = '', $pagerange = '', $paged='') {

    if (empty($pagerange)) {
      $pagerange = 2;
    }
    global $paged;
    if (empty($paged)) {
      $paged = 1;
    }
    if ($numpages == '') {
      global $wp_query;
      $numpages = $wp_query->max_num_pages;
      if(!$numpages) {
          $numpages = 1;
      }
    }
  
    $pagination_args = array(
      'base'            => get_pagenum_link(1) . '%_%',
      'format'          => 'page/%#%',
      'total'           => $numpages,
      'current'         => $paged,
      'show_all'        => False,
      'end_size'        => 1,
      'mid_size'        => $pagerange,
      'prev_next'       => True,
      'prev_text'       => __('«'),
      'next_text'       => __('»'),
      'type'            => 'array',
      'add_args'        => false,
      'add_fragment'    => ''
    );
  
   $paginate_links = paginate_links($pagination_args);
  
   if (is_array($paginate_links)) {
     echo "<div class='cpagination'>";
     echo "<span class='page-numbers page-num'>Página " . $paged . " de " . $numpages . "</span> ";
     echo '<ul class="pagination">';
     foreach ( $paginate_links as $page ) {
       echo "<li>$page</li>";
     }
     echo '</ul>';
     echo "</div>";
   }
}

?>
