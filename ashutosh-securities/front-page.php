<?php
/**
 * Template Name: Front Page (Dynamic)
 * The dynamic front page template - pulls content from database
 */

get_header();

// Get section visibility settings
$sections_visibility = get_option( 'ashutosh_sections_visibility', array(
    'hero' => 'on',
    'promo_banner' => 'on',
    'orange_welcome' => 'on',
    'two_column_sections' => 'on',
    'research_cards' => 'on',
    'service_cards' => 'on',
    'sticky_banner' => 'on',
    'floating_cta' => 'on',
));
?>

<main id="main" class="site-main" role="main">

<?php if ( isset( $sections_visibility['hero'] ) && $sections_visibility['hero'] === 'on' ) : ?>
<!-- Hero Section with Lead Form -->
<section class="hero-section-sharekhan">
    <div class="container">
        <div class="hero-content-sharekhan">
            <div class="hero-text-sharekhan">
                <h2>
                    <strong><?php echo esc_html( get_theme_mod( 'hero_main_heading', 'Ashutosh Brokerage takes a new step forward' ) ); ?></strong>
                </h2>
                <?php 
                $hero_brand_image = get_theme_mod( 'hero_brand_image', get_template_directory_uri() . '/images/brand-partnership.svg' );
                if ( $hero_brand_image ) : ?>
                    <img src="<?php echo esc_url( $hero_brand_image ); ?>" alt="Brand Partnership" class="brand-logo">
                <?php endif; ?>
            </div>
            
            <div class="hero-form-area">
                <!-- Lead Form Card -->
                <div class="lead-form-card">
                    <img src="https://images.pexels.com/photos/7567443/pexels-photo-7567443.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Trading Award" class="form-header-image">
                    
                    <div class="form-header-gray">
                        <h6><?php echo esc_html( get_theme_mod( 'hero_form_heading', 'OPEN FREE* DEMAT AND TRADING ACCOUNT IN 15 MIN**' ) ); ?></h6>
                        <span><?php echo esc_html( get_theme_mod( 'hero_form_subheading', 'Limited Period Offer' ) ); ?></span>
                    </div>
                    
                    <div class="form-body">
                        <?php echo do_shortcode('[contact-form-7 id="1" title="Lead Form"]'); ?>
                        <p style="font-size: 12px; margin-top: 15px;">
                            I agree to all <a href="#">Terms and Conditions</a>
                        </p>
                    </div>
                </div>
                
                <!-- Orange Club Box -->
                <div class="orange-club-box">
                    <div class="d-flex">
                        <div>
                            <img src="https://images.pexels.com/photos/128867/coins-currency-investment-insurance-128867.jpeg?auto=compress&cs=tinysrgb&w=80" alt="Orange Club">
                        </div>
                        <div class="orange-club-text">
                            <p class="highlight">Want to invest 5 lakhs+</p>
                            <p class="highlight">with Ashutosh Brokerage?</p>
                            <p class="sub-text">Click on KNOW MORE to learn about our Premium Account Opening Package</p>
                            <a href="#" class="btn btn-orange-solid w-100 mt-4">KNOW MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if ( isset( $sections_visibility['promo_banner'] ) && $sections_visibility['promo_banner'] === 'on' ) : ?>
<!-- Promotional Banner Section -->
<section class="promo-banner-section">
    <div class="container">
        <div class="promo-banner">
            <div class="promo-content">
                <div class="promo-text">
                    <h3><?php echo esc_html( get_theme_mod( 'promo_banner_heading', 'Ashutosh Brokerage Business Partner Program' ) ); ?></h3>
                    <?php 
                    $promo_content = get_theme_mod( 'promo_banner_content' );
                    if ( $promo_content ) {
                        echo wp_kses_post( $promo_content );
                    } else {
                        ?>
                        <ul>
                            <li>Enjoy our competitive revenue-sharing model</li>
                            <li>Get regular payments without any hidden costs</li>
                            <li>Acquire new clients easily with our brand stature</li>
                            <li>Leverage 29+ years of expertise in wealth creation</li>
                        </ul>
                        <strong>YOUR BUSINESS, OUR SUPPORT</strong>
                        <?php
                    }
                    ?>
                    <div class="promo-buttons">
                        <a href="<?php echo esc_url( get_theme_mod( 'promo_banner_button_url', '#' ) ); ?>" class="btn btn-orange-solid">
                            <?php echo esc_html( get_theme_mod( 'promo_banner_button_text', 'Become A Partner' ) ); ?>
                        </a>
                    </div>
                </div>
                <div class="promo-image">
                    <?php 
                    $promo_image = get_theme_mod( 'promo_banner_image', 'https://images.pexels.com/photos/3184465/pexels-photo-3184465.jpeg?auto=compress&cs=tinysrgb&w=400' );
                    if ( $promo_image ) : ?>
                        <img src="<?php echo esc_url( $promo_image ); ?>" alt="Business Partner">
                    <?php endif; ?>
                </div>
            </div>
            <p style="font-size: 12px; color: #999; margin-top: 20px;">For detailed disclaimer and other details, visit www.ashutoshbrokerage.com</p>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Green Strip -->
<div class="bg-green-strip"></div>

<?php if ( isset( $sections_visibility['orange_welcome'] ) && $sections_visibility['orange_welcome'] === 'on' ) : ?>
<!-- Orange Background Welcome Section -->
<section class="bg-orange-section">
    <div class="container">
        <div class="orange-section-content">
            <div>
                <h2><?php echo esc_html( get_theme_mod( 'orange_section_heading_1', 'Designed for the serious,' ) ); ?></h2>
                <h1><?php echo esc_html( get_theme_mod( 'orange_section_heading_2', 'welcome to Ashutosh Brokerage!' ) ); ?></h1>
                <?php 
                $orange_content = get_theme_mod( 'orange_section_content' );
                if ( $orange_content ) {
                    echo wp_kses_post( wpautop( $orange_content ) );
                } else {
                    ?>
                    <p>Ask any market veteran and you will know that consistently making money from the markets is not easy at all. It requires a serious approach that involves <strong>serious research</strong>, <strong>serious risk analysis</strong> and <strong>serious discipline</strong>. Our full-service model, which consists of an expert Research team, experienced Relationship Managers, wide network of branches, information packed trading & investing platforms is designed to help you understand the required serious approach. It also helps you get the power of our experience and expertise on your side</p>
                    <?php
                }
                ?>
                
                <div class="promo-buttons">
                    <a href="#" class="btn btn-orange-solid">Serious Approach - Investing</a>
                    <a href="#" class="btn btn-orange-solid">Serious Approach - Trading</a>
                </div>
            </div>
            <div class="section-image">
                <?php 
                $orange_image = get_theme_mod( 'orange_section_image', 'https://images.pexels.com/photos/6801872/pexels-photo-6801872.jpeg?auto=compress&cs=tinysrgb&w=400' );
                if ( $orange_image ) : ?>
                    <img src="<?php echo esc_url( $orange_image ); ?>" alt="Mobile App">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if ( isset( $sections_visibility['two_column_sections'] ) && $sections_visibility['two_column_sections'] === 'on' ) : ?>
    <?php
    // Query Two Column Sections
    $two_column_args = array(
        'post_type' => 'two_column_section',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_status' => 'publish',
    );
    $two_column_query = new WP_Query( $two_column_args );
    
    if ( $two_column_query->have_posts() ) :
        while ( $two_column_query->have_posts() ) : $two_column_query->the_post();
            $section_layout = get_post_meta( get_the_ID(), '_section_layout', true );
            $section_bg = get_post_meta( get_the_ID(), '_section_bg', true );
            $button_1_text = get_post_meta( get_the_ID(), '_button_1_text', true );
            $button_1_url = get_post_meta( get_the_ID(), '_button_1_url', true );
            $button_2_text = get_post_meta( get_the_ID(), '_button_2_text', true );
            $button_2_url = get_post_meta( get_the_ID(), '_button_2_url', true );
            
            $bg_class = ( $section_bg === 'light_gray' ) ? 'bg-light-gray' : 'bg-white';
            $reverse_class = ( $section_layout === 'text_right' ) ? 'reverse' : '';
            ?>
            
            <section class="section-spacing <?php echo esc_attr( $bg_class ); ?>">
                <div class="container">
                    <div class="two-column-section <?php echo esc_attr( $reverse_class ); ?>">
                        <div class="section-content">
                            <h2><?php the_title(); ?></h2>
                            <?php the_content(); ?>
                            
                            <?php if ( $button_1_text || $button_2_text ) : ?>
                                <div class="promo-buttons">
                                    <?php if ( $button_1_text && $button_1_url ) : ?>
                                        <a href="<?php echo esc_url( $button_1_url ); ?>" class="btn btn-orange-solid"><?php echo esc_html( $button_1_text ); ?></a>
                                    <?php endif; ?>
                                    
                                    <?php if ( $button_2_text && $button_2_url ) : ?>
                                        <a href="<?php echo esc_url( $button_2_url ); ?>" class="btn btn-orange-solid"><?php echo esc_html( $button_2_text ); ?></a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="section-image">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'large', array( 'alt' => get_the_title() ) ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            
        <?php endwhile;
        wp_reset_postdata();
    endif;
    ?>
<?php endif; ?>

<?php if ( isset( $sections_visibility['research_cards'] ) && $sections_visibility['research_cards'] === 'on' ) : ?>
<!-- Research Philosophy Section -->
<section class="research-section bg-white">
    <div class="container">
        <h2><?php echo esc_html( get_theme_mod( 'research_section_heading', 'For those serious about understanding our research approach' ) ); ?></h2>
        <?php 
        $research_description = get_theme_mod( 'research_section_description' );
        if ( $research_description ) {
            echo wp_kses_post( wpautop( $research_description ) );
        } else {
            ?>
            <p>We offer free research recommendations across mutual funds, long term investing and technical analysis for trading.<br>
            We also offer free research coverage across all segments – Equity, Futures & Options, Currency and Commodity.<br>
            But before you look at our recommendations it's important for you to understand how our research calls are derived.</p>
            <?php
        }
        ?>
        
        <div class="research-cards">
            <?php
            $research_args = array(
                'post_type' => 'research_card',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'post_status' => 'publish',
            );
            $research_query = new WP_Query( $research_args );
            
            if ( $research_query->have_posts() ) :
                while ( $research_query->have_posts() ) : $research_query->the_post();
                    $button_text = get_post_meta( get_the_ID(), '_button_text', true );
                    $button_url = get_post_meta( get_the_ID(), '_button_url', true );
                    ?>
                    <div class="research-card">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'medium', array( 'alt' => get_the_title() ) ); ?>
                        <?php endif; ?>
                        <h5><?php the_title(); ?></h5>
                        <?php the_content(); ?>
                        <?php if ( $button_text && $button_url ) : ?>
                            <a href="<?php echo esc_url( $button_url ); ?>" class="btn btn-orange-solid"><?php echo esc_html( $button_text ); ?></a>
                        <?php endif; ?>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <!-- Default cards if none created -->
                <div class="research-card">
                    <img src="https://images.pexels.com/photos/6801874/pexels-photo-6801874.jpeg?auto=compress&cs=tinysrgb&w=200" alt="3R Research">
                    <h5>3R Research Philosophy</h5>
                    <p>Research for long-term investments</p>
                    <a href="#" class="btn btn-orange-solid">EXPLORE</a>
                </div>
                
                <div class="research-card">
                    <img src="https://images.pexels.com/photos/7567443/pexels-photo-7567443.jpeg?auto=compress&cs=tinysrgb&w=200" alt="POP Research">
                    <h5>POP Research Philosophy</h5>
                    <p>Technical research philosophy</p>
                    <a href="#" class="btn btn-orange-solid">EXPLORE</a>
                </div>
                
                <div class="research-card">
                    <img src="https://images.pexels.com/photos/6801872/pexels-photo-6801872.jpeg?auto=compress&cs=tinysrgb&w=200" alt="Q-Square Research">
                    <h5>Q-Square Research</h5>
                    <p>Mutual Funds research philosophy</p>
                    <a href="#" class="btn btn-orange-solid">EXPLORE</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if ( isset( $sections_visibility['service_cards'] ) && $sections_visibility['service_cards'] === 'on' ) : ?>
<!-- Services Segmentation Section -->
<section class="services-tiger-section">
    <div class="container">
        <h2><?php echo esc_html( get_theme_mod( 'services_section_heading', 'For those serious about getting services designed for their core needs' ) ); ?></h2>
        <?php 
        $services_description = get_theme_mod( 'services_section_description' );
        if ( $services_description ) {
            echo wp_kses_post( wpautop( $services_description ) );
        } else {
            ?>
            <p>Our years of experience has indicated that people have different needs when they come to the markets. So to offer services focused on different needs we have different segments that one can belong to and avail of unique services.</p>
            <?php
        }
        ?>
        
        <div class="tiger-with-cards">
            <div class="services-cards-grid">
                <?php
                $service_args = array(
                    'post_type' => 'service_card',
                    'posts_per_page' => -1,
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                    'post_status' => 'publish',
                );
                $service_query = new WP_Query( $service_args );
                
                if ( $service_query->have_posts() ) :
                    while ( $service_query->have_posts() ) : $service_query->the_post();
                        $button_text = get_post_meta( get_the_ID(), '_button_text', true );
                        $button_url = get_post_meta( get_the_ID(), '_button_url', true );
                        ?>
                        <div class="service-card-item">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'thumbnail', array( 'alt' => get_the_title() ) ); ?>
                            <?php endif; ?>
                            <?php the_content(); ?>
                            <?php if ( $button_text && $button_url ) : ?>
                                <a href="<?php echo esc_url( $button_url ); ?>" class="btn btn-orange-solid"><?php echo esc_html( $button_text ); ?></a>
                            <?php endif; ?>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <!-- Default cards if none created -->
                    <div class="service-card-item">
                        <img src="https://images.pexels.com/photos/3943716/pexels-photo-3943716.jpeg?auto=compress&cs=tinysrgb&w=150" alt="Premium Services">
                        <p>Ashutosh Brokerage's bespoke offering for Ultra HNI individuals, large families, and corporate accounts.</p>
                        <a href="#" class="btn btn-orange-solid">EXPLORE</a>
                    </div>
                    
                    <div class="service-card-item">
                        <img src="https://images.pexels.com/photos/6801874/pexels-photo-6801874.jpeg?auto=compress&cs=tinysrgb&w=150" alt="Investment Solutions">
                        <p>Your gateway to creating wealth in the equity market, backed by nearly 3 decades of expert Research.</p>
                        <a href="#" class="btn btn-orange-solid">EXPLORE</a>
                    </div>
                    
                    <div class="service-card-item">
                        <img src="https://images.pexels.com/photos/7567443/pexels-photo-7567443.jpeg?auto=compress&cs=tinysrgb&w=150" alt="Trading Solutions">
                        <p>Charges simplified + Platforms simplified + Time spent simplified + Expert support simplified = Trading Simplified.</p>
                        <a href="#" class="btn btn-orange-solid">EXPLORE</a>
                    </div>
                    
                    <div class="service-card-item">
                        <img src="https://images.pexels.com/photos/6801872/pexels-photo-6801872.jpeg?auto=compress&cs=tinysrgb&w=150" alt="New to Market">
                        <p>With 3 decades of equity experience, we're here to help you get started right!</p>
                        <a href="#" class="btn btn-orange-solid">EXPLORE</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

</main>

<?php if ( isset( $sections_visibility['sticky_banner'] ) && $sections_visibility['sticky_banner'] === 'on' && get_theme_mod( 'sticky_banner_enable', true ) ) : 
    $banner_bg_color = get_theme_mod( 'sticky_banner_bg_color', '#ffffff' );
    $banner_text_color = get_theme_mod( 'sticky_banner_text_color', '#000000' );
    $banner_image = get_theme_mod( 'sticky_banner_image', 'https://images.pexels.com/photos/128867/coins-currency-investment-insurance-128867.jpeg?auto=compress&cs=tinysrgb&w=100' );
?>
<!-- Sticky Bottom Banner -->
<div class="sticky-bottom-banner" id="stickyBanner" style="background-color: <?php echo esc_attr( $banner_bg_color ); ?>; color: <?php echo esc_attr( $banner_text_color ); ?>;">
    <div class="container">
        <div class="sticky-banner-content">
            <?php if ( $banner_image ) : ?>
                <img src="<?php echo esc_url( $banner_image ); ?>" alt="<?php echo esc_attr( get_theme_mod( 'sticky_banner_heading', 'Banner' ) ); ?>">
            <?php endif; ?>
            <div class="sticky-banner-text">
                <h4 style="color: <?php echo esc_attr( $banner_text_color ); ?>;">
                    <?php echo esc_html( get_theme_mod( 'sticky_banner_heading', 'Balanced Advantage Funds' ) ); ?>
                </h4>
                <p style="color: <?php echo esc_attr( $banner_text_color ); ?>; opacity: 0.8;">
                    <?php echo esc_html( get_theme_mod( 'sticky_banner_text', 'Ride market waves with confidence' ) ); ?>
                </p>
            </div>
            <a href="<?php echo esc_url( get_theme_mod( 'sticky_banner_button_url', '#' ) ); ?>" class="btn btn-orange-solid">
                <?php echo esc_html( get_theme_mod( 'sticky_banner_button_text', 'EXPLORE' ) ); ?>
            </a>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if ( isset( $sections_visibility['floating_cta'] ) && $sections_visibility['floating_cta'] === 'on' ) : ?>
<!-- Floating CTA Button -->
<div class="floating-cta">
    <a href="<?php echo esc_url( get_theme_mod( 'floating_cta_url', '#' ) ); ?>" class="btn btn-orange-solid">
        <?php echo esc_html( get_theme_mod( 'floating_cta_text', 'OPEN FREE* DEMAT ACCOUNT' ) ); ?>
    </a>
</div>
<?php endif; ?>

<?php
get_footer();
