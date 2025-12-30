<?php
/**
 * Single Post Template 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main id="primary" class="site-main">
<?php
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            ?>
            <article <?php post_class(); ?>>
                <div class="entry-header">
                    <p class="post-meta">
                        <?php echo sprintf(
                            /* translators: %s: Human readable time differance  */
                            esc_html__( 'Posted on %s by %s', 'nuvra-task' ),
                            get_the_date(),
                            get_the_author(),
                        ); ?>
                    </p>
                    <h1><?php the_title(); ?></h1>
                    <?php 
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail();
                    }
                    ?>
                </div>
                <div class="entry-content">
                    <?php 
                    the_content();
                    wp_link_pages( [
                        'before' => '<div class="page-links">' . esc_html__( 'Pages', 'nuvra-task' ),
                        'after' => '</div>'
                    ] )
                    ?>
                </div>
                <div class="entry-footer">
                    <p>
                        <?php 
                        esc_html_e( 'Categories: ', 'nuvra-task' );
                        the_category(
                            ', ',
                        );
                        ?>
                    </p>
                    <?php
                    the_tags(
						'<p class="tag-links">' . esc_html__( 'Tags:', 'nuvra-task' ) . ' ',
						', ',
						'</p>'
					);
                    ?>
                </div>
            </article>

            <nav class="post-navigation">
				<?php
				the_post_navigation( [
					'prev_text' => esc_html__( 'Previous post', 'nuvra-task' ),
					'next_text' => esc_html__( 'Next post', 'nuvra-task' ),
				] );
				?>
			</nav>
            <?php
        }
    } else {
        ?>
        <p>
            <?php esc_html_e( 'Post not found!' ); ?>
        </p>
        <?php
    }
    ?>
</main>
<?php
get_footer();