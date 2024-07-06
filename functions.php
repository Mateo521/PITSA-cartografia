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



function custom_search_filter($query) {
  if ($query->is_search && !is_admin()) {
      if (isset($_GET['cat']) && !empty($_GET['cat'])) {
          $query->set('cat', sanitize_text_field($_GET['cat']));
      }
  }
  return $query;
}
add_filter('pre_get_posts', 'custom_search_filter');


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


function custom_pagination() {
  global $wp_query;
  $big = 999999999; // Necesario para la paginación de WordPress

  // Capturar los parámetros de búsqueda y categoría
  $query_params = [];
  if (!empty(get_search_query())) {
      $query_params['s'] = get_search_query();
  }
  if (!empty(get_query_var('cat'))) {
      $query_params['cat'] = get_query_var('cat');
  }

  // Generar enlaces de paginación con parámetros adicionales
  echo paginate_links(array(
      'base'    => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
      'format'  => '?paged=%#%',
      'current' => max(1, get_query_var('paged')),
      'total'   => $wp_query->max_num_pages,
      'add_args' => $query_params,
      'prev_text' => __('« Anterior'),
      'next_text' => __('Siguiente »'),
  ));
}


function cargar_chartjs() {
  wp_enqueue_script('chart-js', 'https://cdn.jsdelivr.net/npm/chart.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'cargar_chartjs');



function mostrar_grafico_torta() {
  $categories = get_categories();
  $data = [];
  foreach ($categories as $category) {
      $data[] = [
          'label' => $category->name,
          'count' => $category->count,
      ];
  }

  ob_start(); ?>

  <canvas id="graficoTorta"></canvas>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
      var ctx = document.getElementById('graficoTorta').getContext('2d');
      var data = {
          labels: <?php echo json_encode(wp_list_pluck($data, 'label')); ?>,
          datasets: [{
              data: <?php echo json_encode(wp_list_pluck($data, 'count')); ?>,
              backgroundColor: [
                  '#FF6384',
                  '#36A2EB',
                  '#FFCE56',
                  '#4BC0C0',
                  '#9966FF',
                  '#FF9F40'
              ]
          }]
      };
      new Chart(ctx, {
          type: 'pie',
          data: data
      });
  });
  </script>

  <?php return ob_get_clean();
}
add_shortcode('grafico_torta', 'mostrar_grafico_torta');



function mostrar_grafico_polar_area() {
  $categories = get_categories();
  $data = [];
  foreach ($categories as $category) {
      $data[] = [
          'label' => $category->name,
          'count' => $category->count,
      ];
  }

  ob_start(); ?>

  <canvas id="graficoPolarArea"></canvas>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
      var ctx = document.getElementById('graficoPolarArea').getContext('2d');
      var data = {
          labels: <?php echo json_encode(wp_list_pluck($data, 'label')); ?>,
          datasets: [{
              data: <?php echo json_encode(wp_list_pluck($data, 'count')); ?>,
              backgroundColor: [
                  '#FF6384',
                  '#36A2EB',
                  '#FFCE56',
                  '#4BC0C0',
                  '#9966FF',
                  '#FF9F40',
                  '#C9CBCF',
                  '#9AD0F5',
                  '#E3A7A1',
                  '#FFEA61'
              ]
          }]
      };
      new Chart(ctx, {
          type: 'polarArea',
          data: data
      });
  });
  </script>

  <?php return ob_get_clean();
}
add_shortcode('grafico_polar_area', 'mostrar_grafico_polar_area');



?>
