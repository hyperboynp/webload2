<?php
/**
 * The main template file - Updated for accessibility and SEO
 */

get_header();
?>

<main id="main" class="site-main" role="main">
    <?php
    if ( have_posts() ) :
        ?>
        <div class="page-header" style="background: linear-gradient(135deg, #1a1d29, #2d3142); color: white; padding: 60px 0; text-align: center;">
            <div class="container">
                <h1 style="font-size: 42px; margin: 0;">
                    <?php
                    if ( is_home() && ! is_front_page() ) :
                        single_post_title();
                    elseif ( is_archive() ) :
                        the_archive_title();
                    elseif ( is_search() ) :
                        printf( esc_html__( 'Search Results for: %s', 'ashutosh-securities' ), '<span>' . get_search_query() . '</span>' );
                    else :
                        esc_html_e( 'Blog', 'ashutosh-securities' );
                    endif;
                    ?>
                </h1>
                <?php if ( is_archive() && get_the_archive_description() ) : ?>
                    <div class="archive-description" style="margin-top: 20px; opacity: 0.9; max-width: 600px; margin-left: auto; margin-right: auto;">
                        <?php the_archive_description(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="posts-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 30px;">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); transition: transform 0.3s ease;">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Read more about %s', 'ashutosh-securities' ), get_the_title() ) ); ?>">
                                    <?php 
                                    the_post_thumbnail( 'medium', array( 
                                        'style' => 'width: 100%; height: 200px; object-fit: cover;',
                                        'loading' => 'lazy',
                                        'alt' => get_the_title()
                                    ) ); 
                                    ?>
                                </a>
                            <?php endif; ?>
                            
                            <div style="padding: 25px;">
                                <header class="entry-header">
                                    <h2 style="font-size: 22px; margin-bottom: 10px;">
                                        <a href="<?php the_permalink(); ?>" style="color: #1a1d29;"><?php the_title(); ?></a>
                                    </h2>
                                    <div class="entry-meta" style="font-size: 14px; color: #666; margin-bottom: 15px;">
                                        <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
                                    </div>
                                </header>

                                <div class="entry-summary" style="color: #666; line-height: 1.6; margin-bottom: 15px;">
                                    <?php the_excerpt(); ?>
                                </div>

                                <a href="<?php the_permalink(); ?>" class="btn btn-outline" style="font-size: 14px; padding: 8px 16px;" aria-label="<?php echo esc_attr( sprintf( __( 'Read full article: %s', 'ashutosh-securities' ), get_the_title() ) ); ?>">
                                    <?php esc_html_e( 'Read More', 'ashutosh-securities' ); ?>
                                </a>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    ?>
                </div>

                <!-- Pagination -->
                <nav class="pagination" style="margin-top: 60px; text-align: center;" aria-label="<?php esc_attr_e( 'Posts pagination', 'ashutosh-securities' ); ?>">
                    <?php
                    the_posts_pagination( array(
                        'mid_size'  => 2,
                        'prev_text' => '<span aria-hidden="true">&larr;</span> ' . esc_html__( 'Previous', 'ashutosh-securities' ),
                        'next_text' => esc_html__( 'Next', 'ashutosh-securities' ) . ' <span aria-hidden="true">&rarr;</span>',
                    ) );
                    ?>
                </nav>
            </div>
        </div>
        <?php
    else :
        ?>
        <div class="container" style="padding: 80px 20px; text-align: center;">
            <h2><?php esc_html_e( 'Nothing Found', 'ashutosh-securities' ); ?></h2>
            <p><?php esc_html_e( 'It seems we can\'t find what you\'re looking for. Perhaps try a search?', 'ashutosh-securities' ); ?></p>
            <div style="max-width: 500px; margin: 30px auto 0;">
                <?php get_search_form(); ?>
            </div>
        </div>
        <?php
    endif;
    ?>
</main>

<?php
get_footer();