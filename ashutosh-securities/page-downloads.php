<?php
/**
 * Template Name: Downloads
 * Description: Display downloadable files with categories and search
 */

get_header();
?>

<main id="main" class="site-main" role="main">

<!-- Downloads Page Header -->
<section class="page-header-section" style="background: linear-gradient(135deg, var(--primary-orange), #ff9642); padding: 80px 0 60px; text-align: center; color: white;">
    <div class="container">
        <h1 style="font-size: 48px; margin-bottom: 20px; font-weight: 700; color: white;">
            <?php echo esc_html( get_theme_mod( 'downloads_page_title', 'Downloads' ) ); ?>
        </h1>
        <p style="font-size: 18px; max-width: 800px; margin: 0 auto; line-height: 1.8; color: white;">
            <?php echo esc_html( get_theme_mod( 'downloads_page_description', 'Access important documents, forms, and resources.' ) ); ?>
        </p>
    </div>
</section>

<!-- Downloads Section -->
<section class="downloads-section section-spacing bg-light-gray">
    <div class="container">
        
        <?php
        // Get all download categories
        $categories = get_terms( array(
            'taxonomy' => 'download_category',
            'hide_empty' => true,
        ) );
        ?>
        
        <!-- Category Filter -->
        <?php if ( ! is_wp_error( $categories ) && ! empty( $categories ) ) : ?>
            <div class="downloads-filter animate-on-scroll">
                <button class="filter-btn active" data-category="all" data-testid="filter-all">
                    <?php _e( 'All Files', 'ashutosh-securities' ); ?>
                </button>
                <?php foreach ( $categories as $category ) : ?>
                    <button class="filter-btn" data-category="<?php echo esc_attr( $category->slug ); ?>" data-testid="filter-<?php echo esc_attr( $category->slug ); ?>">
                        <?php echo esc_html( $category->name ); ?>
                        <span class="filter-count">(<?php echo $category->count; ?>)</span>
                    </button>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <!-- Search Box -->
        <div class="downloads-search animate-on-scroll">
            <div class="search-box">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.35-4.35"></path>
                </svg>
                <input type="text" id="downloadSearch" placeholder="<?php esc_attr_e( 'Search downloads...', 'ashutosh-securities' ); ?>" aria-label="<?php esc_attr_e( 'Search downloads', 'ashutosh-securities' ); ?>">
            </div>
        </div>
        
        <?php
        // Query downloads
        $downloads_args = array(
            'post_type' => 'download_item',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'DESC',
            'post_status' => 'publish',
        );
        $downloads_query = new WP_Query( $downloads_args );
        
        if ( $downloads_query->have_posts() ) : ?>
            <div class="downloads-grid">
                <?php while ( $downloads_query->have_posts() ) : $downloads_query->the_post();
                    $file_url = get_post_meta( get_the_ID(), '_download_file_url', true );
                    $file_size = get_post_meta( get_the_ID(), '_download_file_size', true );
                    $file_type = get_post_meta( get_the_ID(), '_download_file_type', true );
                    $download_count = get_post_meta( get_the_ID(), '_download_count', true );
                    
                    // Get categories
                    $terms = get_the_terms( get_the_ID(), 'download_category' );
                    $category_slugs = array();
                    if ( $terms && ! is_wp_error( $terms ) ) {
                        foreach ( $terms as $term ) {
                            $category_slugs[] = $term->slug;
                        }
                    }
                    $category_data = ! empty( $category_slugs ) ? implode( ' ', $category_slugs ) : 'uncategorized';
                    
                    // Get file extension for icon
                    $file_extension = $file_url ? strtoupper( pathinfo( $file_url, PATHINFO_EXTENSION ) ) : 'FILE';
                    ?>
                    <div class="download-card animate-on-scroll" 
                         data-category="<?php echo esc_attr( $category_data ); ?>" 
                         data-title="<?php echo esc_attr( strtolower( get_the_title() ) ); ?>"
                         data-testid="download-card">
                        
                        <div class="download-card-icon">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="download-thumbnail">
                                    <?php the_post_thumbnail( 'thumbnail', array( 'alt' => get_the_title() ) ); ?>
                                </div>
                            <?php else : ?>
                                <div class="file-icon file-icon-<?php echo esc_attr( strtolower( $file_extension ) ); ?>">
                                    <span class="file-extension"><?php echo esc_html( $file_extension ); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="download-card-content">
                            <h3 class="download-title"><?php the_title(); ?></h3>
                            
                            <?php if ( get_the_content() ) : ?>
                                <div class="download-description">
                                    <?php the_excerpt(); ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="download-meta">
                                <?php if ( $file_type ) : ?>
                                    <span class="download-type">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                            <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                            <polyline points="13 2 13 9 20 9"></polyline>
                                        </svg>
                                        <?php echo esc_html( $file_type ); ?>
                                    </span>
                                <?php endif; ?>
                                
                                <?php if ( $file_size ) : ?>
                                    <span class="download-size">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12 6 12 12 16 14"></polyline>
                                        </svg>
                                        <?php echo esc_html( $file_size ); ?>
                                    </span>
                                <?php endif; ?>
                                
                                <?php if ( $download_count ) : ?>
                                    <span class="download-count-badge">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                            <polyline points="7 10 12 15 17 10"></polyline>
                                            <line x1="12" y1="15" x2="12" y2="3"></line>
                                        </svg>
                                        <?php echo number_format( $download_count ); ?> <?php _e( 'downloads', 'ashutosh-securities' ); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            
                            <?php if ( $terms && ! is_wp_error( $terms ) ) : ?>
                                <div class="download-categories">
                                    <?php foreach ( $terms as $term ) : ?>
                                        <span class="category-badge"><?php echo esc_html( $term->name ); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <?php if ( $file_url ) : ?>
                            <a href="<?php echo esc_url( add_query_arg( 'download_id', get_the_ID(), home_url( '/' ) ) ); ?>" 
                               class="download-button" 
                               data-testid="download-button"
                               aria-label="<?php echo esc_attr( sprintf( __( 'Download %s', 'ashutosh-securities' ), get_the_title() ) ); ?>">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                    <polyline points="7 10 12 15 17 10"></polyline>
                                    <line x1="12" y1="15" x2="12" y2="3"></line>
                                </svg>
                                <span><?php _e( 'Download', 'ashutosh-securities' ); ?></span>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
            
            <div class="no-results" style="display: none; text-align: center; padding: 60px 20px;">
                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="#ccc" stroke-width="1.5" style="margin-bottom: 20px;">
                    <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                    <polyline points="13 2 13 9 20 9"></polyline>
                </svg>
                <h3 style="font-size: 24px; margin-bottom: 10px; color: #666;"><?php _e( 'No Downloads Found', 'ashutosh-securities' ); ?></h3>
                <p style="font-size: 16px; color: #999;"><?php _e( 'Try adjusting your search or filter.', 'ashutosh-securities' ); ?></p>
            </div>
            
        <?php else : ?>
            <div class="no-downloads" style="text-align: center; padding: 60px 20px;">
                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="#ccc" stroke-width="1.5" style="margin-bottom: 20px;">
                    <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                    <polyline points="13 2 13 9 20 9"></polyline>
                </svg>
                <h3 style="font-size: 24px; margin-bottom: 10px; color: #666;"><?php _e( 'No Downloads Available', 'ashutosh-securities' ); ?></h3>
                <p style="font-size: 16px; color: #999;"><?php _e( 'Downloads will appear here once they are added.', 'ashutosh-securities' ); ?></p>
            </div>
        <?php endif;
        wp_reset_postdata();
        ?>
    </div>
</section>

</main>

<style>
/* Downloads Page Styles */
.downloads-filter {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    margin-bottom: 30px;
    padding: 30px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 2px 15px rgba(0,0,0,0.05);
}

.filter-btn {
    padding: 12px 25px;
    border: 2px solid #e0e0e0;
    background: white;
    border-radius: 25px;
    font-size: 14px;
    font-weight: 600;
    color: var(--text-dark);
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.filter-btn:hover {
    border-color: var(--primary-orange);
    color: var(--primary-orange);
    transform: translateY(-2px);
}

.filter-btn.active {
    background: var(--primary-orange);
    border-color: var(--primary-orange);
    color: white;
}

.filter-count {
    margin-left: 5px;
    opacity: 0.7;
}

.downloads-search {
    margin-bottom: 40px;
}

.search-box {
    max-width: 600px;
    margin: 0 auto;
    position: relative;
}

.search-box svg {
    position: absolute;
    left: 20px;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
}

.search-box input {
    width: 100%;
    padding: 18px 20px 18px 55px;
    border: 2px solid #e0e0e0;
    border-radius: 50px;
    font-size: 16px;
    transition: all 0.3s ease;
    background: white;
}

.search-box input:focus {
    outline: none;
    border-color: var(--primary-orange);
    box-shadow: 0 0 0 3px rgba(245, 130, 32, 0.1);
}

.downloads-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 30px;
    margin-top: 30px;
}

.download-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 25px rgba(0,0,0,0.08);
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    display: flex;
    flex-direction: column;
}

.download-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.download-card-icon {
    padding: 40px 30px 20px;
    text-align: center;
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
}

.download-thumbnail img {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.file-icon {
    width: 100px;
    height: 120px;
    margin: 0 auto;
    background: white;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.file-icon::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 20px 20px 0;
    border-color: transparent #e0e0e0 transparent transparent;
}

.file-extension {
    font-size: 18px;
    font-weight: 700;
    color: var(--primary-orange);
    text-transform: uppercase;
}

.file-icon-pdf { border-left: 4px solid #e74c3c; }
.file-icon-doc,
.file-icon-docx { border-left: 4px solid #2980b9; }
.file-icon-xls,
.file-icon-xlsx { border-left: 4px solid #27ae60; }
.file-icon-jpg,
.file-icon-jpeg,
.file-icon-png { border-left: 4px solid #9b59b6; }
.file-icon-zip { border-left: 4px solid #f39c12; }

.download-card-content {
    padding: 25px;
    flex-grow: 1;
}

.download-title {
    font-size: 20px;
    font-weight: 700;
    margin: 0 0 15px;
    color: var(--text-dark);
    line-height: 1.3;
}

.download-description {
    font-size: 14px;
    line-height: 1.6;
    color: var(--text-gray);
    margin-bottom: 20px;
}

.download-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    margin-bottom: 15px;
    font-size: 13px;
    color: var(--text-gray);
}

.download-meta span {
    display: flex;
    align-items: center;
    gap: 5px;
}

.download-meta svg {
    color: var(--primary-orange);
    flex-shrink: 0;
}

.download-categories {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 20px;
}

.category-badge {
    padding: 5px 12px;
    background: var(--bg-light-gray);
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
    color: var(--text-dark);
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.download-count-badge {
    padding: 5px 12px;
    background: #e7f7e7;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
    color: #27ae60;
}

.download-button {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 15px;
    background: var(--primary-orange);
    color: white;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    border-top: 1px solid rgba(0,0,0,0.05);
}

.download-button:hover {
    background: var(--primary-orange-hover);
    padding: 18px 15px;
}

.download-button svg {
    transition: transform 0.3s ease;
}

.download-button:hover svg {
    transform: translateY(3px);
}

/* Responsive Design */
@media (max-width: 992px) {
    .downloads-grid {
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 25px;
    }
    
    .downloads-filter {
        padding: 20px;
    }
    
    .page-header-section h1 {
        font-size: 36px !important;
    }
}

@media (max-width: 768px) {
    .downloads-grid {
        grid-template-columns: 1fr;
        gap: 20px;
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
    
    .filter-btn {
        flex: 1 1 calc(50% - 10px);
        min-width: 140px;
    }
}
</style>

<script>
(function() {
    'use strict';
    
    // Filter functionality
    const filterBtns = document.querySelectorAll('.filter-btn');
    const downloadCards = document.querySelectorAll('.download-card');
    const searchInput = document.getElementById('downloadSearch');
    const noResults = document.querySelector('.no-results');
    
    function filterDownloads() {
        const activeCategory = document.querySelector('.filter-btn.active').dataset.category;
        const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';
        let visibleCount = 0;
        
        downloadCards.forEach(card => {
            const cardCategories = card.dataset.category;
            const cardTitle = card.dataset.title;
            
            const matchesCategory = activeCategory === 'all' || cardCategories.includes(activeCategory);
            const matchesSearch = !searchTerm || cardTitle.includes(searchTerm);
            
            if (matchesCategory && matchesSearch) {
                card.style.display = 'flex';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });
        
        if (noResults) {
            noResults.style.display = visibleCount === 0 ? 'block' : 'none';
        }
    }
    
    // Category filter
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            filterDownloads();
        });
    });
    
    // Search
    if (searchInput) {
        searchInput.addEventListener('input', filterDownloads);
    }
})();
</script>

<?php
get_footer();
