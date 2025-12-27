<?php
get_header();
?>

<main class="site-main container">
    <?php
    if (have_posts()):
        while (have_posts()):
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>'); ?>
                </header>

                <div class="entry-content">
                    <?php the_excerpt(); ?>
                </div>
            </article>
            <?php
        endwhile;

        the_posts_navigation();

    else:
        ?>
        <p><?php esc_html_e('Sorry, no posts matched your criteria.', 'somo-theme'); ?></p>
        <?php
    endif;
    ?>
</main>

<?php
get_footer();
