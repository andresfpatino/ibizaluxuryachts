<?php 

/*
*	Single Yates
*/

get_header();  // Header ?>

<?php $especificaciones = get_field('especificaciones'); ?>

<section class="head-yatch">
	<?php if ( has_post_thumbnail() ) : $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
	<div class="featured_image-wrap">
		<img class="featured_image" src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); echo ' ' . $especificaciones['astillero_marca'] . ' ' . $especificaciones['modelo_yate'];?> " > 
	</div>
	<?php endif; ?>		
	<div class="elementor-section elementor-section-boxed">
		<div class="elementor-container">
			<div class="elementor-row head-yatch-content">
				<div class="elementor-column elementor-col-80 elementor-top-column elementor-element">
					<div class="head-yatch_main_meta">
						<div class="head-yatch_especificaciones">
							<!-- Camatores-->
							<?php if( $especificaciones['camarotes'] ): ?>
								<div class="yatch_box-meta">
									<p class="head-yatch_box-meta--label"> <?php _e( 'Camarotes', 'IBZ' ); ?> </p>
									<p class="head-yatch_box-meta--value"> <?php echo $especificaciones['camarotes']; ?> </p>
								</div>
							<?php endif; ?>							
							<!-- Baños-->
							<?php if( $especificaciones['cuartos_de_bano'] ): ?>
								<div class="yatch_box-meta">
									<p class="head-yatch_box-meta--label"> <?php _e( 'Baños', 'IBZ' ); ?> </p> 
									<p class="head-yatch_box-meta--value"> <?php echo $especificaciones['cuartos_de_bano']; ?> </p> 
								</div>
							<?php endif; ?>
							<!-- Tripulación-->
							<?php if( $especificaciones['tripulacion'] ): ?>
								<div class="yatch_box-meta">
									<p class="head-yatch_box-meta--label"> <?php _e( 'Tripulación', 'IBZ' ); ?> </p>  
									<p class="head-yatch_box-meta--value"> <?php echo $especificaciones['tripulacion']; ?> </p>  
								</div>
							<?php endif; ?>
							<!-- Velocidad-->
							<?php if( $especificaciones['velocidad_cruimax'] ): ?>
								<div class="yatch_box-meta">
									<p class="head-yatch_box-meta--label"> <?php _e( 'Velocidad', 'IBZ' ); ?> </p> 
									<p class="head-yatch_box-meta--value"> <?php echo $especificaciones['velocidad_cruimax']; ?> </p>  
								</div>
							<?php endif; ?>
						</div>
						<div class="head-yatch_extras">
							<!-- Extras -->
							<?php if( get_field('extras') ): ?>
								<h4 class="label"> <?php _e( 'Extras', 'IBZ' ); ?> </h4>
								<?php $extras = get_field('extras');
								if( $extras ): ?>
									<ul class="head-yatch_extras-list">
									<?php foreach( $extras as $extra ): ?>
										<li><?php echo esc_html( $extra->name ); ?><span class="comma">,</span></li>
									<?php endforeach; ?>
									<!--<p id="loadMore" class="loadMore"> ...Más</p>-->
									</ul>
								<?php endif; ?>
							<?php endif; ?>							
						</div>
					</div>					
				</div>
				<div class="elementor-column elementor-col-20 elementor-top-column elementor-element">
					
					<?php $galleryYates = get_field('galeria_principal'); if( $galleryYates ): ?>
						<div class="action-gallery">
							<a href="#" class="elementor-button-link elementor-button elementor-size-sm ancla-scroll" data-ancla="galeria"> <?php _e( 'VER GALERÍA', 'IBZ' ); ?> </a>
						</div>	
					<?php endif; ?>	
				</div>
			</div>
		</div>
	</div>
</section>

<section class="elementor-section elementor-section-boxed">
	<div class="elementor-container">
		<div class="elementor-row detalle-yates">
			<div class="elementor-column elementor-col-70 elementor-top-column elementor-element">
				<div class="content-yatch">
					<h1 class="elementor-heading-title name-yatch"> 
						<img class="ico" src="<?php  echo get_stylesheet_directory_uri() . '/assets/img/ico-yatch.png'; ?>">
						<span> <?php the_title();  ?></span> <?php echo ' ' . $especificaciones['astillero_marca'] . ' ' . $especificaciones['modelo_yate'];?> 
					</h1>
					
					<?php if( $especificaciones['capacidad'] ): ?>					
						<p class="especificacion-capacidad"> Alquiler de Yate <b> <?php the_title(); 
							echo ' ' . $especificaciones['astillero_marca'] . ' ' . $especificaciones['modelo_yate'] . '</b> '; ?> 
							con capacidad para <span><?php echo $especificaciones['capacidad']; ?>  </span>
						</p>
					<?php endif; ?>	

					<?php 
						$precios = $especificaciones['precios'];
						$precioDia = $precios['precio_dia'];
						$precioSemana = $precios['precio_semana'];
					?>		
					<?php if( $precios ): ?>						
							<div class="precios">
								<label class="label"> <?php _e( 'Precios:', 'IBZ' ); ?> </label>
								<?php if($precioDia): ?>
									<p class="dia">
										<span><?php _e( 'Día:', 'IBZ' ); ?></span> 
										<?php _e( 'Desde', 'IBZ' ); ?> <?php echo $precios['precio_dia']; ?> <?php _e( '€', 'IBZ' ); ?><sup>*</sup>  
									</p>
								<?php endif; ?>
								<?php if($precioSemana): ?>
									<p class="semana">
										<span><?php _e( 'Semana:', 'IBZ' ); ?></span> 
										<?php _e( 'Desde', 'IBZ' ); ?> <?php echo $precios['precio_semana']; ?> <?php _e( '€', 'IBZ' ); ?><sup>*</sup>
									</p>
								<?php endif; ?>
								<p class="note"><sup>*</sup> <?php _e( 'Nota:', 'IBZ' ); ?> <?php _e( ' No incluye impuestos ni tasas', 'IBZ' ); ?></p>
							</div>						
					<?php endif; ?>
					
					
					<?php $descripcionCorta = get_field('descripcion_corta');
					if ($descripcionCorta ) : ?>
						<div class="short-description" id="descripcion">
							<h2 class="subtitle"> <?php _e( 'Sobre el Yate ', 'IBZ' ); ?> </h2>
							<p> <?php echo get_field('descripcion_corta'); ?> </p>
							<a href="#" class="more-info ancla-scroll" data-ancla="descripcion-larga">  <?php _e( 'Leer más', 'IBZ' ); ?> </a>
						</div>
					<?php endif; ?>
					
					
					<?php if( $especificaciones ) : ?>
						<div class="especificaciones" id="especificaciones">
							<h2 class="subtitle"> 
								<?php _e( 'Especificaciones del Yate ', 'IBZ' ); the_title();
								echo '<span> ' . $especificaciones['astillero_marca'] . ' ' . $especificaciones['modelo_yate'] . '<span>'; ?> 
							</h2>
							<div class="especificaciones_list">
								<?php if( $especificaciones['astillero_marca'] ): ?>							
									<div class="spec">
										<p class="spec-label"> Astillero/Marca </p>
										<p class="spec-value"> <?php echo $especificaciones['astillero_marca']; ?> </p>
									</div>
								<?php endif; ?>	
								<?php if( $especificaciones['modelo_yate'] ): ?>
									<div class="spec">
										<p class="spec-label"> Modelo </p>
										<p class="spec-value"> <?php echo $especificaciones['modelo_yate']; ?> </p>
									</div>								
								<?php endif; ?>	
								<?php if( $especificaciones['ano'] ): ?>
									<div class="spec">
										<p class="spec-label"> Año </p>
										<p class="spec-value"> <?php echo $especificaciones['ano']; ?> </p>
									</div>								
								<?php endif; ?>	
								<?php if( $especificaciones['eslora'] ): ?>
									<div class="spec">
										<p class="spec-label"> Eslora </p>
										<p class="spec-value"> <?php echo $especificaciones['eslora']; ?> </p>
									</div>									
								<?php endif; ?>	
								<?php if( $especificaciones['manga'] ): ?>
									<div class="spec">
										<p class="spec-label"> Manga </p>
										<p class="spec-value"> <?php echo $especificaciones['manga']; ?> </p>
									</div>									
								<?php endif; ?>		
								<?php if( $especificaciones['potencia'] ): ?>
									<div class="spec">
										<p class="spec-label"> Potencia </p>
										<p class="spec-value"> <?php echo $especificaciones['potencia']; ?> </p>
									</div>									
								<?php endif; ?>	
								<?php if( $especificaciones['numero_motores'] ): ?>
									<div class="spec">
										<p class="spec-label"> Nº motores </p>
										<p class="spec-value"> <?php echo $especificaciones['numero_motores']; ?> </p>
									</div>									
								<?php endif; ?>		
								<?php if( $especificaciones['velocidad_cruimax'] ): ?>
									<div class="spec">
										<p class="spec-label"> Velocidad (Crui/Max) </p>
										<p class="spec-value"> <?php echo $especificaciones['velocidad_cruimax']; ?> </p>
									</div>									
								<?php endif; ?>		
								<?php if( $especificaciones['capacidad'] ): ?>
									<div class="spec">
										<p class="spec-label"> Capacidad </p>
										<p class="spec-value"> <?php echo $especificaciones['capacidad']; ?> </p>
									</div>									
								<?php endif; ?>	
								<?php if( $especificaciones['deposito_agua_potable'] ): ?>
									<div class="spec">
										<p class="spec-label"> Depósito agua potable </p>
										<p class="spec-value"> <?php echo $especificaciones['deposito_agua_potable']; ?> </p>
									</div>								
								<?php endif; ?>	
								<?php if( $especificaciones['camarotes'] ): ?>
									<div class="spec">
										<p class="spec-label"> Camarotes </p>
										<p class="spec-value"> <?php echo $especificaciones['camarotes']; ?> </p>
									</div>									
								<?php endif; ?>		
								<?php if( $especificaciones['literas'] ): ?>
									<div class="spec">
										<p class="spec-label"> Literas </p>
										<p class="spec-value"> <?php echo $especificaciones['literas']; ?> </p>
									</div>									
								<?php endif; ?>		
								<?php if( $especificaciones['cuartos_de_bano'] ): ?>
									<div class="spec">
										<p class="spec-label"> Cuartos de baño </p>
										<p class="spec-value"> <?php echo $especificaciones['cuartos_de_bano']; ?> </p>
									</div>								
								<?php endif; ?>		
								<?php if( $especificaciones['combustible'] ): ?>
									<div class="spec">
										<p class="spec-label"> Combustible </p>
										<p class="spec-value"> <?php echo $especificaciones['combustible']; ?> </p>
									</div>									
								<?php endif; ?>		
								<?php if( $especificaciones['capacidad_combustible'] ): ?>
									<div class="spec">
										<p class="spec-label"> Capacidad combustible </p>
										<p class="spec-value"> <?php echo $especificaciones['capacidad_combustible']; ?> </p>
									</div>								
								<?php endif; ?>	
								<?php if( $especificaciones['consumo_gasolina'] ): ?>
									<div class="spec">
										<p class="spec-label"> Consumo gasolina </p>
										<p class="spec-value"> <?php echo $especificaciones['consumo_gasolina']; ?> </p>
									</div>									
								<?php endif; ?>	
								<?php if( $especificaciones['tripulacion'] ): ?>
									<div class="spec">
										<p class="spec-label"> Tripulación </p>
										<p class="spec-value"> <?php echo $especificaciones['tripulacion']; ?> </p>
									</div>									
								<?php endif; ?>	
							</div>
						</div>
					<?php endif; ?>

					
					<?php $planos = get_field('planos_yate'); if( $planos ): ?>
						<!-- Planos -->
						<div class="planos-yate" id="planos">
							<h2 class="subtitle"> 
								<?php _e( 'Planos del Yate ', 'IBZ' ); the_title();
								echo '<span> ' . $especificaciones['astillero_marca'] . ' ' . $especificaciones['modelo_yate'] . '<span>'; ?> 
							</h2>
							<ul class="gallery-planos">
								<?php foreach( $planos as $plano ): ?>
									<li>
										<a class="yatch-plane-rel" 
										   rel="plane" 
										   href="<?php echo esc_url($plano['url']); ?>">
											<img src="<?php echo esc_url($plano['sizes']['large']); ?>" alt="<?php echo esc_attr($plano['alt']); ?>" />
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>	
					
					<?php $descripcionLarga = get_field('descripcion_larga'); if ($descripcionLarga) : ?>
						<div class="description" id="descripcion-larga">
							<h2 class="subtitle"> 
								<?php _e( 'Sobre el Yate ', 'IBZ' ); the_title();
								echo '<span> ' . $especificaciones['astillero_marca'] . ' ' . $especificaciones['modelo_yate'] . '<span>'; ?>
							</h2>
							<?php echo get_field('descripcion_larga'); ?>
						</div>	
					<?php endif; ?>		
				</div>
			</div>
			
			<div class="elementor-column elementor-col-30 elementor-top-column elementor-element">
				
				<sidebar class="sidebar_wrap">
					<div class="toc_container">
						<p class="toc_title"> <?php the_title(); echo '<span> ' . $especificaciones['astillero_marca'] . ' ' . $especificaciones['modelo_yate'] . '<span>'; ?> </p>
						<ul class="toc_list">
							
							<?php if ($descripcionCorta ) : ?>
								<!-- descrip. corta -->
								<li>
									<i class="fa fa-angle-right" aria-hidden="true"></i>
									<a href="#" class="ancla-scroll" data-ancla="descripcion"> 
										Descripción del Yate <?php echo '<span> ' . $especificaciones['astillero_marca'] . ' ' . $especificaciones['modelo_yate'] . '<span>'; ?> 
									</a>
								</li>
							<?php endif; ?>
							
							<?php if( $especificaciones ) : ?>
								<li>
									<i class="fa fa-angle-right" aria-hidden="true"></i>
									<a href="#" class="ancla-scroll" data-ancla="especificaciones"> Especificaciones del Yate <?php echo '<span> ' . $especificaciones['astillero_marca'] . ' ' . $especificaciones['modelo_yate'] . '<span>'; ?> </a>
								</li>
							<?php endif; ?>
							
							<?php if( $planos ): ?>
								<li>
									<i class="fa fa-angle-right" aria-hidden="true"></i>
									<a href="#" class="ancla-scroll" data-ancla="planos"> Planos del Yate <?php echo '<span> ' . $especificaciones['astillero_marca'] . ' ' . $especificaciones['modelo_yate'] . '<span>'; ?> </a>
								</li>
							<?php endif; ?>	
							
							<?php if ($descripcionLarga) : ?>
								<li>
									<i class="fa fa-angle-right" aria-hidden="true"></i>
									<a class="ancla-scroll" href="#" data-ancla="descripcion-larga"> Sobre el Yate <?php echo '<span> ' . $especificaciones['astillero_marca'] . ' ' . $especificaciones['modelo_yate'] . '<span>'; ?> </a>
								</li>
							<?php endif; ?>
							
							<?php if( $galleryYates ): ?>
								<li>
									<i class="fa fa-angle-right" aria-hidden="true"></i>
									<a class="ancla-scroll" href="#" data-ancla="galeria"> Imágenes del Yate <?php echo '<span> ' . $especificaciones['astillero_marca'] . ' ' . $especificaciones['modelo_yate'] . '<span>'; ?> </a>
								</li>
							<?php endif; ?>								
							
							
						</ul>
					</div>
					
					<div class="form-yates">
						<?php  echo do_shortcode( '[elementor-template id="1183"]' );  ?>
					</div>
					
				</sidebar>
				
			</div>
			
		</div>
	</div>	
	
	<?php $galleryYates = get_field('galeria_principal'); if( $galleryYates ): ?>
		<section class="elementor-section elementor-section-full-width"> 
			<div class="elementor-container">
				<div class="elementor-row">							
					<!-- Galeria principal -->
					<div class="galeria-yate" id="galeria">
						<ul class="gallery-yate">
							<?php foreach( $galleryYates as $image ): ?>
								<li class="wrap_photo">
									<a class="yatch-gallery-rel"
										rel="gallery"
										title="<?php the_title(); echo ' ' . $especificaciones['astillero_marca'] . ' ' . $especificaciones['modelo_yate']; ?>"
										href="<?php echo esc_url($image['url']); ?>">
										<img src="<?php echo esc_url($image['sizes']['gallery_yatch']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									</a>
								</li>
							<?php endforeach; ?>
						</ul> 
						<?php if ( $image >= 8 ) : ?>
							<a href="#" id="loadMore" class="btn"><?php _e( 'Mostrar más fotos', 'IBZ' ); ?></a>   					
						<?php endif; ?>	      
					</div>	

				</div>
			</div>
		</section>
	<?php endif; ?>	

	<section class="elementor-section elementor-section-boxed content-yatch"> 
		<div class="elementor-container">
			<div class="elementor-row" style="flex-wrap: wrap;">
				
				<?php $video = get_field('video_yate'); if ($video) : ?>
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element">
						<div class="promotional-video">
							<h2 class="subtitle"> 
								<?php _e( 'Video promocional ', 'IBZ' ); the_title();
								echo '<span> ' . $especificaciones['astillero_marca'] . ' ' . $especificaciones['modelo_yate'] . '<span>'; ?>
							</h2>
							<div class="embed-container">
								<?php the_field('video_yate'); ?>
							</div>					
						</div>
					</div>
				<?php endif; ?>	

				<div class="elementor-column elementor-col-100 elementor-top-column elementor-element">
					<div class="foot">
						<p><?php _e( 'Ver más modelos de', 'IBZ' ); ?> 
							<a href="<?php echo get_post_type_archive_link( 'yates' ); ?>"> <?php _e( 'Alquiler de Yates de Lujo en Ibiza', 'IBZ' ); ?> </a>
						</p>
					</div>						
				</div>				
				
			</div>
		</div>
	</section>
		
</section>


<?php get_footer(); // Footer ?>