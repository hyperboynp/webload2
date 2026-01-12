<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header();
?>

<main id="main" class="site-main" role="main">
    <section class="error-404">
        <div class="container">
            <h1 class="error-404-title"><?php esc_html_e( '404', 'ashutosh-securities' ); ?></h1>
            <h2><?php esc_html_e( 'Page Not Found', 'ashutosh-securities' ); ?></h2>
            <p><?php esc_html_e( 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'ashutosh-securities' ); ?></p>
            <p>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary" aria-label="<?php esc_attr_e( 'Return to homepage', 'ashutosh-securities' ); ?>">
                    <?php esc_html_e( 'Back to Homepage', 'ashutosh-securities' ); ?>
                </a>
            </p>
            
            <div class="search-form-wrapper" style="max-width: 500px; margin: 40px auto 0;">
                <h3 style="margin-bottom: 20px; color: #1a1d29;"><?php esc_html_e( 'Try searching:', 'ashutosh-securities' ); ?></h3>
                <?php get_search_form(); ?>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();