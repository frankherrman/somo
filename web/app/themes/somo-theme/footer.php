<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-column">
                <?php if (is_active_sidebar('footer-1')): ?>
                    <?php dynamic_sidebar('footer-1'); ?>
                <?php else: ?>
                    <h3>Over SOMO</h3>
                    <p>Ondersteunt en investeert in de ontwikkeling van jongeren in Outjo, Namibië.</p>
                <?php endif; ?>
            </div>
            <div class="footer-column">
                <?php if (is_active_sidebar('footer-2')): ?>
                    <?php dynamic_sidebar('footer-2'); ?>
                <?php else: ?>
                    <h3>Contact</h3>
                    <p>Email: info@somomaarssen.nl</p>
                <?php endif; ?>
            </div>
            <div class="footer-column">
                <?php if (is_active_sidebar('footer-3')): ?>
                    <?php dynamic_sidebar('footer-3'); ?>
                <?php else: ?>
                    <h3>Volg ons</h3>
                    <p>Social Media links hier.</p>
                <?php endif; ?>
            </div>
            <div class="footer-column">
                <?php if (is_active_sidebar('footer-4')): ?>
                    <?php dynamic_sidebar('footer-4'); ?>
                <?php else: ?>
                    <h3>Nieuwsbrief</h3>
                    <p>Meld je aan voor onze nieuwsbrief.</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="site-info">
            <p>&copy; <?php echo date('Y'); ?> SOMO</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>