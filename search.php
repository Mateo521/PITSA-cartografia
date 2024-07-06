<?php get_header(); ?>

<main>
    <section>
        <div class="flex justify-center">
            <div class="max-w-screen-xl">
                <header class="page-header">
                    <h1 class="page-title">
                        <?php printf(esc_html__('Resultados de búsqueda para: %s', 'your-theme-textdomain'), '<span>' . get_search_query() . '</span>'); ?>
                    </h1>
                </header><!-- .page-header -->
                
                <div class="grid md:grid-cols-4 grid-cols-1 py-5 gap-5">
                    <?php if (have_posts()): ?>
                        <?php while (have_posts()): the_post(); 
                            $category = get_the_category(); 
                            ?>
                            <div class="<?php echo !empty($category) ? sanitize_title($category[0]->name) : 'uncategorized'; ?> max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()): 
                                        the_post_thumbnail('full', ['class' => 'rounded-t-lg']); 
                                    endif; ?>
                                </a>
                                <div class="p-5">
                                    <h2>
                                        <?php if (!empty($category)): 
                                            echo esc_html($category[0]->name); 
                                        endif; ?>
                                    </h2>
                                    <a href="<?php the_permalink(); ?>">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                            <?php the_title(); ?>
                                        </h5>
                                    </a>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                        <?php echo wp_trim_words(get_the_content(), 20, '...'); ?>
                                    </p>
                                    <a href="<?php the_permalink(); ?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-emerald-700 rounded-lg hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
                                        Ver más
                                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        
                       
                    <?php else: ?>
                        <p>Lo sentimos, no hay contenido que mostrar.</p>
                    <?php endif; ?>
                </div>
                <?php
                        // Mostrar paginación después de los posts
                        echo '<div class="pagination">';
                        custom_pagination(); // Llama a la función de paginación personalizada
                        echo '</div>';
                        ?>
                        
                        <?php wp_reset_postdata(); // Restablecer datos de la consulta ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
