<?php
/**
 * Template Name: Case Studies
 * Description: Displays an introduction and Case Studies.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main id="primary" class="site-main">
	<section class="hero">
		<div class="wrap">
			<h1><?php echo sprintf( esc_html__( 'Case Studies - %s', 'nuvra-task' ), get_bloginfo( 'name' ) ); ?></h1>
			<p><?php bloginfo( 'description' ); ?></p>
		</div>
	</section>
	<section class="latest-case-studies">
		<div class="wrap">
			<h2><?php esc_html_e( 'Latest Case Studies', 'nuvra-task' ) ?></h2>
			<?php
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 3,
			);
    		// I will utilize following filter hook and update arguments from plugin to display case studies here.
			$query = new WP_Query( apply_filters( 'nuvra_case_studies_template_query_args', $args ) );
			if ( $query->have_posts() ) {
				?>
				<div class="grids hentry">
					<?php
					while ( $query->have_posts() ) {
						$query->the_post();
						?>
						<article <?php post_class( 'grid' ); ?>>
                            <?php 
                            if ( has_post_thumbnail() ) {
                                ?>
                                <div class="grid__thumbnail">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                                <?php 
                        }
                            ?>
                            <div class="grid__content">
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo esc_html( wp_trim_excerpt() ); ?></p>
                                <b>
                                    <?php echo sprintf(
                                        /* translators: %s: Human readable time differance  */
                                        esc_html__( 'Published %s ago', 'nuvra-task' ),
                                        human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ),
                                    ); ?>
                                </b>
                            </div>
                            <a class="grid__link" href="<?php echo esc_url( get_permalink() ); ?>"></a>
						</article>
						<?php
					}
					?>
				</div>
				<?php
			} else {
                ?>
                <p>
                    <?php esc_html_e( 'No case study found!' ); ?>
                </p>
                <?php
            }
			wp_reset_postdata();
			wp_reset_query();
			?>
		</div>
	</section>

    <?php
    // I will utilize following hook and add case study section from plugin here.
    do_action( 'nuvra_front_page_before_footer' );
    ?>
</main>
<?php
get_footer();