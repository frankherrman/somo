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
                <div class="entry-meta"
                    style="color: #777; margin-bottom: 0.5rem; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px;">
                    <span class="posted-on">
                        <?php echo get_the_date(); ?>
                    </span>
                    <span class="cat-links">
                        | <?php the_category(', '); ?>
                    </span>
                </div>
                <?php the_title('<h1 class="entry-title" style="margin-bottom: 1rem;">', '</h1>'); ?>
            </header>

            <div class="entry-content">
                <?php if (has_post_thumbnail()) { ?>
                    <?php the_post_thumbnail('full'); ?>
                <?php } ?>
                <?php the_content(); ?>
            </div>

            <footer class="entry-footer" style="margin-top: 3rem; padding-top: 1rem; border-top: 1px solid #eee;">
                <?php
                the_post_navigation(
                    array(
                        'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'somo-theme') . '</span> <span class="nav-title">%title</span>',
                        'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'somo-theme') . '</span> <span class="nav-title">%title</span>',
                    )
                );
                ?>
            </footer>
        </article>
        <?php

        // If comments are open or we have at least one comment, load up the comment template.
        //  if (comments_open() || get_comments_number()):
        //    comments_template();
        //endif;
    
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
