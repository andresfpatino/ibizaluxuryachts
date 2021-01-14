<?php  // [blog-ibz per-page="9"]

function shortcode_blog_ibz($atts){ 
       
    $arg_Post = array(
        'post_type'      => 'post',
        'publish_status' => 'published',
        'posts_per_page' => $atts['per-page'],		
    );
    $queryPosts = new WP_Query($arg_Post);    
    ob_start();	

	if($queryPosts->have_posts()) : ?>
	
    <div class="ibz-blog-list">	
		<?php while($queryPosts->have_posts()) : $queryPosts->the_post() ; ?>													
			<div class="ibz-bl-item">	
				<div class="ibz-bli-inner">
                    <div class="ibz-post-image"> 
                        <a href="<?php the_permalink(); ?>" itemprop="url" title="<?php the_title(); ?>">
                            <?php the_post_thumbnail('ibz_blog'); ?>
                        </a>
                    </div> 
                    <div class="ibz-bli-content">
						<h4 class="ibz-post-title" itemprop="name"><a href="<?php the_permalink(); ?>" itemprop="url" title="<?php the_title(); ?>"><?php the_title(); ?> </a></h4> 
                        <div class="ibz-bli-info">
                            <time itemprop="dateCreated" class="ibz-post-info-date entry-date" datetime="<?php echo get_the_date('c'); ?>"> <?php echo get_the_date('F j, Y'); ?> </time>
                        </div>
                        <div class="ibz-post-read-more-button">
                            <a href="<?php the_permalink(); ?>" class="ibz-post-btn" itemprop="url"> <?php echo _e('Leer más','ibz'); ?> </a>
                        </div>
                    </div>                      
                </div>
			</div>
		<?php endwhile; wp_reset_postdata();  ?>				
	</div>
    <?php endif; $output_string = ob_get_contents(); ob_end_clean(); return $output_string; 
} 
add_shortcode( 'blog-ibz', 'shortcode_blog_ibz' ); 