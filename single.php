<?php get_header(); ?>
<main class="flex justify-center">
    <div class="max-w-screen-xl">
        <div class="grid" style="grid-template-columns:1fr 30%;">
            <?php
            if (have_posts()):
                while (have_posts()):
                    the_post();
                    ?>
                    <article class="bg-white shadow-md p-5 rounded-lg my-5" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                            <div class="entry-meta">
                                <?php
                                echo 'Publicado el: ' . get_the_date();
                                echo ' | Categorías: ';
                                the_category(', ');
                                ?>
                            </div>
                        </header>

                        <?php if (has_post_thumbnail()): ?>
                            <div class="post-thumbnail w-full">
                                <?php the_post_thumbnail('full'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>

                        <footer class="entry-footer">
                            <?php the_tags('Etiquetas: ', ', ', '<br>'); ?>
                        </footer>
                    </article>
                    <?php
                endwhile;
            else:
                _e('Lo sentimos, no hay contenido que mostrar.', 'textdomain');
            endif;
            ?>


            <!-- Sidebar de noticias relacionadas -->
            <aside class="w-full p-4">
                <div id="related-posts" class="widget-area">
                    <h2 class="widget-title py-2 text-xl text-center font-bold">Noticias Relacionadas</h2>
                    <ul class="flex flex-col gap-5">
                        <?php
                        global $post;
                        $related_posts = get_posts(
                            array(
                                'category__in' => wp_get_post_categories($post->ID),
                                'numberposts' => 5,
                                'post__not_in' => array($post->ID)
                            )
                        );

                        if ($related_posts) {
                            foreach ($related_posts as $related_post) {

                                ?>

                                <div
                                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">


                                    <?php

                                    if (has_post_thumbnail($related_post->ID)) {



                                        ?>
                                        <a href="<?php get_permalink($related_post->ID); ?>">
                                            <img class="rounded-t-lg w-full max-h-36 object-cover"
                                                src="<?php echo esc_url(get_the_post_thumbnail_url($related_post->ID, 'thumbnail')); ?>"
                                                alt="" />
                                        </a>

                                        <?php
                                    }

                                    ?>

                                    <div class="p-5">
                                        <a href="<?php echo get_permalink($related_post->ID) ?>">
                                            <p class="mb-2 text-base font-bold tracking-tight text-gray-900 dark:text-white">
                                                <?php echo $related_post->post_title ?></p>
                                        </a>
                                        <!--p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p-->
                                        <a href="<?php echo get_permalink($related_post->ID) ?>"
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
                            }




                        } else {
                            echo '<li>No hay noticias relacionadas.</li>';
                        }
                        ?>
                    </ul>

                </div>
            </aside>


            <!-- Sección de noticias de la misma categoría -->
            <!--div class="w-full p-4">
                <div id="same-category-posts" class="widget-area">
                    <h2 class="widget-title">Noticias de la Misma Categoría</h2>

                    <div class="grid grid-cols-2">


                        <?php
                        $same_category_posts = get_posts(
                            array(
                                'category__in' => wp_get_post_categories($post->ID),
                                'numberposts' => 5,
                                'post__not_in' => array($post->ID)
                            )
                        );

                        if ($same_category_posts) {
                            foreach ($same_category_posts as $same_category_post) {



                                ?>



                                <div
                                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                    <a href="#">
                                        <img class="rounded-t-lg rounded-t-lg w-full max-h-36 object-cover"
                                            src="<?php echo esc_url(get_the_post_thumbnail_url($related_post->ID, 'thumbnail')); ?>"
                                            alt="" />
                                    </a>
                                    <div class="p-5">
                                        <a href="<?php echo get_permalink($same_category_post->ID) ?>">
                                            <h5 class="mb-2 text-base font-bold tracking-tight text-gray-900 dark:text-white">
                                                <?php echo $same_category_post->post_title ?></h5>
                                        </a>
                                          <a href="#"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-emerald-700 rounded-lg hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
                                            Read more
                                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>


                                <?php

                            }
                        } else {
                            echo '<li>No hay noticias en esta categoría.</li>';
                        }
                        ?>




                    </div-->
                </div>
            </div>
        </div>
    </div>


</main>


<?php get_footer(); ?>



<style>
    .attachment-thumbnail {
        width: 100%;
        object-fit: cover;
        border-radius: 10px;
        max-height: 150px;
    }

    .post-thumbnail img {
        width: 100%;
        border-radius: 10px;
        height: auto;
    }

    .post-thumbnail {

        margin-bottom: 20px;
    }

    .entry-header {
        margin-bottom: 20px;
    }

    .entry-title {
        font-size: 2em;
        margin-bottom: 10px;
    }

    .entry-meta {
        font-size: 0.9em;
        color: #888;
    }

    .entry-content {
        margin-top: 20px;
    }

    .entry-footer {
        margin-top: 20px;
        font-size: 0.9em;
        color: #888;
    }
</style>