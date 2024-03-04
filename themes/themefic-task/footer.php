<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Themefic_Task
 */

?>

<footer class="footer" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/img/Footer.png'; ?>');">
    <div class="container">
        <div class="row">
            <?php if ( is_active_sidebar( 'footer-column-1' ) ) : ?>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <?php dynamic_sidebar('footer-column-1'); ?>
                </div>
            <?php endif; ?>
            <?php if ( is_active_sidebar( 'footer-column-2' ) ) : ?>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <?php dynamic_sidebar('footer-column-2'); ?>
                </div>
            <?php endif; ?>
            <?php if ( is_active_sidebar( 'footer-column-3' ) ) : ?>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <?php dynamic_sidebar('footer-column-3'); ?>
                </div>
            <?php endif; ?>
            <?php if ( is_active_sidebar( 'footer-column-4' ) ) : ?>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <?php dynamic_sidebar('footer-column-4'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</footer>

<section class="Copyright">
    <div class="copyright-content">
        <div class="row">
            <div class="col-md-7 inner-copyright-text">
                <p>Copyright © <?php echo date('Y'); ?>. All Rights Reserved By <a href="https://dev.thoufik.com">Thoufik</a></p>
            </div>
            <div class="col-md-5 inner-copyright-privacy">
                <a href="<?php echo esc_url(get_privacy_policy_url()); ?>">Privacy Policy</a>
                <a href="<?php echo esc_url(home_url('/maps')); ?>">View on Maps</a>
            </div>
        </div>
    </div>
</section>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
