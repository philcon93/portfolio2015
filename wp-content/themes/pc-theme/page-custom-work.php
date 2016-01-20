
<?php
/**
 * Template Name: Custom Work Portfolio Page
 */ 

get_header(); ?>
	<div class="row clearfix main-content">
		<div class="<?php if(is_active_sidebar('sidebar1')){ echo "col-md-9";} else{ echo "col-md-12";} ?>">
			<?php if (have_posts()) :
				while (have_posts()) : the_post(); ?>
				<article class="post page">
	<?php
		if(has_children() OR $post->post_parent > 0){ ?>
			<nav class="site-nav children-links clearfix">
			<span class="parent-link"><a href="<?php echo get_the_permalink(get_top_ancestor_id()); ?>"><?php echo get_the_title(get_top_ancestor_id()); ?></a></span>
				<ul>
					<?php 
						$args = array(
							'child_of' => get_top_ancestor_id(),
							'title_li' => ''
						);
					?>
					<?php wp_list_pages($args); ?>
				</ul>
			</nav>
	<?php } ?>
		<div class="row">
			<div class="col-md-12 wrapper-section">
				<?php // wp_query Uncategorized post loop begins
						$gallery_posts = new WP_Query('cat=10');
						if ($gallery_posts->have_posts()) :
							while ($gallery_posts->have_posts()) : $gallery_posts->the_post(); ?>
								<div class="col-xs-12 col-sm-6 col-md-4">
								<div class="thumbnail post <?php if(has_post_thumbnail()){ ?> post-w-thumbnail <?php } ?>">
									<a href="<?php the_permalink(); ?>">
										<?php if ( has_post_thumbnail() ) {
											the_post_thumbnail('medium');
										} else { ?>
											<img src="<?php bloginfo('template_directory'); ?>/img/default-image.png" alt="<?php the_title(); ?>" />
										<?php } ?>
									</a>
									<div class="caption">
										<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
										<p class="post-info"><?php the_time('F jS, Y'); ?> 
										| <?php 
											$categories = get_the_category();
											$separator = ", ";
											$output ='';

											if ($categories){
												foreach ($categories as $category) {
													$output .= '<a href="'.get_category_link($category->term_id).'">'.$category->cat_name.'</a>'. $separator;
												}
												echo trim($output, $separator);
											}
										?></p>
									</div>
								</div>
								</div>
							<?php endwhile; ?>
							<?php else :
								echo "<p>No content found</p>";
						endif; 
						wp_reset_postdata(); ?>
			</div>
		</div>
</article>	<?php

				endwhile;

				else :
					echo "<p>No content found</p>";
				endif; ?>
		</div>
		<?php if(is_active_sidebar('sidebar1')){ ?>
				<?php get_sidebar(); ?>
			<?php } ?>
	</div>
<?php get_footer();

?>