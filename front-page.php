<?php get_header();


?>
<main>
    <section>
        <div class="flex justify-center">
            <div class="max-w-screen-xl">
                <div class="grid md:grid-cols-4 grid-cols-1 py-5 gap-5">
                    <?php
                    // Variables para la paginación
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'post_type' => 'post', // Tipo de post que quieres mostrar
                        'posts_per_page' => 8, // Número de posts por página
                        'paged' => $paged
                    );

                    $the_query = new WP_Query($args);

                    if ($the_query->have_posts()):
                        while ($the_query->have_posts()):
                            $the_query->the_post();

                            $category = get_the_category();
                            ?>
                            <div
                                class="<?php echo sanitize_title($category[0]->name) ?> max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail('full', ['class' => 'rounded-t-lg']);
                                    }
                                    ?>
                                </a>
                                <div class="p-5">
                                    <h2>
                                        <?php
                                        if (!empty($category)) {
                                            echo esc_html($category[0]->name);
                                        }
                                        ?>
                                    </h2>
                                    <a href="<?php the_permalink(); ?>">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                            <?php the_title(); ?>
                                        </h5>
                                    </a>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                        <?php echo wp_trim_words(get_the_content(), 20, '...'); ?>
                                    </p>
                                    <a href="<?php the_permalink(); ?>"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-emerald-700 rounded-lg hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
                                        Ver más
                                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <?php
                        endwhile;

                        // Mostrar paginación después de los posts
                    

                        wp_reset_postdata(); // Restablecer datos de la consulta
                    else:
                        echo '<p>Lo sentimos, no hay contenido que mostrar.</p>';
                    endif;
                    ?>
                </div>
                <?php
                echo '<div class="pagination">';
                custom_pagination(); // Llama a la función de paginación personalizada
                echo '</div>';

                ?>
            </div>
        </div>
    </section>
</main>




<?php

get_footer();


?>