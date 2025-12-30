<?php
/**
 * Blogs Template 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<main id="primary" class="site-main">
    <section class="hero">
		<div class="wrap">
			<h1><?php echo sprintf( esc_html__( 'Blogs - %s', 'nuvra-task' ), get_bloginfo( 'name' ) ); ?></h1>
			<p><?php bloginfo( 'description' ); ?></p>
		</div>
	</section>
    <?php
    if ( have_posts() ) {
        ?>
        <div class="grids hentry">
            <?php
            while ( have_posts() ) {
                the_post();
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
            <?php esc_html_e( 'No post found!' ); ?>
        </p>
        <?php
    }
    ?>
</main>
<?php
get_footer();