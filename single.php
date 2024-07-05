<?php get_header(); ?>
<main class="flex justify-center">
    <div class="max-w-screen-xl">
        <div class="grid" style="grid-template-columns:1fr 200px;">
            <?php
            if (have_posts()):
                while (have_posts()):
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
            <aside class="w-full lg:w-1/4 p-4">
                <div id="related-posts" class="widget-area">
                    <h2 class="widget-title">Noticias Relacionadas</h2>
                    <ul>
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
                                echo '<li><a href="' . get_permalink($related_post->ID) . '">' . $related_post->post_title . '</a></li>';
                            }
                        } else {
                            echo '<li>No hay noticias relacionadas.</li>';
                        }
                        ?>
                    </ul>
                </div>
            </aside>


            <!-- Sección de noticias de la misma categoría -->
            <div class="w-full p-4">
                <div id="same-category-posts" class="widget-area">
                    <h2 class="widget-title">Noticias de la Misma Categoría</h2>
                    <ul>
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
                                echo '<li><a href="' . get_permalink($same_category_post->ID) . '">' . $same_category_post->post_title . '</a></li>';
                            }
                        } else {
                            echo '<li>No hay noticias en esta categoría.</li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>


</main>


<?php get_footer(); ?>



<style>
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