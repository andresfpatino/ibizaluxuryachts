<?php  // [carousel-yates-destacados qty="3"]

function shortcode_destacados_sidebar_ibz($atts){ 

    $arg_Post = array(
        'post_type'      => 'yates',
        'publish_status' => 'published',
        'posts_per_page' =>  $atts['qty'],	
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
	
    <div class="ibz-yates-destacados-sidebar">	
	<?php while($queryPosts->have_posts()) : $queryPosts->the_post() ; ?>	
		<?php $especificaciones = get_field('especificaciones'); ?>
		<div class="ibz-yatch">	
			<a href="<?php the_permalink();?>"> 
				<!-- image -->
				<div class="ibz-yatch_thumbnail">
					<?php if ( has_post_thumbnail() ) : $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large'); ?>
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
		</div>		
	<?php endwhile; wp_reset_postdata();  ?>				
	</div>
    <?php endif; $output_string = ob_get_contents(); ob_end_clean(); return $output_string; 
} 
add_shortcode( 'carousel-yates-destacados', 'shortcode_destacados_sidebar_ibz' ); 