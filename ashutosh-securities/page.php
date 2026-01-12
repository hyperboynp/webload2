<?php
/**
 * Template Name: Page Template
 * The template for displaying all pages - Optimized for accessibility and SEO
 */

get_header();
?>

<main id="main" class="site-main" role="main">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <!-- Page Header -->
            <div class="page-header" style="background: linear-gradient(135deg, #1a1d29, #2d3142); color: white; padding: 80px 0; text-align: center;" role="banner">
                <div class="container">
                    <h1 style="font-size: 48px; margin: 0;"><?php the_title(); ?></h1>
                </div>
            </div>

            <!-- Page Content -->
            <div class="page-content section">
                <div class="container">
                    <?php
                    if ( has_post_thumbnail() ) :
                        ?>
                        <div style="margin-bottom: 40px;">
                            <?php 
                            the_post_thumbnail( 'large', array( 
                                'style' => 'width: 100%; height: auto; border-radius: 10px;',
                                'loading' => 'lazy',
                                'alt' => get_the_title()
                            ) ); 
                            ?>
                        </div>
                        <?php
                    endif;
                    ?>

                    <div class="entry-content" style="line-height: 1.8; color: #333;">
                        <?php
                        the_content();

                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ashutosh-securities' ),
                            'after'  => '</div>',
                        ) );
                        ?>
                    </div>
                </div>
            </div>
        </article>
        <?php

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile;
    ?>
</main>

<?php
get_footer();