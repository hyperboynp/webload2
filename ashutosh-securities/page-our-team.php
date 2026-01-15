<?php
/**
 * Template Name: Our Team
 * Description: Display team members with photos and details
 */

get_header();
?>

<main id="main" class="site-main" role="main">

<!-- Team Page Header -->
<section class="page-header-section" style="background: linear-gradient(135deg, var(--primary-orange), #ff9642); padding: 80px 0 60px; text-align: center; color: white;">
    <div class="container">
        <h1 style="font-size: 48px; margin-bottom: 20px; font-weight: 700; color: white;">
            <?php echo esc_html( get_theme_mod( 'team_page_title', 'Our Team' ) ); ?>
        </h1>
        <p style="font-size: 18px; max-width: 800px; margin: 0 auto; line-height: 1.8; color: white;">
            <?php echo esc_html( get_theme_mod( 'team_page_description', 'Meet the dedicated professionals behind Ashutosh Brokerage and Securities.' ) ); ?>
        </p>
    </div>
</section>

<!-- Team Members Section -->
<section class="team-section section-spacing bg-light-gray">
    <div class="container">
        <?php
        // Query team members
        $team_args = array(
            'post_type' => 'team_member',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'post_status' => 'publish',
        );
        $team_query = new WP_Query( $team_args );
        
        if ( $team_query->have_posts() ) : ?>
            <div class="team-grid">
                <?php while ( $team_query->have_posts() ) : $team_query->the_post();
                    $position = get_post_meta( get_the_ID(), '_team_position', true );
                    $email = get_post_meta( get_the_ID(), '_team_email', true );
                    $phone = get_post_meta( get_the_ID(), '_team_phone', true );
                    $facebook = get_post_meta( get_the_ID(), '_team_facebook', true );
                    $linkedin = get_post_meta( get_the_ID(), '_team_linkedin', true );
                    $twitter = get_post_meta( get_the_ID(), '_team_twitter', true );
                    ?>
                    <div class="team-member-card animate-on-scroll" data-testid="team-member-card">
                        <div class="team-member-image">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'medium', array( 'alt' => get_the_title() ) ); ?>
                            <?php else : ?>
                                <div class="team-member-placeholder">
                                    <svg width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="color: #ccc;">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="team-member-content">
                            <h3 class="team-member-name"><?php the_title(); ?></h3>
                            
                            <?php if ( $position ) : ?>
                                <p class="team-member-position"><?php echo esc_html( $position ); ?></p>
                            <?php endif; ?>
                            
                            <?php if ( get_the_content() ) : ?>
                                <div class="team-member-bio">
                                    <?php the_content(); ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="team-member-contact">
                                <?php if ( $email ) : ?>
                                    <a href="mailto:<?php echo esc_attr( $email ); ?>" class="team-contact-item" aria-label="Email <?php the_title(); ?>">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                            <polyline points="22,6 12,13 2,6"></polyline>
                                        </svg>
                                        <span><?php echo esc_html( $email ); ?></span>
                                    </a>
                                <?php endif; ?>
                                
                                <?php if ( $phone ) : ?>
                                    <a href="tel:<?php echo esc_attr( str_replace( array( ' ', '-' ), '', $phone ) ); ?>" class="team-contact-item" aria-label="Call <?php the_title(); ?>">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                        </svg>
                                        <span><?php echo esc_html( $phone ); ?></span>
                                    </a>
                                <?php endif; ?>
                            </div>
                            
                            <?php if ( $facebook || $linkedin || $twitter ) : ?>
                                <div class="team-member-social">
                                    <?php if ( $facebook ) : ?>
                                        <a href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook profile of <?php the_title(); ?>">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                    
                                    <?php if ( $linkedin ) : ?>
                                        <a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn profile of <?php the_title(); ?>">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                                <rect x="2" y="9" width="4" height="12"></rect>
                                                <circle cx="4" cy="4" r="2"></circle>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                    
                                    <?php if ( $twitter ) : ?>
                                        <a href="<?php echo esc_url( $twitter ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Twitter profile of <?php the_title(); ?>">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <div class="no-team-members" style="text-align: center; padding: 60px 20px;">
                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="#ccc" stroke-width="1.5" style="margin-bottom: 20px;">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <h3 style="font-size: 24px; margin-bottom: 10px; color: #666;"><?php _e( 'No Team Members Yet', 'ashutosh-securities' ); ?></h3>
                <p style="font-size: 16px; color: #999;"><?php _e( 'Team members will appear here once they are added.', 'ashutosh-securities' ); ?></p>
            </div>
        <?php endif;
        wp_reset_postdata();
        ?>
    </div>
</section>

</main>

<style>
/* Team Page Styles */
.team-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 40px;
    margin-top: 50px;
}

.team-member-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 25px rgba(0,0,0,0.08);
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.team-member-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.team-member-image {
    width: 100%;
    height: 320px;
    overflow: hidden;
    position: relative;
    background: linear-gradient(135deg, #f5f5f5, #e0e0e0);
}

.team-member-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.team-member-card:hover .team-member-image img {
    transform: scale(1.08);
}

.team-member-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.team-member-content {
    padding: 30px;
}

.team-member-name {
    font-size: 24px;
    font-weight: 700;
    margin: 0 0 10px;
    color: var(--text-dark);
}

.team-member-position {
    font-size: 16px;
    color: var(--primary-orange);
    font-weight: 600;
    margin: 0 0 20px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.team-member-bio {
    font-size: 15px;
    line-height: 1.7;
    color: var(--text-gray);
    margin-bottom: 20px;
}

.team-member-bio p {
    margin-bottom: 10px;
}

.team-member-contact {
    margin: 20px 0;
}

.team-contact-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px 0;
    font-size: 14px;
    color: var(--text-dark);
    text-decoration: none;
    transition: color 0.3s ease;
}

.team-contact-item:hover {
    color: var(--primary-orange);
}

.team-contact-item svg {
    flex-shrink: 0;
    color: var(--primary-orange);
}

.team-member-social {
    display: flex;
    gap: 15px;
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid #e0e0e0;
}

.team-member-social a {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--bg-light-gray);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text-dark);
    transition: all 0.3s ease;
}

.team-member-social a:hover {
    background: var(--primary-orange);
    color: white;
    transform: translateY(-3px);
}

/* Responsive Design */
@media (max-width: 992px) {
    .team-grid {
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 30px;
    }
    
    .page-header-section h1 {
        font-size: 36px !important;
    }
}

@media (max-width: 768px) {
    .team-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .page-header-section {
        padding: 50px 0 40px !important;
    }
    
    .page-header-section h1 {
        font-size: 32px !important;
    }
    
    .page-header-section p {
        font-size: 16px !important;
    }
    
    .team-member-image {
        height: 280px;
    }
    
    .team-member-content {
        padding: 25px;
    }
}
</style>

<?php
get_footer();
