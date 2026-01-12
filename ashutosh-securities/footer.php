<!-- Footer -->
<footer class="site-footer" role="contentinfo">
    <div class="footer-main">
        <div class="container">
            <div class="footer-grid">
                <!-- Footer Widget Column 1 -->
                <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                    <div>
                        <?php dynamic_sidebar( 'footer-1' ); ?>
                    </div>
                <?php else : ?>
                    <!-- Default Company Info (fallback when no widget) -->
                    <div class="footer-widget">
                        <div class="site-logo" style="margin-bottom: 20px;">
                            <?php
                            if ( has_custom_logo() ) {
                                ashutosh_securities_custom_logo();
                            } else {
                                ?>
                                <div class="logo-circle" aria-hidden="true">AB</div>
                                <?php
                            }
                            ?>
                            <div class="logo-text">
                                <h3 style="color: white; font-size: 18px;"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h3>
                                <p style="color: #aaa;"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
                            </div>
                        </div>
                        <p><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
                        
                        <?php ashutosh_securities_display_social_links( 18, 'footer-social' ); ?>
                    </div>
                <?php endif; ?>

                <!-- Footer Widget Column 2 -->
                <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                    <div>
                        <?php dynamic_sidebar( 'footer-2' ); ?>
                    </div>
                <?php endif; ?>

                <!-- Footer Widget Column 3 -->
                <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                    <div>
                        <?php dynamic_sidebar( 'footer-3' ); ?>
                    </div>
                <?php endif; ?>

                <!-- Footer Widget Column 4 -->
                <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
                    <div>
                        <?php dynamic_sidebar( 'footer-4' ); ?>
                    </div>
                <?php else : ?>
                    <!-- Default Contact Info (fallback when no widget) -->
                    <div class="footer-widget">
                        <h3><?php esc_html_e( 'Contact Us', 'ashutosh-securities' ); ?></h3>
                        <ul style="list-style: none; padding: 0;">
                            <li style="margin-bottom: 15px;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#d4a747" stroke-width="2" style="display: inline-block; vertical-align: middle; margin-right: 10px;" aria-hidden="true" focusable="false">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                <span><?php echo esc_html( get_theme_mod( 'ashutosh_securities_address', '4 Square Complex, 3rd Floor, Narayan Chaur, Naxal, Kathmandu' ) ); ?></span>
                            </li>
                            <li style="margin-bottom: 15px;">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#d4a747" stroke-width="2" style="display: inline-block; vertical-align: middle; margin-right: 10px;" aria-hidden="true" focusable="false">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                <a href="mailto:<?php echo esc_attr( get_theme_mod( 'ashutosh_securities_email', 'info@ashutoshbrokerage.com' ) ); ?>" aria-label="<?php esc_attr_e( 'Email us', 'ashutosh-securities' ); ?>">
                                    <?php echo esc_html( get_theme_mod( 'ashutosh_securities_email', 'info@ashutoshbrokerage.com' ) ); ?>
                                </a>
                            </li>
                            <li>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#d4a747" stroke-width="2" style="display: inline-block; vertical-align: middle; margin-right: 10px;" aria-hidden="true" focusable="false">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                                <a href="tel:<?php echo esc_attr( str_replace( array( ' ', '-' ), '', get_theme_mod( 'ashutosh_securities_phone', '+977-01-5971500' ) ) ); ?>" aria-label="<?php esc_attr_e( 'Call us', 'ashutosh-securities' ); ?>">
                                    <?php echo esc_html( get_theme_mod( 'ashutosh_securities_phone', '+977-01-5971500' ) ); ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-content">
                <p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>. <?php esc_html_e( 'All rights reserved.', 'ashutosh-securities' ); ?></p>
                <nav class="footer-links" aria-label="<?php esc_attr_e( 'Footer legal links', 'ashutosh-securities' ); ?>">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-menu',
                        'container'      => false,
                        'depth'          => 1,
                        'fallback_cb'    => 'ashutosh_securities_footer_fallback_menu',
                    ) );
                    ?>
                </nav>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

<?php
// Fallback footer menu if none is set
function ashutosh_securities_footer_fallback_menu() {
    echo '<div class="footer-menu">';
    echo '<a href="' . esc_url( home_url( '/privacy-policy' ) ) . '">' . esc_html__( 'Privacy Policy', 'ashutosh-securities' ) . '</a>';
    echo '<a href="' . esc_url( home_url( '/terms-of-service' ) ) . '">' . esc_html__( 'Terms of Service', 'ashutosh-securities' ) . '</a>';
    echo '<a href="' . esc_url( home_url( '/disclaimer' ) ) . '">' . esc_html__( 'Disclaimer', 'ashutosh-securities' ) . '</a>';
    echo '</div>';
}
?>