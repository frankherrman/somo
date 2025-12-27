<?php
get_header();
?>

<main class="site-main container container-readable">
    <?php
    while (have_posts()):
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
            </header>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
        <?php
    endwhile;
    ?>
</main>

<?php if (is_active_sidebar('page-cta')): ?>
    <aside class="page-cta-bar">
        <div class="container container-readable">
            <?php dynamic_sidebar('page-cta'); ?>
        </div>
    </aside>
<?php endif; ?>

<?php
get_footer();
