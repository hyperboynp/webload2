<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Skip to Main Content Link (Accessibility) -->
<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'ashutosh-securities' ); ?></a>

<!-- Top Bar -->
<div class="top-bar" role="banner">
    <div class="container">
        <div class="top-bar-left">
            <div>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline-block; vertical-align: middle; margin-right: 5px;" aria-hidden="true" focusable="false">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <polyline points="22,6 12,13 2,6"></polyline>
                </svg>
                <a href="mailto:<?php echo esc_attr( get_theme_mod( 'ashutosh_securities_email', 'info@ashutoshbrokerage.com' ) ); ?>" aria-label="<?php esc_attr_e( 'Email us', 'ashutosh-securities' ); ?>">
                    <?php echo esc_html( get_theme_mod( 'ashutosh_securities_email', 'info@ashutoshbrokerage.com' ) ); ?>
                </a>
            </div>
            <div>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline-block; vertical-align: middle; margin-right: 5px;" aria-hidden="true" focusable="false">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                </svg>
                <a href="tel:<?php echo esc_attr( str_replace( array( ' ', '-' ), '', get_theme_mod( 'ashutosh_securities_phone', '+977-01-5971500' ) ) ); ?>" aria-label="<?php esc_attr_e( 'Call us', 'ashutosh-securities' ); ?>">
                    <?php echo esc_html( get_theme_mod( 'ashutosh_securities_phone', '+977-01-5971500' ) ); ?>
                </a>
            </div>
        </div>
        <?php ashutosh_securities_display_social_links( 16, 'top-bar-right' ); ?>
    </div>
</div>

<!-- Header -->
<header class="site-header" role="banner">
    <div class="container">
        <nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary navigation', 'ashutosh-securities' ); ?>">
            <!-- Logo -->
            <div class="site-logo">
                <?php
                if ( has_custom_logo() ) {
                    ashutosh_securities_custom_logo();
                } else {
                    ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        <div class="logo-circle" aria-hidden="true">AB</div>
                    </a>
                    <?php
                }
                ?>
                <div class="logo-text">
                    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h1>
                    <p><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
                </div>
            </div>

            <!-- Navigation Menu -->
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_class'     => 'nav-menu',
                'container'      => false,
                'fallback_cb'    => false,
                'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
            ) );
            ?>

            <!-- CTA Buttons -->
            <div class="nav-cta">
                <a href="<?php echo esc_url( get_theme_mod( 'ashutosh_securities_tms_login_url', '#' ) ); ?>" class="btn btn-outline" aria-label="<?php esc_attr_e( 'TMS Login', 'ashutosh-securities' ); ?>"><?php esc_html_e( 'TMS Login', 'ashutosh-securities' ); ?></a>
                <a href="<?php echo esc_url( get_theme_mod( 'ashutosh_securities_open_account_url', '#' ) ); ?>" class="btn btn-primary" aria-label="<?php esc_attr_e( 'Open Account', 'ashutosh-securities' ); ?>"><?php esc_html_e( 'Open Account', 'ashutosh-securities' ); ?></a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" aria-label="<?php esc_attr_e( 'Toggle navigation menu', 'ashutosh-securities' ); ?>" aria-expanded="false" aria-controls="primary-menu">
                <span class="hamburger-icon" aria-hidden="true">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </button>
        </nav>
    </div>
</header>