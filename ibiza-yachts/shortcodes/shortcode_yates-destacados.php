<?php  // [yates-destacados]

function shortcode_destacados_ibz($atts){ 

    $arg_Post = array(
        'post_type'      => 'yates',
        'publish_status' => 'published',
        'posts_per_page' => -1,	
		'order'          => 'DESC',
		'orderby'        => 'date',
		'meta_query' => array(
			array(
				'key' => 'destacado',
				'compare' => '==',
				'value' => '1'
			)
		)
    );
    $queryPosts = new WP_Query($arg_Post);    
    ob_start();	

	if($queryPosts->have_posts()) : ?>
	
    <div class="ibz-yates-destacados">	
	<?php while($queryPosts->have_posts()) : $queryPosts->the_post() ; ?>	
		<?php $especificaciones = get_field('especificaciones'); ?>
		<div class="ibz-yatch">	
			<a href="<?php the_permalink();?>"> 
				<!-- image -->
				<div class="ibz-yatch_thumbnail">
					<?php if ( has_post_thumbnail() ) : $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'yate_destacado'); ?>
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
					<?php echo wp_trim_words( get_field('descripcion_corta'), 30, '...' ); ?> 
				</div>
				<?php #the_field('descripcion_corta'); ?> 
			</div>
		</div>		
	<?php endwhile; wp_reset_postdata();  ?>				
	</div>
    <?php endif; $output_string = ob_get_contents(); ob_end_clean(); return $output_string; 
} 
add_shortcode( 'yates-destacados', 'shortcode_destacados_ibz' ); 