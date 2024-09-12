<?php


function enqueue_leaflet_scripts()
{
    wp_enqueue_style('leaflet-css', 'https://unpkg.com/leaflet@1.9.3/dist/leaflet.css');
    wp_enqueue_script('leaflet-js', 'https://unpkg.com/leaflet@1.9.3/dist/leaflet.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_leaflet_scripts');




function agregar_scripts_y_estilos()
{
    // Agregar scripts
    // wp_enqueue_style( 'tailwind', get_template_directory_uri() . '/src/output.css', array() );
    //wp_enqueue_style( 'flowbite', 'https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css', array() );
    wp_enqueue_script('tailwind', 'https://cdn.tailwindcss.com', array());

    wp_enqueue_style('mi-tema-estilos', get_stylesheet_uri());

}

add_action('wp_enqueue_scripts', 'agregar_scripts_y_estilos');



// Si el archivo functions.php no tiene la etiqueta de apertura PHP, añádela
if (!function_exists('mi_tema_setup')) {
    function mi_tema_setup()
    {
        // Añadir soporte para imágenes destacadas
        add_theme_support('post-thumbnails');
    }
}
add_action('after_setup_theme', 'mi_tema_setup');



function custom_search_filter($query)
{
    if ($query->is_search && !is_admin()) {
        if (isset($_GET['cat']) && !empty($_GET['cat'])) {
            $query->set('cat', sanitize_text_field($_GET['cat']));
        }
    }
    return $query;
}
add_filter('pre_get_posts', 'custom_search_filter');


function my_theme_sidebars()
{
    register_sidebar(
        array(
            'name' => 'Noticias Relacionadas',
            'id' => 'related-posts',
            'before_widget' => '<div class="widget related-posts">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));

    register_sidebar(
        array(
            'name' => 'Noticias de la Misma Categoría',
            'id' => 'same-category-posts',
            'before_widget' => '<div class="widget same-category-posts">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));
}
add_action('widgets_init', 'my_theme_sidebars');


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


function custom_pagination($the_query)
{
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
    echo paginate_links(
        array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $the_query->max_num_pages, // Usar $the_query en lugar de $wp_query
            'add_args' => $query_params,
            'prev_text' => __('« Anterior'),
            'next_text' => __('Siguiente »'),
        )
    );
}



function cargar_chartjs()
{
    wp_enqueue_script('chart-js', 'https://cdn.jsdelivr.net/npm/chart.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'cargar_chartjs');



function mostrar_grafico_torta()
{
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
        document.addEventListener('DOMContentLoaded', function () {
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



function mostrar_grafico_polar_area()
{
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
        document.addEventListener('DOMContentLoaded', function () {
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





function custom_login_logo()
{
    ?>
    <style type="text/css">
        #login h1 a,
        .login h1 a {
            background-image: url('https://pitsa.unsl.edu.ar/static/logos/logo_color.png') !important;
            height: 65px !important;
            width: 320px !important;
            background-size: contain !important;
            background-repeat: no-repeat !important;
            padding-bottom: 30px !important;
        }

        .wp-core-ui .button-primary {
            background: #178935 !important;
            border-color: #1b5715 !important;
        }

        body {
            background: #ced7d0 !important;
        }
    </style>
    <?php
}
add_action('login_enqueue_scripts', 'custom_login_logo');

function custom_login_logo_url()
{
    return home_url();
}
add_filter('login_headerurl', 'custom_login_logo_url');

function custom_login_logo_url_title()
{
    return 'PITSA PROGRAMA INSTITUCIONAL TRANSDISCIPLINARIO SOCIOAMBIENTAL';
}
add_filter('login_headertext', 'custom_login_logo_url_title');








function crear_tabla_formulario_personalizado()
{
    global $wpdb;
    $tabla = $wpdb->prefix . 'formulario_personalizado';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $tabla (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        contacto text NOT NULL,
        afectado text NOT NULL,
        fecha_de_comienzo text NOT NULL,
        fecha_puntual date DEFAULT NULL,
        personas_afectadas text NOT NULL,
        latitude decimal(10, 7) DEFAULT NULL,
        longitude decimal(10, 7) DEFAULT NULL,
        linkgoogle text DEFAULT NULL,
        s_afectada text NOT NULL,
        hecho text NOT NULL,
        sucede text NOT NULL,
        repite text NOT NULL,
        frecuencia text DEFAULT NULL,
        denuncias text NOT NULL,
        denuncia_informacion text DEFAULT NULL,
        evidencia longtext DEFAULT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

add_action('after_setup_theme', 'crear_tabla_formulario_personalizado');



function guardar_respuesta_formulario()
{
    if (isset($_POST['action']) && $_POST['action'] === 'guardar_respuesta_formulario') {
        global $wpdb;
        $tabla = $wpdb->prefix . 'formulario_personalizado';

        // Manejo de la evidencia (múltiples archivos)
        if (!empty($_FILES['evidencia']['name'][0])) { // Verificamos el primer archivo
            $uploaded_files = array();
            $file_count = count($_FILES['evidencia']['name']);
            for ($i = 0; $i < $file_count; $i++) {
                if ($_FILES['evidencia']['error'][$i] === UPLOAD_ERR_OK) {
                    $uploadedfile = array(
                        'name' => $_FILES['evidencia']['name'][$i],
                        'type' => $_FILES['evidencia']['type'][$i],
                        'tmp_name' => $_FILES['evidencia']['tmp_name'][$i],
                        'error' => $_FILES['evidencia']['error'][$i],
                        'size' => $_FILES['evidencia']['size'][$i],
                    );
                    $upload_overrides = array('test_form' => false);
                    $movefile = wp_handle_upload($uploadedfile, $upload_overrides);
                    if ($movefile && !isset($movefile['error'])) {
                        $uploaded_files[] = $movefile['url']; // Guardar la URL del archivo
                    }
                }
            }
            $evidencia = serialize($uploaded_files); // Serializar para almacenar en la base de datos
        } else {
            $evidencia = NULL; // o un valor por defecto
        }

        // Manejo de la fecha
        if (isset($_POST['fecha-puntual'])) {
            $fecha_puntual = sanitize_text_field($_POST['fecha-puntual']);
            $date_parts = explode('/', $fecha_puntual);
            if (count($date_parts) == 3) {
                $fecha_puntual = $date_parts[2] . '-' . $date_parts[1] . '-' . $date_parts[0]; // yyyy-mm-dd
            }
        } else {
            $fecha_puntual = NULL;
        }

        // Preparar los datos para insertar
        $data = [
            'contacto' => sanitize_text_field($_POST['contacto']),
            'afectado' => sanitize_text_field($_POST['afectado']),
            'fecha_de_comienzo' => sanitize_text_field($_POST['fecha-de-comienzo']),
            'fecha_puntual' => $fecha_puntual,
            'personas_afectadas' => sanitize_text_field($_POST['personas-afectadas']),
            'latitude' => isset($_POST['latitude']) ? floatval($_POST['latitude']) : null,
            'longitude' => isset($_POST['longitude']) ? floatval($_POST['longitude']) : null,
            'linkgoogle' => sanitize_text_field($_POST['linkgoogle']),
            's_afectada' => sanitize_text_field($_POST['s-afectada']),
            'hecho' => sanitize_text_field($_POST['hecho']),
            'sucede' => sanitize_text_field($_POST['sucede']),
            'repite' => sanitize_text_field($_POST['repite']),
            'frecuencia' => sanitize_text_field($_POST['frecuencia']),
            'denuncias' => sanitize_text_field($_POST['denuncias']),
            'denuncia_informacion' => sanitize_text_field($_POST['denuncia-informacion']),
            'evidencia' => $evidencia // Almacenar la evidencia
        ];

        // Insertar los datos en la base de datos
        $wpdb->insert($tabla, $data);

        // Redirigir a una página de confirmación
        wp_redirect(home_url('/gracias'));
        exit;
    }
}



add_action('admin_post_guardar_respuesta_formulario', 'guardar_respuesta_formulario');
add_action('admin_post_nopriv_guardar_respuesta_formulario', 'guardar_respuesta_formulario');


function formulario_menu_admin()
{
    add_menu_page(
        'Formulario',            // Título de la página
        'Formulario',            // Título del menú
        'manage_options',        // Capacidad requerida
        'formulario',            // Slug del menú
        'mostrar_formulario_admin', // Función que mostrará el contenido
        'dashicons-forms',       // Icono del menú
        6                        // Posición del menú
    );
}
add_action('admin_menu', 'formulario_menu_admin');




function mostrar_formulario_admin()
{
    global $wpdb;
    $tabla = $wpdb->prefix . 'formulario_personalizado'; // Asegúrate de que este sea el nombre de tu tabla
    $resultados = $wpdb->get_results("SELECT * FROM $tabla", ARRAY_A);

    echo '<div class="wrap">';
    echo '<h1>Datos del Formulario</h1>';
    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead><tr>';
    echo '<th>ID</th>';
    echo '<th>Contacto</th>';
    echo '<th>Afectado</th>';
    echo '<th>Fecha de Comienzo</th>';
    echo '<th>Fecha Puntual</th>';
    echo '<th>Personas Afectadas</th>';
    echo '<th>Latitud</th>';
    echo '<th>Longitud</th>';
    echo '<th>Link</th>';
    echo '<th>Superficie afectada</th>';
    echo '<th>Hecho</th>';
    echo '<th>Sucede</th>';
    echo '<th>Repite</th>';
    echo '<th>Frecuencia</th>';
    echo '<th>Denuncias</th>';
    echo '<th>Denuncia información</th>';
    echo '<th>Evidencia</th>';
    echo '<th>Agregado de marcador</th>';
    echo '</tr></thead>';
    echo '<tbody>';

    if ($resultados) {
        foreach ($resultados as $fila) {
            echo '<tr>';
            echo '<td>' . esc_html($fila['id']) . '</td>';
            echo '<td title="' . esc_html($fila['contacto']) . '">' . limitar_texto($fila['contacto'], 20) . '</td>';
            echo '<td title="' . esc_html($fila['afectado']) . '">' . limitar_texto($fila['afectado'], 20) . '</td>';
            echo '<td>' . esc_html($fila['fecha_de_comienzo']) . '</td>';
            echo '<td>' . esc_html($fila['fecha_puntual']) . '</td>';
            echo '<td>' . esc_html($fila['personas_afectadas']) . '</td>';
            echo '<td>' . esc_html($fila['latitude']) . '</td>';
            echo '<td>' . esc_html($fila['longitude']) . '</td>';

            echo '<td>';

            $linkgoogle = esc_html($fila['linkgoogle']);
            
            if (!empty($linkgoogle)) {
                echo '<a target="_blank" href="' . $linkgoogle . '">abrir</a>';
            } else {
                echo 'N/A'; 
            }
            
            echo '</td>';


            echo '<td>' . esc_html($fila['s_afectada']) . '</td>';
            echo '<td>' . esc_html($fila['hecho']) . '</td>';
            echo '<td>' . esc_html($fila['sucede']) . '</td>';
            echo '<td>' . esc_html($fila['repite']) . '</td>';
            echo '<td>' . esc_html($fila['frecuencia']) . '</td>';
            echo '<td>' . esc_html($fila['denuncias']) . '</td>';
            echo '<td title="' . esc_html($fila['denuncia_informacion']) . '">' . limitar_texto($fila['denuncia_informacion'], 20) . '</td>';
            echo '<td>';
            if ($fila['evidencia']) {
                $evidencias = unserialize($fila['evidencia']);
                foreach ($evidencias as $evidencia) {
                    echo '<a href="' . esc_url($evidencia) . '" target="_blank">Ver archivo</a><br>';
                }
            }
            echo '</td>';
            echo '<td><a href="' . esc_url(admin_url('admin.php?page=mapsmarkerpro_marker&lat=' . esc_html($fila['latitude']) . '&lon=' . esc_html($fila['longitude']))) . '" class="button">Ver en Mapa</a></td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="9">No se encontraron datos.</td></tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}

function limitar_texto($texto, $limite) {
    if (strlen($texto) > $limite) {
        return substr($texto, 0, $limite) . '...';
    } else {
        return $texto;
    }
}


// Agregar estilos personalizados en el área de administración
function agregar_estilos_personalizados_admin() {
    wp_enqueue_style('custom-admin-styles', get_template_directory_uri() . '/admin-styles.css');
}
add_action('admin_enqueue_scripts', 'agregar_estilos_personalizados_admin');


function set_coords_from_url() {
    if (isset($_GET['lat']) && isset($_GET['lon'])) {
        $latitude = sanitize_text_field($_GET['lat']);
        $longitude = sanitize_text_field($_GET['lon']);

        echo "<script>
            document.getElementById('lat').value = '{$latitude}';
            document.getElementById('lng').value = '{$longitude}';
        </script>";
    }
}
add_action('admin_footer', 'set_coords_from_url');


?>