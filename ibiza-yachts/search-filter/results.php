<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      https://searchandfilter.com
 * @copyright 2018 Search & Filter
 * 
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $query->have_posts() ){
	while ($query->have_posts()){
		$query->the_post(); 
		$especificaciones = get_field('especificaciones'); ?>
		<div class="ibz-yatch">
			<a href="<?php the_permalink();?>"> 
				<!-- image -->
				<div class="ibz-yatch_thumbnail">
					<?php if ( has_post_thumbnail() ) : $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'ultimos_yates'); ?>
						<img src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); echo ' ' . $especificaciones['astillero_marca'] . ' ' . $especificaciones['modelo_yate'];?> " > 
					<?php endif; ?>	

					<!-- title -->
					<div class="ibz-yatch_name">
						<h3 class="ibz-yatch_title"> <?php the_title(); ?> </h3>				
						<?php if( $especificaciones ): ?>						
							<p class="ibz-yatch_marca-modelo"> <?php echo $especificaciones['astillero_marca'] . ' ' . $especificaciones['modelo_yate']; ?> </p>						
						<?php endif; ?>
					</div>
				</div>	
			</a>
			<!-- Descrip -->		 
			<div class="ibz-yatch_short-description"> 
				<div class="ibz-yatch-specs">
					<?php if( $especificaciones['eslora'] ): ?>
						<div class="spec">
							<p class="spec-label"> <span>Eslora:</span> <?php echo $especificaciones['eslora']; ?></p>
						</div>									
					<?php endif; ?>	
					<?php if( $especificaciones['manga'] ): ?>
						<div class="spec">
							<p class="spec-label"> <span>Manga:</span> <?php echo $especificaciones['manga']; ?> </p>
						</div>									
					<?php endif; ?>	
					<?php if( $especificaciones['capacidad'] ): ?>
						<div class="spec">
							<p class="spec-label"> <span>Capacidad:</span> <?php echo $especificaciones['capacidad']; ?> </p>
						</div>									
					<?php endif; ?>							
				</div>
				<div class="wrap_short-descrip">
					<?php echo wp_trim_words( get_field('descripcion_corta'), 26, '...' ); ?> 
				</div>
			</div>
		</div>
		<?php
	}  wp_reset_postdata(); ?>	

	<div class="pagination">		
		<?php
			echo '<p> <span> ' . $query->found_posts . '</span> Yates a tu disposición </p>'; 

			if (function_exists('wp_pagenavi')) {
				wp_pagenavi( array( 'query' => $query ) );
		}
		?>
	</div>	<?php
}
else {
	echo "No se encontraron Yates disponibles";
}
?>