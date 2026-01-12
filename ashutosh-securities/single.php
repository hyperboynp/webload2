<?php
/**
 * The template for displaying all single posts - Optimized for accessibility and SEO
 */

get_header();
?>

<main id="main" class="site-main" role="main">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/BlogPosting">
            <!-- Post Header -->
            <div class="page-header" style="background: linear-gradient(135deg, #1a1d29, #2d3142); color: white; padding: 60px 0;" role="banner">
                <div class="container">
                    <div class="entry-meta" style="margin-bottom: 20px; opacity: 0.8;">
                        <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" itemprop="datePublished">
                            <?php esc_html_e( 'Posted on', 'ashutosh-securities' ); ?> <?php echo esc_html( get_the_date() ); ?>
                        </time>
                        <?php if ( has_category() ) : ?>
                            <span style="margin-left: 20px;">
                                <?php esc_html_e( 'in', 'ashutosh-securities' ); ?> <span itemprop="articleSection"><?php the_category( ', ' ); ?></span>
                            </span>
                        <?php endif; ?>
                        <meta itemprop="author" content="<?php echo esc_attr( get_the_author() ); ?>">
                    </div>
                    <h1 style="font-size: 42px; margin: 0; line-height: 1.3;" itemprop="headline"><?php the_title(); ?></h1>
                </div>
            </div>

            <!-- Post Content -->
            <div class="post-content section">
                <div class="container" style="max-width: 900px;">
                    <?php
                    if ( has_post_thumbnail() ) :
                        ?>
                        <div style="margin-bottom: 40px;" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                            <?php 
                            the_post_thumbnail( 'large', array( 
                                'style' => 'width: 100%; height: auto; border-radius: 10px;',
                                'loading' => 'lazy',
                                'itemprop' => 'url',
                                'alt' => get_the_title()
                            ) ); 
                            ?>
                            <meta itemprop="width" content="<?php echo esc_attr( wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' )[1] ); ?>">
                            <meta itemprop="height" content="<?php echo esc_attr( wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' )[2] ); ?>">
                        </div>
                        <?php
                    endif;
                    ?>

                    <div class="entry-content" style="line-height: 1.8; color: #333; font-size: 17px;" itemprop="articleBody">
                        <?php
                        the_content();

                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ashutosh-securities' ),
                            'after'  => '</div>',
                        ) );
                        ?>
                    </div>

                    <?php if ( has_tag() ) : ?>
                        <div class="entry-tags" style="margin-top: 40px; padding-top: 30px; border-top: 1px solid #ddd;" itemprop="keywords">
                            <strong><?php esc_html_e( 'Tags:', 'ashutosh-securities' ); ?></strong> <?php the_tags( '', ', ', '' ); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Author Bio -->
                    <div class="author-bio" style="margin-top: 50px; padding: 30px; background: #f8f9fa; border-radius: 10px;" itemscope itemtype="https://schema.org/Person">
                        <h3 style="margin-bottom: 15px; color: #1a1d29;"><?php esc_html_e( 'About the Author', 'ashutosh-securities' ); ?></h3>
                        <p itemprop="name"><strong><?php the_author(); ?></strong></p>
                        <?php if ( get_the_author_meta( 'description' ) ) : ?>
                            <p itemprop="description"><?php the_author_meta( 'description' ); ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- Post Navigation -->
                    <nav class="post-navigation" style="margin-top: 50px; display: flex; justify-content: space-between; gap: 20px;" aria-label="<?php esc_attr_e( 'Post navigation', 'ashutosh-securities' ); ?>">
                        <div class="nav-previous" style="flex: 1;">
                            <?php previous_post_link( '%link', '<span aria-hidden="true">&larr;</span> ' . esc_html__( 'Previous Post', 'ashutosh-securities' ) ); ?>
                        </div>
                        <div class="nav-next" style="flex: 1; text-align: right;">
                            <?php next_post_link( '%link', esc_html__( 'Next Post', 'ashutosh-securities' ) . ' <span aria-hidden="true">&rarr;</span>' ); ?>
                        </div>
                    </nav>
                </div>
            </div>

            <!-- Meta tags for SEO -->
            <meta itemprop="dateModified" content="<?php echo esc_attr( get_the_modified_date( 'c' ) ); ?>">
            <meta itemprop="mainEntityOfPage" content="<?php echo esc_url( get_permalink() ); ?>">
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