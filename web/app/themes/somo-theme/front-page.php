<?php
get_header();
?>

<main class="site-main">

    <!-- Hero Section -->
    <?php
    $hero_title = get_theme_mod('somo_hero_title', 'Ondersteun de toekomst van kinderen in Namibië');
    $hero_text = get_theme_mod('somo_hero_text', 'SOMO investeert in onderwijs, voeding en zelfredzaamheid voor jongeren in Outjo.');
    $hero_btn_text = get_theme_mod('somo_hero_btn_text', 'Help mee');
    $hero_btn_url = get_theme_mod('somo_hero_btn_url', '/doneren');
    $hero_image = get_theme_mod('somo_hero_image', 'https://source.unsplash.com/1600x900/?namibia,desert');
    ?>
    <section class="hero-section"
        style="background-image: linear-gradient(135deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.3)), url('<?php echo esc_url($hero_image); ?>');">
        <div class="container hero-container">
            <div class="hero-content">
                <h1 class="hero-title"><?php echo esc_html($hero_title); ?></h1>
                <p class="hero-text"><?php echo esc_html($hero_text); ?></p>
                <a href="<?php echo esc_url($hero_btn_url); ?>"
                    class="btn btn-hero"><?php echo esc_html($hero_btn_text); ?></a>
                <?php
                $hero_btn_sec_text = get_theme_mod('somo_hero_btn_sec_text', '');
                $hero_btn_sec_url = get_theme_mod('somo_hero_btn_sec_url', '');
                if ($hero_btn_sec_text && $hero_btn_sec_url): ?>
                    <a href="<?php echo esc_url($hero_btn_sec_url); ?>"
                        class="btn btn-secondary"><?php echo esc_html($hero_btn_sec_text); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Impact Section -->
    <section class="impact-section">
        <div class="container">
            <h2 class="section-title">Onze Impact</h2>
            <div class="impact-grid">
                <?php for ($i = 1; $i <= 3; $i++):
                    $icon = get_theme_mod("somo_impact_icon_$i", '⭐');
                    $title = get_theme_mod("somo_impact_title_$i", "Impact Title $i");
                    $desc = get_theme_mod("somo_impact_desc_$i", "Description for impact card $i.");
                    $url = get_theme_mod("somo_impact_url_$i", '#');
                    $color = get_theme_mod("somo_impact_color_$i", '#d44206');
                    ?>
                    <div class="impact-card">
                        <div class="impact-icon"
                            style="background-color: <?php echo esc_attr($color); ?>; box-shadow: 0 4px 15px <?php echo esc_attr($color); ?>40;">
                            <?php echo esc_html($icon); ?>
                        </div>
                        <h3><?php echo esc_html($title); ?></h3>
                        <p><?php echo esc_html($desc); ?></p>
                        <a href="<?php echo esc_url($url); ?>" class="btn-link">Lees meer &rarr;</a>
                    </div>
                <?php endfor; ?>

            </div>
        </div>
    </section>

    <!-- Latest News -->
    <section class="news-section">
        <div class="container">
            <h2 class="section-title">Laatste Nieuws</h2>
            <div class="news-grid">
                <?php
                $args = array(
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                );
                $news_query = new WP_Query($args);

                if ($news_query->have_posts()):
                    while ($news_query->have_posts()):
                        $news_query->the_post();
                        ?>
                        <div class="news-card">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="news-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium_large'); ?>
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="news-thumbnail placeholder"></div>
                            <?php endif; ?>

                            <div class="news-content">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="news-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="read-more">Lees artikel</a>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else:
                    echo '<p>Nog geen nieuwsberichten.</p>';
                endif;
                ?>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
