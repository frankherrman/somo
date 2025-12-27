<?php
get_header();
?>

<main class="site-main">
    <div class="header-section"
        style="background: var(--color-light-gray); padding: var(--spacing-xl) 0; margin-bottom: var(--spacing-xl); text-align: center;">
        <div class="container">
            <h1 class="page-title" style="margin: 0; text-transform: uppercase; border: none;">
                <?php post_type_archive_title(); ?></h1>
        </div>
    </div>

    <div class="container">
        <?php if (have_posts()): ?>
            <div class="project-grid">
                <?php
                while (have_posts()):
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('project-card'); ?>>
                        <?php if (has_post_thumbnail()): ?>
                            <div class="project-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('large'); ?>
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="project-thumbnail placeholder"></div>
                        <?php endif; ?>

                        <div class="project-content">
                            <h2 class="project-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="project-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>"
                                class="btn-link"><?php esc_html_e('Bekijk project', 'somo-theme'); ?> &rarr;</a>
                        </div>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>

            <?php
            the_posts_navigation();
        else:
            ?>
            <p><?php esc_html_e('Geen projecten gevonden.', 'somo-theme'); ?></p>
            <?php
        endif;
        ?>
    </div>
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
